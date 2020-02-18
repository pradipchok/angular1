<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Product;
use App\Service;
use App\news;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }   

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $content=Content::where('id',1)->first();
        $company=Company::where('status',1)->orderBy('sequence')->get();
        return view('home.index',compact('content','company'));
    }

    // Career
    public function careers()
    {
        $content=Content::where('id',6)->first();
        return view('careers.index',compact('content'));
    }

    // About us
    public function aboutUs()
    {
        $content=Content::where('id',2)->first();
        return view('aboutus.index',compact('content'));
    }

    // Search
    public function search(Request $request)
    {
        $search=$request->input('search');
        if(trim($search)=='' || trim($search)=='Enter your search')   
            return view('search.search');
        else
        {
            $search="%".$search."%";
            $contents=Content::where('title', 'like', $search)
            ->where('title', 'like', $search)
            ->orWhere('description', 'like', $search)            
            ->get();

            $products=Product::where('title', 'like', $search)
                ->orWhere('description', 'like', $search)->get();

            $services=Service::where('title', 'like', $search)
                ->orWhere('description', 'like', $search)->get();
            $news=News::where('title', 'like', $search)
                ->orWhere('description', 'like', $search)
                ->orWhere('short_description', 'like', $search)
                ->get();

            return view('search.index',compact('contents','products','services','news'));
        }
    }
    // Welcome
    public function welcome(Request $request)
    {
        return view('welcome');
    }
}
