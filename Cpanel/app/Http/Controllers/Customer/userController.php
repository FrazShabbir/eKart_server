<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Attach;
use App\Models\Content;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Project;
use App\Models\Region;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Service;
use App\Models\Subindustry;
use App\Models\UserDetail;
use App\Models\ProjectStatus;
use App\Models\ReportIssue;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    public function dashboard(){
        $progress = ProjectStatus::with('user')->get();
        $news = Article::where('articleType','news')->get();
        $insights = Article::where('articleType','insights')->get();
        $markets = Article::where('articleType','markets')->get();
        return view('customer.dashboard',compact('progress','news','insights','markets'));
    }
    public function registration(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'last' => 'required|max:255',
            'company' => 'required|max:255',
            'designation' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $user = new User();
        $checkEmail  =  User::where('email',$request->email)->first();
        if($checkEmail != null){
            return redirect()->back()->with('error','Email Already Exists');
        }
        if ($request->hasFile('attach')) {

            $filenameWithExt = $request->file('attach')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('attach')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . time() . '.' . $extension;
            $path = $request->file('attach')->storeAs("public/data", $fileNameToStore);
        }else {
            $fileNameToStore = 'no_img.png';
        }
        $user->name = $request->name;
        $user->last = $request->last;
        $user->company = $request->company;
        $user->designation = $request->designation;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->status = 0;
        $user->role = 'customer';
        $user->password = Hash::make($request->password);

        if($user->save()){
            return redirect()->back()->with('success','User Created Successfully');
        }else{
            return redirect()->back()->with('error','There is an Error while creating User');
        }
    }
    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->with('userDetail')->first();
        return view('customer.profile.index',compact('user'));
    }
    public function work()
    {
        $reports = Report::where('employee_id',Auth::user()->id)->with('project')->get();
        return view('customer.work',compact('reports'));
    }

    public function workAdd()
    {
        $projects           = Project::select('id','projectType')->get();
        $services           = Service::select('id','serviceType')->get();
        $industries         = Industry::select('id','industryType')->get();
        $subindustries      = Subindustry::select('id','subindustry')->get();
        $regions            = Region::select('id','region')->get();
        $countries          = Country::select('id','country')->get();
        $managers = User::where('role','manager')->get();
        $employees = User::where('role','employee')->get();
        return view('customer.workAdd',compact('projects','services','industries','subindustries','regions','countries','managers','employees'));
    }

    public function orders()
    {
        $orders = Order::with('user')->where('user_id',Auth::user()->id)->get();
        return view('customer.myorders',compact('orders'));
    }
    public function editProfile()
    {
        $auth_id = Auth::user()->id;
        $user = User::with('UserDetail')->where('id',$auth_id)->first();
        $industries = Industry::get();
        return view('customer.profile.edit',compact('user','industries'));
    }
    public function notification()
    {
        return view('customer.notification');
    }
    public function profileUpdate(Request $request)
    {

        $request->validate([
            'id' => 'integer|required',
            'UserDetailId' => 'integer|required',
            'name' => 'max:255',
            'designation' => 'max:255',
            'company' => 'max:255',
            'education' => 'max:255',
            'about' => 'max:255',
            'business_intrest' => 'max:255',
            'others' => 'max:255',
        ]);


        $user = User::findOrfail($request->id);
        $user->name = $request->name;
        $userDetail = UserDetail::findOrfail($request->UserDetailId);
        $userDetail->designation = $request->designation;
        $userDetail->company = $request->company;
        $userDetail->industry_id = $request->industry_id;
        $userDetail->education = $request->education;
        $userDetail->about = $request->about;
        $userDetail->business_intrest = $request->business_intrest;
        $userDetail->others = $request->others;


        if ($request->hasFile('resume')) {
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileNameToStore = $filename . time() . '.' . $extension;
            $path = $request->file('resume')->storeAs("public/data", $fileNameToStore);
        }else {
            $fileNameToStore = $userDetail->resume;
        }

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs("public/data", $fileNameToStore2);
        }else {
            $fileNameToStore2 = $userDetail->photo;
        }

        $userDetail->resume = $fileNameToStore;
        $userDetail->photo = $fileNameToStore2;
        $user->save();
        $userDetail->save();
        return redirect()->back()->with('success','Profile Updated');
    }
    public function invoice($id)
    {
        $order = Order::with('user')->where('id',$id)->first();
        $orderdetails = OrderDetail::where('orderId',$id)->get();
        return view('customer.invoice',compact('orderdetails','order'));
    }

    public function orderDetails($id)
    {
        $orderdetails = OrderDetail::where('orderId',$id)->with('report')->get();
        return view('customer.orderDetail',compact('orderdetails'));
    }

    public function reportInfo($id)
    {
         $report = Report::where('id',$id)->with('overview')->first();

        $details = Content::where('report_id',$id)->get();
        return view('customer.reportInfo',compact('report','details'));
    }

    public function riseIssue($id)
    {

          $issues = ReportIssue::where('report_id',$id)->with('report')->get();
          return view('customer.issues',compact('issues','id'));
    }

    public function storeIssue(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'report_id' => 'required',
        ]);

        $issues = new ReportIssue;
        $issues->report_id  = $request->report_id;
        $issues->question = $request->question;
        $issues->create_by = Auth::user()->id;
        $issues->save();
        return redirect()->back()->with('success','Issue has been reported successfully');
    }


}
