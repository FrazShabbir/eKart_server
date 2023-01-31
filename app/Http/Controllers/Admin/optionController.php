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
        $option ->save();
        if ($request->hasFile('logo')) {
            $option->clearMediaCollection('company_logo');
            $option->addMediaFromRequest('logo')->toMediaCollection('company_logo');
        }

        if ($request->hasFile('faveIcon')) {
            $option->clearMediaCollection('fave_icon');
            $option->addMediaFromRequest('faveIcon')->toMediaCollection('fave_icon');
        }
        return redirect()->back()->with('success','Setting Updated');
    }
}
