<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\AboutQuery;
use Illuminate\Http\Request;
use App\Models\Contact;
class contactController extends Controller
{
    public function enquires()
    {
        $contacts = Contact::get();
        return view('admin.contact',compact('contacts'));
    }

    public function enquiryAbout()
    {
        $about = AboutQuery::get();
        return view('admin.about-enquiry',compact('about'));
    }



    public function delete(Request $request)
    {
       $request->validate([
           'quId' => 'required',
       ]);
       $delete = Contact::findOrFail($request->quId);
       if($delete->delete()){
           return redirect()->back()->with('success', 'Record Deleted');
       }else{
           return redirect()->back()->with('success', 'Record Not Deleted');
       }
    }

    public function enquiryDelete(Request $request)
    {
       $request->validate([
           'quId' => 'required',
       ]);
       $delete = AboutQuery::findOrFail($request->quId);
       if($delete->delete()){
           return redirect()->back()->with('success', 'Record has been deleted');
       }else{
           return redirect()->back()->with('success', 'Record Not Deleted');
       }
    }
}

