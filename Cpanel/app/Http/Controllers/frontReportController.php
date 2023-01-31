<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Content;
use App\Models\Country;
use App\Models\Industry;
use App\Models\IndustryClient;
use App\Models\IndustryTemplate;
use App\Models\IndustryTestimonial;
use App\Models\Log;
use App\Models\Region;
use App\Models\RegionClient;
use App\Models\Report;
use App\Models\ServiceTemplate;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\RegionTemplate;
use App\Models\RegionTestimonial;
use App\Models\Service;
use App\Models\Subindustry;
use Illuminate\Support\Facades\Auth;
class frontReportController extends Controller
{
    public function index($id)
    {       $reports = Report::where('subindustry_id',$id)->where('approve',2)->get();
            return view('front.industry.report',compact('reports'));
    }
    public function reportByIndustry($id)
    {
            $industry = Industry::findOrfail($id);
            $reports = Report::with('industry')->where('industry_id',$id)->where('approve',2)->get();
            return view('front.industry.report',compact('reports','industry'));
    }
    public function reportBySubIndustry($id)
    {
             $subindustry = Subindustry::with('industry')->where('id',$id)->first();
             $reports = Report::where('subindustry_id',$id)->where('approve',2)->get();
             return view('front.subIndustry.report',compact('reports','subindustry'));
    }
    public function serviceReport($id)
    {       $reports = Report::where('service_id',$id)->where('approve',2)->get();
            return view('front.reports',compact('reports'));
    }
    public function reportByRregion($id)
    {       $reports = Report::where('region_id',$id)->where('approve',2)->get();
            return view('front.reports',compact('reports'));
    }
    public function countryTemplateReport($id)
    {
              $country = Country::with('region')->findorfail($id);
             $reports = Report::where('country_id',$id)->where('approve',2)->get();
            return view('front.country.reports',compact('reports','country'));
    }


    public function singleReport($id= null)
    {

                $report = Report::with('industry','subIndustry')->where('id',$id)->first();
            $contents = Content::where('report_id',$id)->get();
            return view('front.singleReport',compact('report','contents'));
    }

    public function serviceTemplate()
    {
            $serviceTemplate = ServiceTemplate::first();
            $services = Service::get();
            $clients = Client::get();
            $testimonials = Testimonial::get();
            return view('front.serviceTemplate',compact('serviceTemplate','services','clients','testimonials'));
    }

    public function subServiceTemplate($id)
    {

            $serviceTemplate = ServiceTemplate::first();
            $services = Service::get();
             $current_service = Service::findorfail($id);
            $clients = Client::get();
            $testimonials = Testimonial::get();
            return view('front.serviceTemplate',compact('current_service','serviceTemplate','services','clients','testimonials'));
    }



    public function industryTemplate()
    {

            $industryTemplate = IndustryTemplate::first();
            $industries = Industry::get();
            $clients =IndustryClient::get();
            $testimonials = IndustryTestimonial::get();
            return view('front.industry.template',compact('industryTemplate','industries','clients','testimonials'));
    }

    public function subIndustryTemplate($id)
    {

            $industryTemplate = IndustryTemplate::first();
            $industry = Industry::where('id',$id)->first();
            $subindustry = Subindustry::where('industry_id',$id)->get();
            $clients =IndustryClient::get();
            $testimonials = IndustryTestimonial::get();
            return view('front.template.template',compact('industry','industryTemplate','subindustry','clients','testimonials'));
    }


    public function regionTemplate()
    {
            $regionTemplate = RegionTemplate::first();
            $regions = Region::get();
            $clients =RegionClient::get();
            $testimonials = RegionTestimonial::get();
            return view('front.regionTemplate',compact('regionTemplate','regions','clients','testimonials'));
    }

    public function countryTemplate($id)
    {
            $regionTemplate = RegionTemplate::first();
              $region = Region::findorfail($id);
             $countries = Country::where('region_id',$id)->get();
            $clients =RegionClient::get();
            $testimonials = RegionTestimonial::get();
            return view('front.countryTemplate',compact('regionTemplate','countries','clients','testimonials','region'));
    }


    public function StoreLog(Request $request)
    {
        $request->validate([
            'report_id' => 'required',
        ]);
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->report_id = $request->report_id;
        $log->save();

    }











}
