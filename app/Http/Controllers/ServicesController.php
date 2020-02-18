<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::all(); 
        return view('admin.service.index' , compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.new');
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
        
        $user = Service::create([
            'title' => $request->title,
            'description' => $request->description, 
            'short_description' => $request->short_description,            
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'status' => $request->status,

        ]);

         return redirect('service')->with('status', 'Service Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
         return redirect('service');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
                            'title' => 'required',
                            'description' => 'required',
                            'meta_keyword' => 'required',
                            'meta_title' => 'required',
                            'meta_description' => 'required'
                        ]);

        $service->title             =$request->title;
        $service->description       =$request->description;        
        $service->meta_keyword      =$request->meta_keyword;
        $service->meta_title        =$request->meta_title;
        $service->meta_description  =$request->meta_description;
        $service->status            =$request->status;

        $service->save();

        return redirect('service')->with('status', 'Service Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('service')->with('status', 'Service Deleted!');
    }

    /**
     * Display the service details
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $service=Service::where('id',$id)->first();
        return view('service.index',compact('service'));
    }    
}
