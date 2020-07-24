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
      $post = new Contact([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'message' => $request->get('message')
      ]);

      $post->save();

      return response()->json('success');
    }
}
