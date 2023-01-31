<?php

namespace App\Http\Controllers;

use App\Models\IndustryTemplate;
use Illuminate\Http\Request;
use App\Models\IndustryClient;
use App\Models\IndustryTestimonial;
use File;
class industryTemplateController extends Controller
{
    public function index()
    {
       $industryTemplate = IndustryTemplate::first();
       return view('admin.industry.template',compact('industryTemplate'));
    }

    function update(Request $request)
    {
        $request->validate([
            'industry_id' => 'required',
        ]);
        $industryTemplate = IndustryTemplate::where('id',$request->industry_id)->first();

        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $banner = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/reports/", $banner);
        }else {

            $banner = $industryTemplate->banner;
        }

        if ($request->hasFile('expert')) {

            $filenameWithExt = $request->file('expert')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('expert')->getClientOriginalExtension();
            // Filename To store
            $expert = $filename . time() . '.' . $extension;
            $path = $request->file('expert')->storeAs("public/data/reports/", $expert);
        }else {

            $expert = $industryTemplate->expert;
        }


        $industryTemplate->description  = $request->description;
        $industryTemplate->content  = $request->content;
        $industryTemplate->solution  =  $request->solution;
        $industryTemplate->banner  = $banner;
        $industryTemplate->expert  = $expert;
        $industryTemplate->save();
        return redirect()->back()->with('success','Record updated');
    }

    function client()
    {
        $clients = IndustryClient::get();
        return view('admin.industry.client',compact('clients'));
    }

    function clientAdd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'logo' => 'required',
        ]);

        if ($request->hasFile('logo')) {

            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename To store
            $logo = 'L_' . time() . '.' . $extension;
            $path = $request->file('logo')->storeAs("public/data/clients/", $logo);
        }else {

            $logo = 'no-image.jpg';
        }

        $clients = new IndustryClient;
        $clients->title = $request->title;
        $clients->logo = $logo;
        $clients->save();

        return redirect()->back()->with('success','Data Added');
    }

    function clientUpdate(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
        ]);
        $client = IndustryClient::where('id',$request->client_id)->first();

        if ($request->hasFile('logo')) {

            if($oldImage = $client->logo) {

                unlink('storage/app/public/data/clients/' . $oldImage);
            }

            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename To store
            $logo = $filename . time() . '.' . $extension;
            $path = $request->file('logo')->storeAs("public/data/clients/", $logo);
        }else {

            $logo = $client->logo;
        }


        $client->title = $request->title;
        $client->logo = $logo;
        $client->save();

        return redirect()->back()->with('success','Data Updated');
    }

    function clientDelete(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
        ]);
        $client = IndustryClient::where('id',$request->client_id)->first();

        if (File::exists('storage/app/public/data/clients/' . $client->logo)) {
            if($oldImage = $client->logo) {

                unlink('storage/app/public/data/clients/' . $oldImage);
            }
        }

        $client->delete();

        return redirect()->back()->with('success','Data Deleted');
    }

    function testimonial()
    {
        $testimonials = IndustryTestimonial::get();
        return view('admin.industry.testimonial',compact('testimonials'));
    }

    function testimonialAdd(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $testimonial = new IndustryTestimonial;

        if ($request->hasFile('icon')) {

            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            // Filename To store
            $icon = 'T_' . time() . '.' . $extension;
            $path = $request->file('icon')->storeAs("public/data/testimonial/", $icon);
        }else {

            $icon = 'no-image.jpg';
        }

        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->icon = $icon;
        $testimonial->save();

        return redirect()->back()->with('success','Data Added');


    }

    function testimonialUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $testimonial = IndustryTestimonial::where('id',$request->id)->first();

        if ($request->hasFile('icon')) {

            if (File::exists('storage/app/public/data/testimonial/' . $testimonial->icon)) {
                if($oldImage = $testimonial->icon) {

                    unlink('storage/app/public/data/testimonial/' . $oldImage);
                }
            }

            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            // Filename To store
            $icon = 'T_' . time() . '.' . $extension;
            $path = $request->file('icon')->storeAs("public/data/testimonial/", $icon);
        }else {

            $icon = $testimonial->icon;
        }

        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->icon = $icon;
        $testimonial->save();

        return redirect()->back()->with('success','Data Updated');


    }

    function testimonialDelete(Request $request)
    {
        $request->validate([
            'testimonial_id' => 'required',
        ]);
        $testimonial = IndustryTestimonial::where('id',$request->testimonial_id)->first();

        if (File::exists('storage/app/public/data/testimonial/' . $testimonial->icon)) {
            if($oldImage = $testimonial->icon) {

                unlink('storage/app/public/data/testimonial/' . $oldImage);
            }
        }

        $testimonial->delete();

        return redirect()->back()->with('success','Data Deleted');
    }



}
