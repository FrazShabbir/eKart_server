<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceTemplate;
use App\Models\Testimonial;
use File;
class serviceController extends Controller
{
    public function index()
    {

        $projects = Service::all();
        return view('admin.services.index',compact('projects'));
    }
    public function template(){
        $seviceTemplate = ServiceTemplate::first();
        return view('admin.services.template',compact('seviceTemplate'));
    }
    public function delete(Request $request)
    {
        $request->validate([
            'projectId' => 'required',
        ]);
        $project = Service::where('id',$request->projectId)->first();

        if($project->delete()){
            return redirect()->back()->with('success', 'Service Type Deleted');
        }else{
            return redirect()->back()->with('error', 'Error While Service');
        }

    }
    public function create(Request $request){

        $request->validate([
            'serviceType' => 'required',
        ]);
        $project = new Service;
        if ($request->hasFile('banner')) {
            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/services", $fileNameToStore1);
        }else {

            $fileNameToStore1 = 'no_img.png';
        }


        if ($request->hasFile('imageIcon')) {

            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data/services", $fileNameToStore2);
        }else {

            $fileNameToStore2 = 'no_img.png';
        }


        $project->serviceType  = $request->serviceType;
        $project->imageIcon  = $fileNameToStore2;
        $project->description  = $request->description;
        $project->banner  = $fileNameToStore1;

        if($project->save()){
            return redirect()->back()->with('success', 'Service Type Created');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'projectId' => 'required',
        ]);
        $project = Service::where('id',$request->projectId)->first();


        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/services", $fileNameToStore1);
        }else {

            $fileNameToStore1 = $project->banner;
        }


        if ($request->hasFile('icon')) {

            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('icon')->storeAs("public/data/services", $fileNameToStore2);
        }else {

            $fileNameToStore2 = $project->imageIcon;
        }
        $project->serviceType  = $request->type;
        $project->description  = $request->desc;
        $project->banner  = $fileNameToStore1;
        $project->imageIcon  = $fileNameToStore2;

        if($project->save()){
            return redirect()->back()->with('success', 'Service Type Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }

    }

     function templateUpdate(Request $request)
    {

        $request->validate([
            'service_id' => 'required',
        ]);
        $seviceTemplate = ServiceTemplate::where('id',$request->service_id)->first();

        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $banner = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/services/", $banner);
        }else {

            $banner = $seviceTemplate->banner;
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

            $expert = $seviceTemplate->expert;
        }


        $seviceTemplate->description  = $request->description;
        $seviceTemplate->content  = $request->content;
        $seviceTemplate->solution  =  $request->solution;
        $seviceTemplate->banner  = $banner;
        $seviceTemplate->expert  = $expert;
        $seviceTemplate->save();
        return redirect()->back()->with('success','Record updated');
    }

    function clients()
    {
        $clients = Client::get();
        return view('admin.services.client',compact('clients'));
    }

    function clientCreate(Request $request)
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

        $clients = new Client;
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

        $client = Client::where('id',$request->client_id)->first();
        if ($request->hasFile('logo')) {

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
        $client = Client::where('id',$request->client_id)->first();
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
        $testimonials = Testimonial::get();
        return view('admin.services.testimonial',compact('testimonials'));
    }

    function testimonialCreate(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $testimonial = new Testimonial;

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
        $testimonial = Testimonial::where('id',$request->id)->first();

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
        $testimonial = Testimonial::where('id',$request->testimonial_id)->first();

        if (File::exists('storage/app/public/data/testimonial/' . $testimonial->icon)) {
            if($oldImage = $testimonial->icon) {

                unlink('storage/app/public/data/testimonial/' . $oldImage);
            }
        }

        $testimonial->delete();

        return redirect()->back()->with('success','Data Deleted');
    }






}
