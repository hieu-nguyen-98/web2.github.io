<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function settings(){
        $settings = Settings::first();
        return view('backend.settings.setting')->with(compact('settings'));
    }
    public function settingsUpdate(Request $request){
        $setting = Settings::first();
        $status = $setting->update([
            'title' =>  $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_description,
            'favicon' => $request->favicon,
            'logo' => $request->logo,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'footer' => $request->footer,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'linked_url' => $request->linked_url,
            'pinterest' => $request->pinterest,
        ]);
        if ($status) {
            return back()->with('success','Settings Update successfully');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }
}
