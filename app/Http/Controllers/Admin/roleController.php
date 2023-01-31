<?php

 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class roleController extends Controller
{
    public function index()
    {
        $count = 0;
        $roles = User::select('role')->groupBy('role')->get();
        return view('admin.role.index',compact('roles'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [

            'role' => 'required'
        ]);

        $role =  new Role;

        $role->name = $request->role;
        $role->guard_name = 'web';
        $role ->save();

        return redirect()->back()->with('success', 'Role Created Successful!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [

            'role' => 'required',
            'id' => 'required'
        ]);

        $role = Role::find($request->id);

        $role->name = $request->role;

        $role ->save();

        return redirect()->back()->with('success', 'Role Updated Successful!');
    }





}
