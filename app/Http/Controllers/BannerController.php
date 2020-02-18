<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=Banner::all(); 
        return view('admin.banner.index' , compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.banner.new');
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
                            'title' => 'required',
                            'sequence' => 'required', 
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',                           
                        ]);
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/banner');
        $image->move($destinationPath, $input['imagename']);
        
        $user = Banner::create([
            'title' => $request->title,
            'image' => $input['imagename'],             
            'sequence' => $request->sequence,
            'status' => $request->status,

        ]);

        return redirect('banner')->with('status', 'Banner Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return redirect('banner');
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
       return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        
        $image = $request->file('image');

        if($image){
            $validatedData = $request->validate([
                            'title' => 'required',
                            'sequence' => 'required', 
                            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',                           
                        ]);
            @unlink(public_path('/upload/banner')."/".$banner->image);

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/banner');
            $image->move($destinationPath, $input['imagename']);

            $banner->image      =$input['imagename'];
        }
        else
        {
            $validatedData = $request->validate([
                    'title' => 'required',
                    'sequence' => 'required', 
                                              
                ]);
        }

        $banner->title           =$request->title;
        $banner->sequence     =$request->sequence;
        $banner->status    =$request->status;
        
        $banner->save();

        return redirect('banner')->with('status', 'Banner Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        @unlink(public_path('/upload/banner')."/".$banner->image);
        $banner->delete();
        return redirect('banner')->with('status', 'Banner Deleted!');
    }
}
