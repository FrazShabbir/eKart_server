<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class projectController extends Controller
{
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    public function create(Request $request){

        $request->validate([
            'projectType' => 'required',
        ]);


        $project = new Project;

        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data", $fileNameToStore1);
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
            $path = $request->file('imageIcon')->storeAs("public/data", $fileNameToStore2);
        }else {

            $fileNameToStore2 = 'no_img.png';
        }


        $project->projectType  = $request->projectType;
        $project->imageIcon  = $fileNameToStore2;
        $project->description  = $request->description;
        $project->banner  = $fileNameToStore1;
        $project->status  = $request->status;

        if($project->save()){
            return redirect()->back()->with('success', 'Project Type Created');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'projectId' => 'required',
        ]);
        $project = Project::where('id',$request->projectId)->first();


        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data", $fileNameToStore1);
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
            $path = $request->file('imageIcon')->storeAs("public/data", $fileNameToStore2);
        }else {

            $fileNameToStore2 = $project->imageIcon;
        }
        $project->projectType  = $request->type;
        $project->description  = $request->desc;
        $project->banner  = $fileNameToStore1;
        $project->imageIcon  = $fileNameToStore2;
        $project->status  = $request->status;

        if($project->save()){
            return redirect()->back()->with('success', 'Project Type Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'projectId' => 'required',
        ]);
        $project = Project::where('id',$request->projectId)->first();




        if($project->delete()){
            return redirect()->back()->with('success', 'Project Type Deleted');
        }else{
            return redirect()->back()->with('error', 'Error While Deleting');
        }

    }



}
