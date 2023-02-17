<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::find(1);
        return view('admin.pages.setting.website', compact('website'));
    }
    public function contact()
    {
        $contact = Website::find(1);
        return view('admin.pages.setting.contact', compact('contact'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);


        $input = $request->all();

        if ($img = $request->file('logo')) {
            $image = Image::make($img)->resize(1500, 444, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filePath = 'uploads/images/';
            $setImage = 'mpnews_image' . date('YmdHis') . "." . $img->getClientOriginalExtension();
            $filelink = $filePath . $setImage;
            $image->save($filelink, 95);
            $input['logo'] = asset('') . $filelink;
        } else {
            unset($input['logo']);
        }
        if ($img = $request->file('favicon')) {
            $image = Image::make($img)->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filePath = 'uploads/images/';
            $setImage = 'mpnews_image' . date('YmdHis') . "." . $img->getClientOriginalExtension();
            $filelink = $filePath . $setImage;
            $image->save($filelink, 95);
            $input['favicon'] = asset('') . $filelink;
        } else {
            unset($input['favicon']);
        }

        // dd($input);
        if ($website->update($input)) {

            return redirect()->route('website.index')->with('success', 'website edited successfully.');
        } else {
            return back()->with('error', 'Error.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function contactUpdate(Request $request, Website $website)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $input = $request->all();

        if ($website->update($input)) {

            return redirect()->route('contact.index')->with('success', 'website edited successfully.');
        } else {
            return back()->with('error', 'Error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
