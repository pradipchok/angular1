<?php

namespace App\Http\Controllers;

use App\news;
use App\Content;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=news::all(); 
        return view('admin.news.index' , compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                            'title' => 'required','description' => 'required','short_description'=>'required','meta_keyword' => 'required','meta_title' => 'required','meta_description' => 'required',                            
                        ]);
        
        $user = news::create([
            'title' => $request->title,
            'description' => $request->description, 
            'short_description' => $request->short_description,            
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'status' => $request->status,

        ]);

         return redirect('news')->with('status', 'News Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        return redirect('news');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        $validatedData = $request->validate([
                            'title' => 'required',
                            'description' => 'required',
                            'short_description' => 'required',
                            'meta_keyword' => 'required',
                            'meta_title' => 'required',
                            'meta_description' => 'required'
                        ]);

        $news->title             =$request->title;
        $news->description       =$request->description;
        $news->short_description =$request->short_description;
        $news->meta_keyword      =$request->meta_keyword;
        $news->meta_title        =$request->meta_title;
        $news->meta_description  =$request->meta_description;
        $news->status            =$request->status;

        $news->save();

        return redirect('news')->with('status', 'News Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        $news->delete();
        return redirect('news')->with('status', 'News Deleted!');
    }

    public function allnews()
    {
        $content=Content::where('id',7)->first();
        $news=News::where('status',1)->get();
        return view('news.index',compact('news','content'));
    }

    public function details($id)
    {        
        $news=News::where('status',1)->where('id',$id)->first();
        return view('news.details',compact('news'));
    }
}
