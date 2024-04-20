<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Intervention\Image\ImageManager;

class SettingController extends Controller
{
    public function SiteSetting()
    {

        $site = SiteSetting::find(1);
        return view('backend.site.site_update', compact('site'));
    } // End Method 

    public function SiteUpdate(Request $request)
    {

        $site_id = $request->id;

        if ($request->file('logo')) {

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // create new image instance
            $image = ImageManager::gd()->read($image);
            $image->resize(110, 44)->save('upload/site/' . $name_gen);
            $save_url = 'upload/site/' . $name_gen;

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // End Eles 


    } // End Method 
}
