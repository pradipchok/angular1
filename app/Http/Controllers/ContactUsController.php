<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Content;
use Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content=Content::where('id',8)->first();
        return view('contactus.index',compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                            'first_name' => 'required','last_name' => 'required','email' => 'required|email','phone' => 'required','message' => 'required',                            
                        ]);
        
        $user = ContactUs::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        
        // mail remains be created here
        $to_name = 'Redshift';
        $to_email = 'info@redshiftenvironmentalsystems.com';
        $dataMail = array('first_name' => $request->first_name,'last_name' => $request->last_name,'email' => $request->email,'phone' => $request->phone,'content' => $request->message);
            
        Mail::send('emails.mail', $dataMail, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Redshift Contact Us');
            $message->from('info@redshiftenvironmentalsystem.com','Redshift');
        });


         return redirect()->route('contactus.index')->with('status', 'Thanks for contacting us!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
