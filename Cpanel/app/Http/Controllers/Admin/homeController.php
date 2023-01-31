<?php

namespace App\Http\Controllers\Admin;
use App\Models\HomeText;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Accessibilitys;
use App\Models\Client;
use App\Models\Disclaimer;
use App\Models\Event;
use App\Models\Legal;
use App\Models\News;
use App\Models\OurClient;
use App\Models\Press;
use App\Models\Privacy;
use App\Models\Terms;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $HomeText = HomeText::first();
        return view('admin.homePageText',compact('HomeText'));
    }

    public function about()
    {
        $about = About::first();
        return view('admin.about',compact('about'));
    }

    public function client()
    {
        $client = OurClient::first();
        return view('admin.client',compact('client'));
    }

    public function press()
    {
        $press = Press::first();
        return view('admin.press',compact('press'));
    }

    public function news()
    {
        $news = News::first();
        return view('admin.news',compact('news'));
    }


    public function event()
    {
        $event = Event::first();
        return view('admin.event',compact('event'));
    }

    public function termsconditions()
    {
        $terms = Terms::first();
        return view('admin.terms',compact('terms'));
    }

    public function privacy()
    {
        $privacy = Privacy::first();
        return view('admin.privacy',compact('privacy'));
    }

    public function disclaimer()
    {
        $disclaimer = Disclaimer::first();
        return view('admin.disclaimer',compact('disclaimer'));
    }
    public function legal()
    {
        $legal = Legal::first();
        return view('admin.legal',compact('legal'));
    }
    public function accessibilitys()
    {
        $accessibilitys = Accessibilitys::first();
        return view('admin.accessibilitys',compact('accessibilitys'));
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



    public function aboutUpdate(Request $request)
    {
        $request->validate([
            'about_id' => 'required',
        ]);
        $about = About::where('id',$request->about_id)->first();
        $about->heading =  $request->heading;
        $about->content_heading =  $request->content_heading;
        $about->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $about->banner;
        }
        $about->banner     =  $banner;
        if($about->save()){
            return redirect()->back()->with('success', 'About Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }



    public function clientUpdate(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
        ]);
       $client = OurClient::where('id',$request->client_id)->first();
       $client->heading =  $request->heading;
       $client->content_heading =  $request->content_heading;
       $client->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner =$client->banner;
        }
       $client->banner     =  $banner;
        if($client->save()){
            return redirect()->back()->with('success', 'Client Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }



    public function pressUpdate(Request $request)
    {
        $request->validate([
            'press_id' => 'required',
        ]);
        $press = Press::where('id',$request->press_id)->first();
        $press->heading =  $request->heading;
        $press->content_heading =  $request->content_heading;
        $press->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $press->banner;
        }
        $press->banner     =  $banner;
        if($press->save()){
            return redirect()->back()->with('success', 'Press Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }


    public function newsUpdate(Request $request)
    {
        $request->validate([
            'news_id' => 'required',
        ]);
        $news = News::where('id',$request->news_id)->first();
        $news->heading =  $request->heading;
        $news->content_heading =  $request->content_heading;
        $news->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $news->banner;
        }
        $news->banner     =  $banner;
        if($news->save()){
            return redirect()->back()->with('success', 'News Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }


    public function eventUpdate(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
        ]);
        $event = Event::where('id',$request->event_id)->first();
        $event->heading =  $request->heading;
        $event->content_heading =  $request->content_heading;
        $event->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $event->banner;
        }
        $event->banner     =  $banner;
        if($event->save()){
            return redirect()->back()->with('success', 'Event Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }




    public function termsconditionsUpdate(Request $request)
    {
        $request->validate([
            'terms_id' => 'required',
        ]);
        $terms = Terms::where('id',$request->terms_id)->first();
        $terms->heading =  $request->heading;
        $terms->content_heading =  $request->content_heading;
        $terms->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $terms->banner;
        }
        $terms->banner     =  $banner;
        if($terms->save()){
            return redirect()->back()->with('success', 'Terms Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }



    public function privacyUpdate(Request $request)
    {
        $request->validate([
            'privacy_id' => 'required',
        ]);

        $privacy = Privacy::where('id',$request->privacy_id)->first();
        $privacy->heading =  $request->heading;
        $privacy->content_heading =  $request->content_heading;
        $privacy->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $privacy->banner;
        }
        $privacy->banner     =  $banner;
        if($privacy->save()){
            return redirect()->back()->with('success', 'Privacy Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }


    public function disclaimerUpdate(Request $request)
    {
        $request->validate([
            'disclaimer_id' => 'required',
        ]);
        $event = Disclaimer::where('id',$request->disclaimer_id)->first();
        $event->heading =  $request->heading;
        $event->content_heading =  $request->content_heading;
        $event->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $event->banner;
        }
        $event->banner     =  $banner;
        if($event->save()){
            return redirect()->back()->with('success', 'Disclaimer Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }


    public function legalUpdate(Request $request)
    {
        $request->validate([
            'legal_id' => 'required',
        ]);
        $event = Legal::where('id',$request->legal_id)->first();
        $event->heading =  $request->heading;
        $event->content_heading =  $request->content_heading;
        $event->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $event->banner;
        }
        $event->banner     =  $banner;
        if($event->save()){
            return redirect()->back()->with('success', 'Legal Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }


    public function accessibilitysUpdate(Request $request)
    {
        $request->validate([
            'accessibilitys_id' => 'required',
        ]);
        $event = Accessibilitys::where('id',$request->accessibilitys_id)->first();
        $event->heading =  $request->heading;
        $event->content_heading =  $request->content_heading;
        $event->content =  $request->content;
        if ($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $banner  = 'About-Us-'.time().'.'.$extension;
            $path = $request->file('banner')->storeAs("public/data", $banner);
        }else{
            $banner = $event->banner;
        }
        $event->banner     =  $banner;
        if($event->save()){
            return redirect()->back()->with('success', 'Accessibilitys Page Data has been updated');
        }else{
            return redirect()->back()->with('error', 'Error While Updating');
        }


    }







}
