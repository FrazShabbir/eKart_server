<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whyus;
class WhyusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whys = Whyus::all();
        return view('admin.whyus.index')
            ->with('whys', $whys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required',
        'description'=>'required',
        'icon'=>'required',
       ]);
         $why = new Whyus();
            $why->title = $request->title;
            $why->description = $request->description;
            if($request->hasFile('icon')){
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/whyus/', $filename);
                $why->icon = 'uploads/whyus/'.$filename;
            }
            $why->save();
            return redirect()->route('admin.cms.why');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $why = Whyus::find($id);
         $why->delete();
        return redirect()->route('admin.cms.why');
    }
}
