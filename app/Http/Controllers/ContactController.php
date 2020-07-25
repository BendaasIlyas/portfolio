<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ContactCollection;
use App\Contact;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
    //   $post = new Contact([
    //     'name' => $request->get('name'),
    //     'email' => $request->get('email'),
    //     'phone' => $request->get('phone'),
    //     'subject' => $request->get('subject'),
    //     'message' => $request->get('message')
    //   ]);

    //   $post->save();
      
    //   return response()->json('success');
    
    
   	// Validate request based on form inputs

    $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'subject'=>'required',
        'message' => 'required'
     ]);

    //  Store data in database
    Contact::create($request->all());

    // 
    //return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    return response()->json(null, 200);
}
}
