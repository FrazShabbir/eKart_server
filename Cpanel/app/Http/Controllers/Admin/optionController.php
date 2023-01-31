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
        $option->logo = $request->logo;
        $option->address = $request->address;
        $option->phone = $request->phone;
        $option->email = $request->email;
        $option->cr = $request->cr;
        $option->fb = $request->fb;
        $option->twitter = $request->twitter;
        $option->pinterest = $request->pinterest;
        $option->insta = $request->insta;

        if ($request->hasFile('logo')) {
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $icon = 'L_' . time() . '.' . $extension;
            $path = $request->file('logo')->storeAs("public/data/", $icon);
        }else {
            $icon = $option->logo;
        }

        if ($request->hasFile('faveIcon')) {
            $filenameWithExt = $request->file('faveIcon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('faveIcon')->getClientOriginalExtension();
            $faveIcon = 'F_' . time() . '.' . $extension;
            $path = $request->file('faveIcon')->storeAs("public/data/", $faveIcon);
        }else {
            $faveIcon = $option->faveIcon;
        }
        $option->faveIcon = $faveIcon;
        $option->logo = $icon;
        $option ->save();
        return redirect()->back()->with('success','Setting Updated');
    }
}
