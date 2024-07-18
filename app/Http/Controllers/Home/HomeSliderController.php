<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;

class HomeSliderController extends Controller
{
    public function homeSlider()
    {
        $homeslide = HomeSlide::find(1);
        return view("admin.home_slide.home_slide_all", compact("homeslide"));
    }
    public function updateSlider(Request $request)
    {
        $slide_id = $request->id;

        if ($request->file("home_slide")) {
            $image = $request->file("home_slide");
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // untuk file menjadi = 634736473.jpg

            Image::read($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,
            ]);

            //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
            // File::delete(public_path('upload/home_slide/' . $name_gen));

            $notification = array(
                'message' => 'Home Slide with Image Updated Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slide Updated without Image Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function homeMain()
    {
        return view('frontend.index');
    }
}
