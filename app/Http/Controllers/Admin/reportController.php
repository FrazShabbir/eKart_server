<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTemplate;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Overview;
use App\Models\Project;
use App\Models\Region;
use App\Models\Report;
use App\Models\Content;
use App\Models\Log;
use App\Models\ProjectStatus;
use App\Models\ReportIssue;
use App\Models\Service;
use App\Models\Subindustry;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

class reportController extends Controller
{
    public function index()
    {
       
        
             $reports = Report::with('project')->get();
            return view('admin.reports.index',compact('reports'));
    }
    public function myreport()
    {        $reports = Report::where('employee_id',Auth::user()->id)->with('project')->get();
            return view('admin.reports.index',compact('reports'));
    }
    public function edit($id)
    {
            $projects           = Project::select('id','projectType')->get();
            $services           = Service::select('id','serviceType')->get();
            $industries         = Industry::select('id','industryType')->get();
            $subindustries      = Subindustry::select('id','subindustry')->get();
            $regions            = Region::select('id','region')->get();
            $countries          = Country::select('id','country')->get();
            $managers = User::role('Manager')->get();
            $employees = User::role('Employee')->get();
            $report = Report::where('id',$id)->first();
            $contents = Content::where('report_id',$id)->get();
            $progress = ProjectStatus::where('report_id',$id)->with('user')->get();
            return view('admin.reports.edit',compact('progress','projects','services','industries','subindustries','regions','countries','managers','employees','report','contents'));
    }
    public function create()
    {   
        
        
            $projects           = Project::select('id','projectType')->get();
            $services           = Service::select('id','serviceType')->get();
            $industries         = Industry::select('id','industryType')->get();
            $subindustries      = Subindustry::select('id','subindustry')->get();
            $regions            = Region::select('id','region')->get();
            $countries          = Country::select('id','country')->get();
            $managers = User::role('Manager')->get();
            $employees = User::role('Employee')->get();
            return view('admin.reports.create',compact('projects','services','industries','subindustries','regions','countries','managers','employees'));
    }

    public function save(Request $request){

        $request->validate([
            'projectType' => 'required',
            'serviceType' => 'required',
            'industryType' => 'required',
            'subindustry' => 'required',
        ]);
        $report = new Report;
        $overview = new Overview;
        if ($request->hasFile('projectPhoto')) {
            $filenameWithExt = $request->file('projectPhoto')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('projectPhoto')->getClientOriginalExtension();
            // Filename To store
            $projectPhoto = 'Project_' . time() . '.' . $extension;
            $path = $request->file('projectPhoto')->storeAs("public/data/reports/", $projectPhoto);
        }else {

            $projectPhoto = 'no_img.png';
        }
        $report->project_id = $request->projectType;
        $report->service_id = $request->serviceType;
        $report->industry_id = $request->industryType;
        $report->subindustry_id = $request->subindustry;
        $report->region_id = $request->region;
        $report->country_id = $request->country;
        $report->manager_id = $request->manager;
        $report->employee_id = $request->employee;
        $report->title = $request->projectTitle;
        $report->author = $request->author;
        $report->reportCode = $request->reportCode;
        $report->totalPages = $request->totalPages;
        $report->status = $request->status;
        $report->price = $request->price;
        $report->photo = $projectPhoto;
        $report->approve = 0;
        if($report->save()){
            if ($request->hasFile('contentFile')) {
                $filenameWithExt = $request->file('contentFile')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('contentFile')->getClientOriginalExtension();
                // Filename To store
                $contentFile = 'ContentFile' . time() . '.' . $extension;
                $path = $request->file('contentFile')->storeAs("public/data/reports/contents", $contentFile);
            }else {

                $contentFile = 'no_img.png';
            }

            if ($request->hasFile('overviewFile')) {
                $filenameWithExt = $request->file('overviewFile')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('overviewFile')->getClientOriginalExtension();
                // Filename To store
                $overviewFile = 'OverviewFile_' . time() . '.' . $extension;
                $path = $request->file('overviewFile')->storeAs("public/data/reports/contents", $overviewFile);
            }
            // Else add a dummy image
            else {

                $overviewFile = 'no_img.png';
            }
            if ($request->hasFile('docFile')) {
                $filenameWithExt = $request->file('docFile')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('docFile')->getClientOriginalExtension();
                // Filename To store
                $docFile = 'OverviewFile' . time() . '.' . $extension;
                $path = $request->file('docFile')->storeAs("public/data/reports/", $docFile);
            }
            // Else add a dummy image
            else {
                $docFile = 'no_img.png';
            }
            if ($request->hasFile('pptFile')) {
                $filenameWithExt = $request->file('pptFile')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('pptFile')->getClientOriginalExtension();
                // Filename To store
                $pptFile = 'OverviewFile' . time() . '.' . $extension;
                $path = $request->file('pptFile')->storeAs("public/data/reports/", $pptFile);
            }
            else {
                $pptFile = 'no_img.png';
            }
            $overview->report_id = $report->id;
            $overview->overview = $request->overview;
            $overview->faq = $request->faq;
            $overview->fileTableContent = $contentFile;
            $overview->reportOverView = $overviewFile;
            $overview->uploadDoc = $docFile;
            $overview->uploadPpt = $pptFile;
            if($overview->save()){
                $contentsTitle = count($request->contentTitle);
                for ($i = 0; $i < $contentsTitle; $i++) {
                    $content = new Content;
                    $content->report_id = $report->id;
                    $content->overview_id = $overview->id;
                    $content->title = $request['contentTitle'][$i];
                    $content->content =  $request['contentDetail'][$i];
                    $content->pages =  $request['contentPages'][$i];
                    $content->save();
                }
                if($request->action == 'customer'){
                    return redirect()->route('admin.my_reports')->with('success','Report Created');
                }else{
                    return redirect()->route('admin.report')->with('success','Report Created');
                }
            }else{
                return redirect()->back()->with('error','There is an Error while creating Report');
            }
        }else{
            return redirect()->back()->with('error','There is an Error while creating Report');
        }

    }
    public function update(Request $request)
    {
        $request->validate([
            'report_id' => 'required',
            'overview_id' => 'required',
        ]);
        $report = Report::where('id',$request->report_id)->first();
        $overview = Overview::find($request->overview_id)->first();
        $report->project_id = $request->projectType;
        $report->service_id = $request->serviceType;
        $report->industry_id = $request->industryType;
        $report->subindustry_id = $request->subindustry;
        $report->region_id = $request->region;
        $report->country_id = $request->country;
        $report->manager_id = $request->manager;
        $report->employee_id = $request->employee;
        $report->title = $request->projectTitle;
        $report->author = $request->author;
        $report->reportCode = $request->reportCode;
        $report->totalPages = $request->totalPages;
        $report->status = $request->status;
        $report->price = $request->price;
        if ($request->hasFile('projectPhoto')) {
            $filenameWithExt = $request->file('projectPhoto')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('projectPhoto')->getClientOriginalExtension();
            // Filename To store
            $projectPhoto = 'Q_' . time() . '.' . $extension;
            //$path = $request->file('projectPhoto')->storeAs("public/data/reports/", $projectPhoto);
            $path = $request->file('projectPhoto')->storeAs("public/data/reports/", $projectPhoto);
        }else{
            $projectPhoto = $report->photo;
        }
        $report->photo = $projectPhoto;
        $report->save();
        if($request->newContentTitle){
            $request->validate([
                'newContentTitle' => 'required',
                'newContentDetail' => 'required',
                'newContentPages' => 'required',
            ]);
            $newData = count($request->newContentTitle);
            for ($i = 0; $i < $newData; $i++) {
                $content = new Content;
                $content->report_id     = $report->id;
                $content->title         = $request['newContentTitle'][$i];
                $content->content       = $request['newContentDetail'][$i];
                $content->pages         = $request['newContentPages'][$i];
                $content->save();
            }

        }
        foreach($request->content_id as $item => $v){
            $data = array(
                'title' => $request->contentTitle[$item],
                'content' => $request->contentDetail[$item],
                'pages' => $request->contentPages[$item],
            );
            $content = Content::where('id',$request->content_id[$item])->first();
            $content->update($data);
        }
        if ($request->hasFile('contentFile')) {
            $filenameWithExt = $request->file('contentFile')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('contentFile')->getClientOriginalExtension();
            // Filename To store
            $contentFile = 'ContentFile' . time() . '.' . $extension;
            $path = $request->file('contentFile')->storeAs("public/data/reports/contents", $contentFile);
        }else {

            $contentFile = $overview->fileTableContent;
        }
        if ($request->hasFile('overviewFile')) {
            $filenameWithExt = $request->file('overviewFile')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('overviewFile')->getClientOriginalExtension();
            // Filename To store
            $overviewFile = 'OverviewFile_' . time() . '.' . $extension;
            $path = $request->file('overviewFile')->storeAs("public/data/reports/contents", $overviewFile);
        }
        else {
            $overviewFile = $overview->reportOverView;
        }
        if ($request->hasFile('docFile')) {
            $filenameWithExt = $request->file('docFile')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('docFile')->getClientOriginalExtension();
            // Filename To store
            $docFile = 'OverviewFile' . time() . '.' . $extension;
            $path = $request->file('docFile')->storeAs("public/data/reports/", $docFile);
        }
        else {
            $docFile = $overview->uploadDoc;
        }
        if ($request->hasFile('pptFile')) {
            $filenameWithExt = $request->file('pptFile')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('pptFile')->getClientOriginalExtension();
            // Filename To store
            $pptFile = 'OverviewFile' . time() . '.' . $extension;
            $path = $request->file('pptFile')->storeAs("public/data/reports/", $pptFile);
        }
        else {
            $pptFile = $overview->uploadPpt;
        }
        $overview->overview = $request->overview;
        $overview->faq = $request->faq;
        $overview->fileTableContent = $contentFile;
        $overview->reportOverView = $overviewFile;
        $overview->uploadDoc = $docFile;
        $overview->uploadPpt = $pptFile;
        $overview->save();
        return redirect()->back()->with('success','Record Updated');
    }
    function questionDelete(Request $request)
    {
        $request->validate([
            'delete_id' => 'required',
        ]);
        $content = Content::find($request->delete_id)->first();
        $content->delete();
        return redirect()->back()->with('success','Record Deleted');
    }
    function status(Request $request)
    {
        $request->validate([
            'reportId' => 'required',
            'status' => 'required',
        ]);



        $report = Report::where('id',$request->reportId)->first();
        $report->approve = $request->status;
        $report->save();

        return redirect()->back()->with('success','Status Updated');

    }
    function progressStatus(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'reportId' => 'required',
        ]);

        $pro_status = new ProjectStatus;
        $pro_status->user_id = Auth::user()->id;
        $pro_status->report_id = $request->reportId;
        $pro_status->comment = $request->comment;
        $pro_status->save();
        return redirect()->back()->with('success','New progress status marked');

    }
    public function issues()
    {
          $issues = ReportIssue::with('report')->get();
          return view('admin.reports.issues',compact('issues'));
    }
    function issuesSubmit(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'answer' => 'required',
        ]);
        $ReportIssue = ReportIssue::findOrFail($request->question_id);
        $ReportIssue->resolve_by = Auth::user()->id;
        $ReportIssue->answer = $request->answer;
        $ReportIssue->save();
        return redirect()->back()->with('success','Solution has been submited sucessfully');

    }
    function issuesDelete(Request $request)
    {
        $request->validate([
            'delete_id' => 'required',
        ]);
        $ReportIssue = ReportIssue::findOrFail($request->delete_id);
        $ReportIssue->delete();
        return redirect()->back()->with('success','Issue has been deleted sucessfully');

    }
    function trackUser()
    {
        $logs = Log::with('user', 'user.userDetail','report')->get();
        $users = User::get();
        return view('admin.reports.log',compact('logs','users'));
    }
    function fetchLog(Request $request)
    {
        $request->validate([
            'users' => 'required',
        ]);
        $reports   = Log::with('user', 'user.userDetail','report')->where('user_id',$request->users)->get();
        $users = User::get();
        return view('admin.reports.log',compact('reports','users'));
    }

    public function articleIndex (){
        
         $artices =Article::with('service','industry','region','country')->get();
        return view('admin.reports.article.index',compact('artices'));
    }
    public function article ()
    {
         
        $projects           = Project::select('id','projectType')->get();
        $categories           = ArticleCategory::get();
        $services           = Service::select('id','serviceType')->get();
        $industries         = Industry::select('id','industryType')->get();
        $subindustries      = Subindustry::select('id','subindustry')->get();
        $regions            = Region::select('id','region')->get();
        $countries          = Country::select('id','country')->get();
        $managers = User::role('Manager')->get();
        $employees = User::role('Employee')->get();
        return view('admin.reports.article.create',compact('categories','projects','services','industries','subindustries','regions','countries','managers','employees'));

    }

    public function articleSave (Request $request)
    {
       
        $request->validate([
            'articleType' => 'required',
            'serviceType' => 'required',
            'industryType' => 'required',
            'subindustry' => 'required',
            'region' => 'required',
            'country' => 'required',
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'author' => 'required',

        ]);
        
        $artice = new Article;
        $artice->category_id = $request->articleType;
        $artice->title = $request->title;
        $artice->service_id  = $request->serviceType;
        $artice->industry_id  = $request->industryType;
        $artice->subindustry_id  = $request->subindustry;
        $artice->region_id  = $request->region;
        $artice->country_id  = $request->country;
        $artice->description = $request->description;
        $artice->long_description = $request->long_description;
        $artice->author = $request->author;
        $artice->save();
        if ($request->hasFile('photo')) {
            $artice->addMediaFromRequest('photo')->toMediaCollection('article_main_photo');
        } 
       
        return redirect()->route('admin.report.article.index')->with('success','New artice has been added');

    }

    function delete(Request $request)
    {
        $request->validate([
            'delete_id' => 'required',
        ]);
        $Report = Report::findOrFail($request->delete_id);
        $Report->delete();
        return redirect()->back()->with('success','Report has been deleted sucessfully');

    }
    function articleDelete(Request $request)
    {
        $request->validate([
            'delete_id' => 'required',
        ]);
        $Article = Article::findOrFail($request->delete_id);
        $Article->delete();
        return redirect()->back()->with('success','Article has been deleted sucessfully');

    }

    function articleEdit($id)
    {

        $artice = Article::findOrFail($id);
        $projects           = Project::select('id','projectType')->get();
        $services           = Service::select('id','serviceType')->get();
        $industries         = Industry::select('id','industryType')->get();
        $subindustries      = Subindustry::select('id','subindustry')->get();
        $regions            = Region::select('id','region')->get();
        $countries          = Country::select('id','country')->get();
        $managers = User::role('Manager')->get();
        $employees = User::role('Employee')->get();
        $articleCategories = ArticleCategory::get();
        return view('admin.reports.article.edit',compact('articleCategories','artice','projects','services','industries','subindustries','regions','countries','managers','employees'));

    }

    public function articleUpdate (Request $request)
    {
        $request->validate([
            'artice' => 'required',
        ]);
        
        $artice = Article::findOrFail($request->artice);
        $artice->category_id = $request->articleType;
        $artice->title = $request->title;
        $artice->service_id  = $request->serviceType;
        $artice->industry_id  = $request->industryType;
        $artice->subindustry_id  = $request->subindustry;
        $artice->region_id  = $request->region;
        $artice->country_id  = $request->country;
        $artice->description = $request->description;
        $artice->long_description = $request->long_description;
        $artice->author = $request->author;
        $artice->save();
       
        if ($request->hasFile('photo')) {
            $artice->clearMediaCollection('article_main_photo');
            $artice->addMediaFromRequest('photo')->toMediaCollection('article_main_photo');
        } 
       
        return redirect()->back()->with('success','Artice has been updated');

    }

    public function category()
    {
        $categories =  ArticleCategory::get();
        return view('admin.reports.article.category',compact('categories'));
    }
    function categorySave(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ]);
        $category = new ArticleCategory;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->status ='active';
        $category->save();
        if($request->has('photo')){
            $category->addMediaFromRequest('photo')->toMediaCollection('article_photo');
        }
        return redirect()->back()->with('success','New Category has been added');
    }
    function categoryUpdate(Request $request)
    { 
        $request->validate([
            'title' => 'required', 
            'id' => 'required', 
            'description' => 'required',
        ]);
 
        $category = ArticleCategory::findOrFail($request->id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->status ='active';
        $category->save();
        if($request->has('photo')){
            $category->clearMediaCollection('article_photo');
            $category->addMediaFromRequest('photo')->toMediaCollection('article_photo');
        }
        return redirect()->back()->with('success','New Category has been added');
    }
    function categoryDelete(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        $Article = ArticleCategory::findOrFail($request->category_id);
        $Article->delete();
        return redirect()->back()->with('success','Article Category has been deleted');

    }
    public function articleTemplate()
    {
        $article_template = ArticleTemplate::first();
        return view('admin.reports.article.template',compact('article_template'));
    }

    public function articleTemplateUpdate(Request $request)
    {
        $request->validate([
            'article_template_id' => 'required',
        ]);
       
        $article_template = ArticleTemplate::find($request->article_template_id);
        $article_template->description = $request->description;
        $article_template->expertise = $request->expertise;
        $article_template->solution = $request->solution;
        $article_template->save();
        if($request->has('article_expert_photo')){
            $article_template->clearMediaCollection('article_expert_photo');
            $article_template->addMediaFromRequest('article_expert_photo')->toMediaCollection('article_expert_photo');
        }
        if($request->has('article_template_photo')){
            $article_template->clearMediaCollection('article_template_photo');
            $article_template->addMediaFromRequest('article_template_photo')->toMediaCollection('article_template_photo');
        }
        return redirect()->back()->with('success','Article Template Updated');
    }
    
  


}
