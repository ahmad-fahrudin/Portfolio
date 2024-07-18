<?php

namespace App\Http\Controllers\Home;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function footerSetup()
    {
        $allfooter = Footer::find(1);
        return view("admin.footer.footer_all", compact("allfooter"));
    }
    public function updateFooter(Request $request)
    {
        // mengambill data id di hidden id
        $footer_id = $request->id;

        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'adress' => $request->adress,
            'email' => $request->long_description,
            'long_description' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'copyright' => $request->copyright,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Footer Updated Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
