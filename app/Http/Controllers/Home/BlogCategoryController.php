<?php

namespace App\Http\Controllers\home;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogCategoryController extends Controller
{
    public function allBlogCategory()
    {

        $blogcategory = BlogCategory::latest()->get();

        return view('admin.blog_category.blog_category_all', \compact('blogcategory'));
    }

    public function addBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
    }

    public function storeBlogCategory(Request $request)
    {
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);
    }

    public function editBlogCategory($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);

        return view('admin.blog_category.blog_category_edit', \compact('blogcategory'));
    }

    public function updateBlogCategory(Request $request)
    {
        $blogcategory_id = $request->id;

        BlogCategory::findOrFail($blogcategory_id)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);
    }

    public function deleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
