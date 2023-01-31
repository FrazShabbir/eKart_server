<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyRequirement;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Project;
use App\Models\Region;
use App\Models\Requirement;
use App\Models\Service;
use App\Models\Subindustry;
use Illuminate\Http\Request;

class RequirmentController extends Controller
{
    public function index()
    {
        $requirments = Requirement::get();  
        return view('admin.requirment.index',compact('requirments'));
    }

    public function edit($id)
    {
        
        
        $projects           = Project::select('id','projectType')->get();
        $services           = Service::select('id','serviceType')->get();
        $industries         = Industry::select('id','industryType')->get();
        $subindustries      = Subindustry::select('id','subindustry')->get();
        $regions            = Region::select('id','region')->get();
        $countries          = Country::select('id','country')->get();
        $requirment = Requirement::find($id); 
        return view('admin.requirment.edit',compact('requirment','projects','services','industries','subindustries','regions','countries'));
    }

    public function create()
    {
        $projects           = Project::select('id','projectType')->get();
        $services           = Service::select('id','serviceType')->get();
        $industries         = Industry::select('id','industryType')->get();
        $subindustries      = Subindustry::select('id','subindustry')->get();
        $regions            = Region::select('id','region')->get();
        $countries          = Country::select('id','country')->get();
         
        return view('admin.requirment.create',compact('projects','services','industries','subindustries','regions','countries'));
    }

    public function save(Request $request)
    {
         $requirments = new Requirement;
         $requirments->project_id = $request->project_id;
         $requirments->service_id = $request->service_id;
         $requirments->industry_id = $request->industry_id;
         $requirments->subindustry_id = $request->subindustry_id;
         $requirments->region_id = $request->region_id;
         $requirments->country_id = $request->country_id;
         $requirments->description = $request->description;
         $requirments->save();
        return redirect()->route('admin.requirements')->with('success','Requirements Added');
    }
    

    public function delete(Reqiduest $request)
    {
         $requirments = new Requirement;
         $requirments->project_id = $request->project_id;
         $requirments->service_id = $request->service_id;
         $requirments->industry_id = $request->industry_id;
         $requirments->subindustry_id = $request->subindustry_id;
         $requirments->region_id = $request->region_id;
         $requirments->country_id = $request->country_id;
         $requirments->description = $request->description;
         $requirments->save();
        return redirect()->route('admin.requirements')->with('success','Requirements Added');
    }
    public function appliedUser()
    {
          $users = ApplyRequirement::with('user','requirement')->get();
        return view('admin.requirment.user',compact('users'));
    }


    public function appliedUserDelete(Request $request)
    {
           $users = ApplyRequirement::find($request->requirement_id);
          $users->delete();
        return redirect()->back()->with('success','User Deleted');
    }
    
    public function update(Request $request)
    {
         $requirments = Requirement::find($request->id);
         $requirments->project_id = $request->project_id;
         $requirments->service_id = $request->service_id;
         $requirments->industry_id = $request->industry_id;
         $requirments->subindustry_id = $request->subindustry_id;
         $requirments->region_id = $request->region_id;
         $requirments->country_id = $request->country_id;
         $requirments->description = $request->description;
         $requirments->save();
        return redirect()->route('admin.requirements')->with('success','Requirements Updated');
    }
    
}
