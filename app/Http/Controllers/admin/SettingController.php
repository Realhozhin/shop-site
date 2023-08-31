<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setting = Setting::first();
        if($setting)
        {
            // update data
            $setting->update([
                'website_name' =>$request->website_name,
                'website_url' =>$request->website_url,
                'page_title' =>$request->page_title,
                'meta_keywords' =>$request->meta_keywords,
                'mata_description' =>$request->mata_description,
                'address' =>$request->address,
                'phone1' =>$request->phone1,
                'phone2' =>$request->phone2,
                'email1' =>$request->email1,
                'email2' =>$request->email2,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instagram' =>$request->instagram,
                'youtube' =>$request->youtube
            ]);
        }
        else
        {
            // create data
            Setting::create([
                'website_name' =>$request->website_name,
                'website_url' =>$request->website_url,
                'page_title' =>$request->page_title,
                'meta_keywords' =>$request->meta_keywords,
                'mata_description' =>$request->mata_description,
                'address' =>$request->address,
                'phone1' =>$request->phone1,
                'phone2' =>$request->phone2,
                'email1' =>$request->email1,
                'email2' =>$request->email2,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instagram' =>$request->instagram,
                'youtube' =>$request->youtube
            ]);
        }
        session()->flash('message','setting stored successfully');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
