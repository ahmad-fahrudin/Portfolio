<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $aboutpage = About::find(1);
        return view("admin.about_page.about_page_all", compact("aboutpage"));
    }
    public function updateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file("about_image")) {
            $image = $request->file("about_image");
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // untuk file menjadi = 634736473.jpg

            Image::read($image)->resize(636, 852)->save('upload/about/' . $name_gen);
            $save_url = 'upload/about/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
            // File::delete(public_path('upload/about/' . $name_gen));

            $notification = array(
                'message' => 'Home Slide with Image Updated Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Updated without Image Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function homeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));
    }
    public function aboutMultiImage()
    {
        return view('admin.about_page.multimage');
    }
    public function storeMultiImage(Request $request)
    {
        $image = $request->file('multi_image');
        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            // untuk file menjadi = 634736473.jpg

            Image::read($multi_image)->resize(220, 220)->save('upload/multi/' . $name_gen);
            $save_url = 'upload/multi/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);

            //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
            // File::delete(public_path('upload/about/' . $name_gen));

        }
        $notification = array(
            'message' => 'Multi Image Insert Updated Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.multi.image')->with($notification);
    }

    public function allMultiImage()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('allMultiImage'));
    }

    public function editMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }
    public function updateMultiImage(Request $request)
    {
        $multi_image_id = $request->id;

        if ($request->file("multi_image")) {
            $image = $request->file("multi_image");
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // untuk file menjadi = 634736473.jpg

            Image::read($image)->resize(636, 852)->save('upload/multi/' . $name_gen);
            $save_url = 'upload/multi/' . $name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url,
            ]);

            //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
            // File::delete(public_path('upload/about/' . $name_gen));

            $notification = array(
                'message' => 'Multi Image Updated Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.multi.image')->with($notification);
        }
    }

    public function deleteMultiImage($id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Image Deleted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
