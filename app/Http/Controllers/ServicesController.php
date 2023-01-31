<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Content;
use App\Models\Report;
use App\Models\Service;
use App\Models\ServiceTemplate;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $serviceTemplate = ServiceTemplate::first();
        $services = Service::get();
        $clients = Client::get();
        $testimonials = Testimonial::get();
        return view('front.services.index',compact('serviceTemplate','services','clients','testimonials'));
    }

    public function report($id)
    {

        $service = Service::findOrfail($id);
        $reports = Report::where('service_id',$id)->where('approve',2)->get();
        return view('front.services.report',compact('reports','service'));
    }

    public function reportView($id)
    {
        $report = Report::with('service','subIndustry')->where('id',$id)->first();
        $contents = Content::where('report_id',$id)->get();
        return view('front.services.single-report',compact('report','contents'));
    }



}
