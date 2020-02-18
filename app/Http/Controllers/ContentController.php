<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Content;
class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents=Content::all(); 
        return view('admin.content.index' , compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.new');
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
                            'title' => 'required','description' => 'required','meta_keyword' => 'required','meta_title' => 'required','meta_description' => 'required',                            
                        ]);
        
        $user = Content::create([
            'title' => $request->title,
            'description' => $request->description,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
        ]);

         return redirect('content')->with('status', 'Content Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return redirect('content');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
         return view('admin.content.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $validatedData = $request->validate([
                            'title' => 'required',
                            'description' => 'required',
                            'meta_keyword' => 'required',
                            'meta_title' => 'required',
                            'meta_description' => 'required'
                        ]);

        $content->title           =$request->title;
        $content->description     =$request->description;
        $content->meta_keyword    =$request->meta_keyword;
        $content->meta_title      =$request->meta_title;
        $content->meta_description=$request->meta_description;

        $content->save();

        return redirect('content')->with('status', 'Content Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect('content')->with('status', 'Content Deleted!');
    }
}