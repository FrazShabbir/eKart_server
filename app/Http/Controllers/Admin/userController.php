<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Contact;
use App\Models\Order;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\RegistrationConfirmation;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{

    public function adminDashboard(){
        $publishreports = Report::where('approve',2)->count();
        $pendingreports = Report::where('approve',0)->count();
        $orders = Order::count();
        $enquires = Contact::count();
        $pendingCustomer = User::where('status',0)->where('role','customer')->count();
        $customer = User::where('status',1)->where('role','customer')->count();
        $latestOrders = Order::orderBy('id','desc')->limit(5)->get();
        // $activeCustomer = User::where()->count();

        return view('admin.dashboard',compact('publishreports','pendingreports','orders','enquires','customer','pendingCustomer','latestOrders'));
    }
    public function customerDashboard(){
        return view('customer.dashboard');
    }
    public function registerUser(){
         $users =  User::where('status',2)->with('userDetail')->get();
         return view('admin.user.index',compact('users'));
    }

    public function pendingUser(){
           $users= User::where('status',0)->with('userDetail')->get();
        return view('admin.user.pending',compact('users'));
    }

    public function managerUsers(){
        $users = User::where('role','manager')->get();
        return view('admin.user.manager',compact('users'));
    }

    public function employeeUsers(){
        $users = User::where('role','employee')->get();
        return view('admin.user.employee',compact('users'));
    }

    public function customerUsers(){
        $users = User::where('role','customer')->with('userDetail')->get();
        return view('admin.user.customer',compact('users'));
    }



    public function create(){
        //$roles = Role::where('name','!=','Customer')->get();
        return view('admin.user.create');
    }

    public function addNewCustomer()
    {
        return view('admin.user.newCustomer');
    }


    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'company' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $checkEmail  =  User::where('email',$request->email)->first();
        if($checkEmail){
            return redirect()->route('register')->with('error','Email Already Exists');
        }
        if ($request->hasFile('attach')) {
            $filenameWithExt = $request->file('attach')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('attach')->getClientOriginalExtension();
            $fileNameToStore = $filename . time() . '.' . $extension;
            $path = $request->file('attach')->storeAs("public/data", $fileNameToStore);
        }
        else {
            $fileNameToStore = 'no_img.png';
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->role = 'customer';
        // $user->last = $request->last;
        // $user->company = $request->company;
        // $user->designation = $request->designation;
        // $user->address = $request->address;
        // $user->city = $request->city;
        // $user->state = $request->state;
        // $user->zip = $request->zip;
        // $user->phone = $request->phone;
        if($user->save()){
            $details = new UserDetail;
            $details->user_id = $user->id;
            $details->last = $request->last;
            $details->designation = $request->designation;
            $details->company = $request->company;
            $details->city = $request->last;
            $details->state = $request->last;
            $details->zip = $request->last;
            $details->phone = $request->phone;
            $details->resume = $fileNameToStore;
            $details->save();
            Mail::to('alli@gmail.xom')->send(new RegistrationConfirmation);
            return redirect()->back()->with('success','User Created Successfully');
        }else{
            return redirect()->back()->with('error','There is an Error while creating User');
        }


    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'phone' => 'required',
            'education'=>'required',
            'experience'=>'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $checkEmail  =  User::where('email',$request->email)->first();
        if($checkEmail != null){
            return redirect()->back()->with('error','Email Already Exists');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->role = $request->role;
        if($user->save()){
            $userDetail =  new UserDetail;
            $userDetail->user_id = $user->id;
            $userDetail->last = $request->last;
            $userDetail->phone = $request->phone;
            $userDetail->education = $user->education;
            $userDetail->experience = $user->experience;
            return redirect()->route('admin.pending.users')->with('success','User Created Successfully');
        }else{
            return redirect()->back()->with('error','There is an Error while creating User');
        }

    }

    public function customerLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //Check User Role

            $role = Auth::user()->role;
            if($role == 'admin' or $role == 'manager'){
                return redirect()->route("admin.dashboard")->withSuccess('Welcome to Admin Panel');
            }
            return redirect()->route('customer.dashboard')->withSuccess('Welcome to Customer Dashboard');
        }
        return redirect("login")->withError('Login details are not valid');
    }

    public function loginProcess(Request $request)
    {






    }

    public function profile()
    {
        return view('admin.user.profile');
    }
    public function customerProfile()
    {
        return view('customer.profile.index');
    }
    public function work()
    {
        return view('customer.work');
    }

    public function workAdd()
    {
        return view('customer.workAdd');
    }
    public function orders()
    {
        return view('customer.myorders');
    }
    public function editProfile()
    {
        return view('customer.profile.edit');
    }
    public function notification()
    {
        return view('customer.notification');
    }




    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $user = User::findOrfail(Auth::user()->id);
        $user->name = $request->name;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('success','Profile Updated');
    }


    public function statusUpdate(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'status'=> 'required',
        ]);

        $user = User::findOrfail($request->userId);
        $user->status = $request->status;
        $user->save();
        return redirect()->back()->with('success','Status Updated');
    }


    public function customerEdit($id)
    {
        $user = User::findOrfail($id);
        return view('admin.user.customerEdit',compact('user'));
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $user = User::findOrfail($request->user_id);
        if($user->delete()){
            return redirect()->back()->with('success','User has been deleted successfully');
        }

    }
    public function edit($id)
    {
         $user = User::where('id',$id)->with('userDetail')->first();
        return view('admin.user.edit',compact('user'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

         $user = User::where('id',$request->user_id)->first();
         $user->name = $request->name;
         if($request->password != ''){
            $user->password = Hash::make($request->password);
         }
         if($user->save()){
            $userDetail = UserDetail::where('user_id',$user->id)->first();
            $userDetail->last = $request->last;
            $userDetail->phone = $request->phone;
            $userDetail->education = $request->education;
            $userDetail->experience = $request->experience;
            $userDetail->save();
            return redirect()->back()->with('success','User has been updated successfully');
        }else{
            return redirect()->back()->with('error','There is an Error while updating User');
        }


    }




}
