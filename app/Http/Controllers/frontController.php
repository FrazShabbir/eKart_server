<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutQuery;
use App\Models\Accessibilitys;
use App\Models\ApplyRequirement;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTemplate;
use App\Models\Contact;
use App\Models\Disclaimer;
use App\Models\Event;
use App\Models\HomeText;
use App\Models\Industry;
use App\Models\Legal;
use App\Models\News;
use App\Models\Option;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OurClient;
use App\Models\Press;
use App\Models\Privacy;
use App\Models\Report;
use App\Models\Requirement;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontController extends Controller
{
    public function index()
    {

        $home = HomeText::first();
        $lastReport = Report::orderBy('id', 'desc')->first();
        $news = Article::where('category_id', 1)->get();
        $insights = Article::where('category_id', 2)->get();
        $markets = Article::where('category_id', 3)->get();
        $financialmarkets = Article::where('category_id', 4)->get();
        $chemicalsandmaterials = Article::where('category_id', 5)->get();

        return view('index', compact('home', 'lastReport', 'news', 'insights', 'markets', 'financialmarkets', 'chemicalsandmaterials'));

    }

    public function articles()
    {

        $article_categories = ArticleCategory::with('articles')->get();
        return view('article.index', compact('article_categories'));
    }

    public function articleByTypeall($id)
    {
        $article_cat = ArticleCategory::where('title', $id)->first();
        $articles = Article::where('category_id', $article_cat->id)->get();

        //  dd($article_cat);
        return view('articles_cat')
        ->with('articles', $articles)
        ->with('article_cat', $article_cat);
    }

    public function articleByType($type, $id)
    {

        $article_cat = ArticleCategory::find($id);
        $articles = Article::where('category_id', $id)->get();
        $article_template = ArticleTemplate::first();
        return view('article.type', compact('articles', 'article_template', 'type', 'article_cat'));
    }

    public function articleDetails($id)
    {
        $article = Article::findOrFail($id);
        // dd($article->subindustry_id);
        $full = false;
        //  dd($article->subindustry_id);
        if (Auth::user()) {

            $orders = Order::with('user')->where('user_id', Auth::user()->id)->get();
            $reports = [];
            foreach ($orders as $order) {
                $orders_details = OrderDetail::where('order_id', $order->id)->get();
                foreach ($orders_details as $order_detail) {
                    $reports[] = $order_detail->subindustry_id;
                }
            }
            $reports_2 = [];
            foreach ($orders as $order) {
                $orders_details_2 = OrderDetail::where('order_id', $order->id)->get();
                foreach ($orders_details_2 as $order_detail) {
                    $reports_2[] = $order_detail->article_id;
                }
            }

            // dd($article->subindustry_id,$reports);
            if (in_array($article->subindustry_id, $reports)) {
                $full = true;
            } else {
                $full = false;
            }
        }

// return $full;
        $latest = Article::where('id', '!=', $article->id)->orderBy('id', 'desc')->take(5)->get();
        return view('article.details', compact('article', 'latest', 'full'));
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function contact()
    {
        $contact = Option::first();
        $industries = Industry::get();
        return view('contact', compact('contact', 'industries'));
    }
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'company' => 'required',
            'title' => 'required',
            'number' => 'required',
            'industry' => 'required',
            'desc' => 'required',
            'company_email' => 'required',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->last = $request->last;
        $contact->company = $request->company;
        $contact->title = $request->title;
        $contact->number = $request->number;
        $contact->company_email = $request->company_email;
        $contact->industry = $request->industry;
        $contact->desc = $request->desc;
        if ($contact->save()) {
            return redirect()->route('contact')->with('success', 'Contact Request Submited');
        } else {
            return redirect()->back()->with('error', 'Error While Submiting');
        }
    }

    public function aboutUs()
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function pressReleases()
    {
        $press = Press::first();
        return view('press', compact('press'));
    }
    public function ourclients()
    {
        $client = OurClient::first();
        return view('clients', compact('client'));
    }
    public function companynews()
    {
        $news = News::first();
        return view('news', compact('news'));
    }

    public function events()
    {
        $events = Event::first();
        return view('events', compact('events'));
    }

    public function termsConditions()
    {
        $terms = Terms::first();
        return view('terms', compact('terms'));
    }

    public function privacy()
    {
        $privacy = Privacy::first();
        return view('privacy ', compact('privacy'));
    }

    public function disclaimer()
    {
        $disclaimer = Disclaimer::first();
        return view('disclaimer ', compact('disclaimer'));
    }

    public function legal()
    {
        $legal = Legal::first();
        return view('legal ', compact('legal'));
    }

    public function accessibilitys()
    {
        $accessibilitys = Accessibilitys::first();
        return view('accessibilitys ', compact('accessibilitys'));
    }

    public function aboutConnect(Request $request)
    {

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
    public function requirements()
    {

        $home = HomeText::first();
        $lastReport = Report::orderBy('id', 'desc')->first();
        $news = Article::where('category_id', 1)->get();
        $insights = Article::where('category_id', 2)->get();
        $markets = Article::where('category_id', 3)->get();
        $financialmarkets = Article::where('category_id', 4)->get();
        $chemicalsandmaterials = Article::where('category_id', 5)->get();
        $requiremnts = Requirement::with('applied')->get();
        return view('front.requirements', compact('requiremnts', 'home', 'lastReport', 'news', 'insights', 'markets', 'financialmarkets', 'chemicalsandmaterials'));

    }
    public function requirements_apply(Request $request)
    {
        $id = $request->id;
        $check_req = ApplyRequirement::where('requirement_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($check_req) {
            return response([
                'status' => false,
                'message' => 'You Already Applied for this Requirement',
            ]);
        }
        $applied = new ApplyRequirement;
        $applied->requirement_id = $id;
        $applied->user_id = Auth::user()->id;
        $applied->save();
        return response([
            'status' => true,
            'message' => 'You have applied Successfully',
        ]);
    }

}
