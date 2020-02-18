<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=Company::all(); 
        return view('admin.company.index' , compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.new');
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
        $destinationPath = public_path('/upload/company');
        $image->move($destinationPath, $input['imagename']);
        
        $user = Company::create([
            'title' => $request->title,
            'image' => $input['imagename'],             
            'sequence' => $request->sequence,
            'status' => $request->status,

        ]);

        return redirect('company')->with('status', 'Company Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return redirect('company');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $image = $request->file('image');

        if($image){
            $validatedData = $request->validate([
                            'title' => 'required',
                            'sequence' => 'required', 
                            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',                           
                        ]);
            @unlink(public_path('/upload/company')."/".$company->image);

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/company');
            $image->move($destinationPath, $input['imagename']);

            $company->image      =$input['imagename'];
        }
        else
        {
            $validatedData = $request->validate([
                    'title' => 'required',
                    'sequence' => 'required', 
                                              
                ]);
        }

        $company->title           =$request->title;
        $company->sequence     =$request->sequence;
        $company->status    =$request->status;
        
        $company->save();

        return redirect('company')->with('status', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        @unlink(public_path('/upload/company')."/".$company->image);
        $company->delete();
        return redirect('company')->with('status', 'Company Deleted!');
    }
}
