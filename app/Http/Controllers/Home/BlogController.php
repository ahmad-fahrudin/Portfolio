<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    public function allBlog()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blog.blog_all', \compact('blogs'));
    }
    public function addBlog()
    {
        $categories = BlogCategory::pluck('blog_category', 'id');

        return view('admin.blog.blog_add', compact('categories'));
    }
    public function storeBlog(Request $request)
    {
        $image = $request->file("blog_image");
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // untuk file menjadi = 634736473.jpg

        Image::read($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        Blog::insert([
            'blogcat_id' => $request->blogcat_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
        // File::delete(public_path('upload/blog_image/' . $name_gen));

        $notification = array(
            'message' => 'Blog Inserted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog')->with($notification);
    }

    public function editBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::pluck('blog_category', 'id');

        return view('admin.blog.blog_edit', compact('blogs', 'categories'));
    }

    public function updateBlog(Request $request)
    {
        $blogs_id = $request->id;

        if ($request->file("blog_image")) {
            $image = $request->file("blog_image");
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // untuk file menjadi = 634736473.jpg

            Image::read($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            Blog::findOrFail($blogs_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
            ]);

            //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
            // File::delete(public_path('upload/about/' . $name_gen));

            $notification = array(
                'message' => 'Portfolio Updated Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.blog')->with($notification);
        } else {
            Blog::findOrFail($blogs_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);

            $notification = array(
                'message' => 'Blog Updated without Image Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.blog')->with($notification);
        }
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Deleted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function blogDetails($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::pluck('blog_category', 'id');

        return view('frontend.blog_details', compact('blogs', 'allblogs', 'categories'));
    }

    public function categoryBlog($id)
    {
        $blogpost = Blog::where('blogcat_id', $id)->orderBy('id', 'desc')->get();
        $categories = BlogCategory::pluck('blog_category', 'id');
        $allblogs = Blog::latest()->limit(5)->get();
        $catname = BlogCategory::findOrFail($id);

        return view('frontend.cat_blog_details', compact('blogpost', 'categories', 'allblogs', 'catname'));
    }

    public function homeBlog()
    {
        $allblogs = Blog::latest()->get();
        $categories = BlogCategory::pluck('blog_category', 'id');

        return view('frontend.blog', compact('allblogs', 'categories'));
    }
}
