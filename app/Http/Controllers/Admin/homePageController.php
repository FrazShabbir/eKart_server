<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeText;
class homePageController extends Controller
{
    public function index()
    {
      
        $HomeText = HomeText::first();
        return view('admin.homePageText',compact('HomeText'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
        ]);

        $home = HomeText::where('id',$request->page_id)->first();
        $home->head1 =  $request->head1;
        $home->subhead1 =  $request->subhead1;
        $home->head2 =  $request->head2;
        $home->subhead2 =  $request->subhead2;
        $home->head3 =  $request->head3;
        $home->subhead3 =  $request->subhead3;
        $home->head4 =  $request->head4;
        $home->subhead4 =  $request->subhead4;
        $home->footerContent =  $request->footerContent;
        $home->serviceContent =  $request->serviceContent;
        $home->industiryContent =  $request->industiryContent;
        $home->insightsContent =  $request->insightsContent;
        $home->analysisContent =  $request->analysisContent;


        if ($request->hasFile('head1img')){
            $filenameWithExt = $request->file('head1img')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('head1img')->getClientOriginalExtension();
            // Filename To store
            $head1img = $filename.time().'.'.$extension;
            $path = $request->file('head1img')->storeAs("public/data", $head1img);
          }else{
            $head1img = $home->head1img;
          }


          if ($request->hasFile('head2img')){
            $filenameWithExt = $request->file('head2img')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('head2img')->getClientOriginalExtension();
            // Filename To store
            $head2img = $filename.time().'.'.$extension;
            $path = $request->file('head2img')->storeAs("public/data", $head2img);
          }else{
            $head2img = $home->head2img;
          }


          if ($request->hasFile('head3img')){
            $filenameWithExt = $request->file('head3img')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('head3img')->getClientOriginalExtension();
            // Filename To store
            $head3img = $filename.time().'.'.$extension;
            $path = $request->file('head3img')->storeAs("public/data", $head3img);
          }else{
            $head3img = $home->head3img;
          }



          if ($request->hasFile('head4img')){
            $filenameWithExt = $request->file('head4img')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('head4img')->getClientOriginalExtension();
            // Filename To store
            $head4img = $filename.time().'.'.$extension;
            $path = $request->file('head4img')->storeAs("public/data", $head4img);
          }else{
            $head4img = $home->head4img;
          }

          if ($request->hasFile('logo')){
            $filenameWithExt = $request->file('logo')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename To store
            $logo  = $filename.time().'.'.$extension;
            $path = $request->file('logo')->storeAs("public/data", $logo);
          }else{
            $logo = $home->logo;
          }






        $home->head1img =  $head1img;
        $home->head2img =  $head2img;
        $home->head3img =  $head3img;
        $home->head4img =  $head4img;
        $home->logo     =  $logo;

        if($home->save()){
            return redirect()->back()->with('success', 'Record Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }
}
