<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
class optionController extends Controller
{
    public function index()
    {
         $option = Option::first();
        return view('admin.option.setting',compact('option'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
        ]);
        $option = Option::find($request->id);
        
        $option->address = $request->address;
        $option->phone = $request->phone;
        $option->email = $request->email;
        $option->cr = $request->cr;
        $option->fb = $request->fb;
        $option->twitter = $request->twitter;
        $option->pinterest = $request->pinterest;
        $option->insta = $request->insta;
  

        // if ($request->hasFile('logo')) {
        //     $option->clearMediaCollection('company_logo');
        //     $option->addMediaFromRequest('logo')->toMediaCollection('company_logo');
        // }

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(11,999999).'-'.time() . '.' . $extension;
            $file->move('uploads/logo', $filename);
            $option->logo = 'uploads/logo/'.$filename;
        }

        if ($request->hasFile('faveIcon')) {
            $request->validate([
                'faveIcon' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            $file = $request->file('faveIcon');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(11,999999).'-'.time() . '.' . $extension;
            $file->move('uploads/faveIcon', $filename);
            $option->faveIcon = 'uploads/faveIcon/'.$filename;
        }
        $option ->save();
        // if ($request->hasFile('faveIcon')) {
        //     $option->clearMediaCollection('fave_icon');
        //     $option->addMediaFromRequest('faveIcon')->toMediaCollection('fave_icon');
        // }
        // dd($option);
        return redirect()->back()->with('success','Setting Updated');
    }
}
