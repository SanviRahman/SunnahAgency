<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Logo;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAppreanceController extends Controller
{
    public function backend_Settings_Logo()
    {
        $logo = Logo::first();
        // dd($logo);
        return view('backend.theme-option.logo', compact(
            'logo',
        ));
    }

    public function backend_Settings_Header()
    {
        $logo = Logo::first();
        $websiteinfo = WebsiteInfo::first();
        return view('backend.theme-option.header', compact(
            'logo',
            'websiteinfo',
        ));
    }

    public function backend_Settings_Footer()
    {
        $logo = Logo::first();
        $websiteinfo = WebsiteInfo::first();
        return view('backend.theme-option.footer', compact(
            'logo',
            'websiteinfo',
        ));
    }

    public function backend_Settings_Footer_Update(Request $request)
    {
        try {
            $websiteinfo = WebsiteInfo::first();
            if (!$websiteinfo) {
                $websiteinfo = new WebsiteInfo();
            }

            $websiteinfo->update([
                'address' => $request->address,
                'email' => $request->email,
                'number' => $request->number,
                'wattsup_number' => $request->wattsup_number,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkdin' => $request->linkdin,
                'radit' => $request->radit,
                'tiktok' => $request->tiktok,
                'pintarest' => $request->pintarest,
                'sort_descroption' => $request->sort_descroption,
            ]);

            return redirect()->back()->with('success', 'Footer Information Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function backend_Settings_Logo_Update(Request $request)
    {
        try {
            $logo = Logo::first();
            $input = $request->all();

            if ($image = $request->file('favicon')) {
                if ($logo->favicon != "favicone.png") {
                    $deleteOldImage = 'media/logo/' . $logo->favicon;
                    if (File::exists($deleteOldImage)) {
                        File::delete($deleteOldImage);
                    }
                }
                $imgPath = 'media/logo/';
                $proImage = date('YmdHis') . "-favicon-appupnext." . $image->getClientOriginalExtension();
                $image->move($imgPath, $proImage);
                $input['favicon'] = "$proImage";
            } else {
                unset($input['favicon']);
            }

            if ($image = $request->file('frontlogo')) {
                if ($logo->frontlogo != "frontlogo.png") {
                    $deleteOldImage = 'media/logo/' . $logo->frontlogo;
                    if (File::exists($deleteOldImage)) {
                        File::delete($deleteOldImage);
                    }
                }
                $imgPath = 'media/logo/';
                $proImage = date('YmdHis') . "-frontlogo-appupnext." . $image->getClientOriginalExtension();
                $image->move($imgPath, $proImage);
                $input['frontlogo'] = "$proImage";
            } else {
                unset($input['frontlogo']);
            }

            if ($image = $request->file('backlogo')) {
                if ($logo->backlogo != "backlogo.png") {
                    $deleteOldImage = 'media/logo/' . $logo->backlogo;
                    if (File::exists($deleteOldImage)) {
                        File::delete($deleteOldImage);
                    }
                }
                $imgPath = 'media/logo/';
                $proImage = date('YmdHis') . "-backlogo-appupnext." . $image->getClientOriginalExtension();
                $image->move($imgPath, $proImage);
                $input['backlogo'] = "$proImage";
            } else {
                unset($input['backlogo']);
            }

            $logo->update($input);
            return redirect()->back()->with('success', 'logo Update Has Been Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
