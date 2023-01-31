<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutQuery;
use App\Models\Accessibilitys;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\HomeText;
use App\Models\Contact;
use App\Models\Disclaimer;
use App\Models\Event;
use App\Models\Industry;
use App\Models\Legal;
use App\Models\News;
use App\Models\Option;
use App\Models\OurClient;
use App\Models\Press;
use App\Models\Privacy;
use App\Models\Report;
use App\Models\Terms;

class frontController extends Controller
{
    public function index()
    {
        $home = HomeText::first();
        $lastReport = Report::orderBy('id','desc')->first();
        $news = Article::where('articleType','news')->get();
        $insights = Article::where('articleType','insights')->get();
        $markets = Article::where('articleType','markets')->get();
        $financialmarkets = Article::where('articleType','financialmarkets')->get();
        $chemicalsandmaterials = Article::where('articleType','chemicalsandmaterials')->get();
        return view('index',compact('home','lastReport','news','insights','markets','financialmarkets','chemicalsandmaterials'));


    }

    public function articles(){


       // $articles = Article::get();
        $financialmarkets = Article::where('articleType','financialmarkets')->get();
        $chemicalsandmaterials = Article::where('articleType','chemicalsandmaterials')->get();
        $energynaturalresources = Article::where('articleType','energynaturalresources')->get();
        $agriculturefoodandbeverages = Article::where('articleType','agriculturefoodandbeverages')->get();
        return view('article.index',compact('financialmarkets','chemicalsandmaterials','energynaturalresources','agriculturefoodandbeverages'));
    }


    public function articleByType($type){
        $articles = Article::where('articleType',$type)->get();
        return view('article.type',compact('articles'));
    }

    public function articleDetails($id){
        $article = Article::findOrFail($id);
        return view('article.details',compact('article'));
    }


    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function contact()
    {
        $contact = Option::first();
        $industries = Industry::get();
        return view('contact',compact('contact','industries'));
    }
    public function contactSubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'company' => 'required',
            'title' => 'required',
            'number' => 'required',
            'industry' => 'required',
            'desc' => 'required',
            'company_email'=> 'required',
        ]);
        $contact = new Contact;
        $contact->name  = $request->name;
        $contact->last = $request->last;
        $contact->company = $request->company;
        $contact->title = $request->title;
        $contact->number = $request->number;
        $contact->company_email = $request->company_email;
        $contact->industry = $request->industry;
        $contact->desc = $request->desc;
        if($contact->save()){
            return redirect()->route('contact')->with('success', 'Contact Request Submited');
        }else{
            return redirect()->back()->with('error', 'Error While Submiting');
        }
    }

    public function aboutUs()
    {
        $about = About::first();
        return view('about',compact('about'));
    }


    public function pressReleases()
    {
        $press = Press::first();
        return view('press',compact('press'));
    }
    public function ourclients()
    {
        $client = OurClient::first();
        return view('clients',compact('client'));
    }
    public function companynews()
    {
        $news = News::first();
        return view('news',compact('news'));
    }

    public function events()
    {
        $events = Event::first();
        return view('events',compact('events'));
    }

    public function termsConditions ()
    {
        $terms = Terms::first();
        return view('terms',compact('terms'));
    }

    public function privacy  ()
    {
        $privacy  = Privacy::first();
        return view('privacy ',compact('privacy'));
    }

    public function disclaimer  ()
    {
        $disclaimer  = Disclaimer::first();
        return view('disclaimer ',compact('disclaimer'));
    }

    public function legal  ()
    {
        $legal  = Legal::first();
        return view('legal ',compact('legal'));
    }

    public function accessibilitys  ()
    {
        $accessibilitys  = Accessibilitys::first();
        return view('accessibilitys ',compact('accessibilitys'));
    }

    public function aboutConnect(Request $request){

        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'company' => 'required',
            'description' => 'required',

        ]);
        $aboutQuery = new AboutQuery;
        $aboutQuery->name = $request->name;
        $aboutQuery->last = $request->last;
        $aboutQuery->email = $request->email;
        $aboutQuery->phone = $request->phone;
        $aboutQuery->country = $request->country;
        $aboutQuery->company = $request->company;
        $aboutQuery->description = $request->description;
        $aboutQuery->save();
        return redirect()->back()->with('success', 'Connect Request has been submited successfully');

    }


}
