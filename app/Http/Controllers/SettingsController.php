<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
    	return view('admin.settings.settings')->with('settings', Setting::first());
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
            "site_name"      => "required",
        	"address"        => "required",
        	"contact_number" => "required",
        	"contact_email"  => "required",
            "site_about"     => "required"
        ]);

        $settings = Setting::first();

        $settings->site_name      = $request->site_name;
        $settings->address        = $request->address;
        $settings->contact_number = $request->contact_number;
        $settings->contact_email  = $request->contact_email;
        $settings->site_about     = $request->site_about;


        $settings->save();

        Session::flash('success', 'Settings updated successfully !');

        return redirect()->route('settings');
    }
}
