<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function allPortfolio()
    {
        $portfolio = Portfolio::latest()->get();

        return view('admin.portfolio.portfolio_all', \compact('portfolio'));
    }

    public function addPortfolio()
    {
        return view('admin.portfolio.portfolio_add');
    }

    public function storePortfolio(Request $request)
    {
        $image = $request->file("portfolio_image");
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // untuk file menjadi = 634736473.jpg

        Image::read($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
        $save_url = 'upload/portfolio/' . $name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
        // File::delete(public_path('upload/portfolio_image/' . $name_gen));

        $notification = array(
            'message' => 'Portfolio Inserted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.portfolio')->with($notification);
    }

    public function editPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    }

    public function updatePortfolio(Request $request)
    {
        $portfolio_id = $request->id;

        if ($request->file("portfolio_image")) {
            $image = $request->file("portfolio_image");
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // untuk file menjadi = 634736473.jpg

            Image::read($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
            $save_url = 'upload/portfolio/' . $name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);

            //  masih memikirkan jika file di update gambar di directory upload ikut kehapus
            // File::delete(public_path('upload/about/' . $name_gen));

            $notification = array(
                'message' => 'Portfolio Updated Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.portfolio')->with($notification);
        } else {
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);

            $notification = array(
                'message' => 'Portfolio without Image Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.portfolio')->with($notification);
        }
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio Deleted Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function portfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details', compact('portfolio'));
    }

    public function homePortfolio()
    {
        $portfolio = Portfolio::latest()->paginate(2);

        return view('frontend.portfolio', \compact('portfolio'));
    }
}
