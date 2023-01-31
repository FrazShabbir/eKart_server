<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Industry;
use App\Models\Subindustry;
use App\Models\IndustryClient;
use App\Models\IndustryTestimonial;
use App\Models\IndustryTemplate;

class industryController extends Controller
{
    public function index()
    {
        $projects = Industry::all();
        return view('admin.industry.index',compact('projects'));
    }

    public function subIndustries()
    {

        $industries = Industry::all();
        $subindustries = Subindustry::all();
        return view('admin.industry.sub_industry',compact('industries','subindustries'));
    }




    public function create(Request $request){

        $request->validate([
            'industryType' => 'required',
        ]);

        $project = new Industry;

        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/industry/", $fileNameToStore1);
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
            $path = $request->file('imageIcon')->storeAs("public/data/industry/", $fileNameToStore2);
        }else {

            $fileNameToStore2 = 'no_img.png';
        }


        $project->industryType  = $request->industryType;
        $project->imageIcon  = $fileNameToStore2;
        $project->description  = $request->description;
        $project->banner  = $fileNameToStore1;

        if($project->save()){
            return redirect()->back()->with('success', 'Industry Type Created');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'projectId' => 'required',
        ]);
        $project = Industry::where('id',$request->projectId)->first();


        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/industry/", $fileNameToStore1);
        }else {

            $fileNameToStore1 = $project->banner;
        }


        if ($request->hasFile('imageIcon')) {

            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data/industry/", $fileNameToStore2);
        }else {

            $fileNameToStore2 = $project->imageIcon;
        }
        $project->industryType  = $request->type;
        $project->description  = $request->desc;
        $project->banner  = $fileNameToStore1;
        $project->imageIcon  = $fileNameToStore2;

        if($project->save()){
            return redirect()->back()->with('success', 'Industry Type Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }

    }
    public function delete(Request $request)
    {
        $request->validate([
            'projectId' => 'required',
        ]);
        $project = Industry::where('id',$request->projectId)->first();
        if($project->delete()){
            return redirect()->back()->with('success', 'Industry Type Deleted');
        }else{
            return redirect()->back()->with('error', 'Error While Deleting');
        }
    }


    public function subIndustriesCreate(Request $request){

        $request->validate([
            'industryType' => 'required',
            'subindustry' =>'required',
            'category_price' => 'required',

        ]);
        $Subindustry = new Subindustry;
        if ($request->hasFile('banner')) {
            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data", $fileNameToStore1);
        }else {
            $fileNameToStore1 = 'no_img.png';
        }
        if ($request->hasFile('imageIcon')) {
            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data", $fileNameToStore2);
        }else {
            $fileNameToStore2 = 'no_img.png';
        }
        $Subindustry->industry_id  = $request->industryType;
        $Subindustry->subindustry  = $request->subindustry;
        $Subindustry->imageIcon  = $fileNameToStore2;
        $Subindustry->description  = $request->description;
        $Subindustry->banner  = $fileNameToStore1;
        $Subindustry->category_price  = $request->category_price;
        if($Subindustry->save()){
            return redirect()->back()->with('success', 'Sub Industry Type Created');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }

    public function subIndustriesUpdate(Request $request){
        $request->validate([
            'subindustry_id' => 'required'
        ]);
        $Subindustry = Subindustry::where('id',$request->subindustry_id)->first();
        if ($request->hasFile('banner')) {
            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data", $fileNameToStore1);
        }else {
            $fileNameToStore1 = $Subindustry->banner;
        }
        if ($request->hasFile('imageIcon')) {
            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data", $fileNameToStore2);
        }else {
            $fileNameToStore2 = $Subindustry->imageIcon;
        }
        $Subindustry->industry_id  = $request->industary;
        $Subindustry->subindustry  = $request->subindustary;
        $Subindustry->imageIcon  = $fileNameToStore2;
        $Subindustry->description  = $request->desc;
        $Subindustry->banner  = $fileNameToStore1;
        $Subindustry->category_price  = $request->category_price;
        if($Subindustry->save()){
            return redirect()->back()->with('success', 'Sub Industry Type Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }
    public function subIndustriesDelete(Request $request)
    {
        $request->validate([
            'subId' => 'required',
        ]);
        $project = Subindustry::where('id',$request->subId)->first();
        if($project->delete()){
            return redirect()->back()->with('success', 'Sub Industry Deleted');
        }else{
            return redirect()->back()->with('error', 'Error While Deleting');
        }
    }

    public function getSub(Request $request) {
        $data=$request->all();
        $cat_id=$request->id;
        $subcategories=Subindustry::where('industry_id', $request->id)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function getCountry(Request $request) {
        $data=$request->all();
        $cat_id=$request->id;
        $countries=Country::where('region_id', $request->id)->get();
        return response()->json([
            'countries' => $countries
        ]);
    }

    public function template()
    {
       $industryTemplate = IndustryTemplate::first();
       return view('admin.industry.template',compact('industryTemplate'));
    }


    function templateUpdate(Request $request)
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

        $client->delete();

        return redirect()->back()->with('success','Data Deleted');
    }


    function testimonial()
    {
        $testimonials = IndustryTestimonial::get();
        return view('admin.industry.testimonial',compact('testimonials'));
    }

    function testimonialCreate(Request $request)
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



        $testimonial->delete();

        return redirect()->back()->with('success','Data Deleted');
    }

}
