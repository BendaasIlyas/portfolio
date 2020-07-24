<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EducationCollection;
use App\Education;

class EducationController extends Controller
{
    //
    public function store(Request $request)
    {
      $education = new Education([
        'title' => $request->get('title'),
        'start_date' => $request->get('start_date'),
        'end_date' => $request->get('end_date'),
        'company' => $request->get('company'),
        'mission' => $request->get('mission')
      ]);

      $education->save();

      return response()->json('success');
    }

    public function index()
    {
      return new EducationCollection(Education::all());
    }

    public function edit($id)
    {
      $post = Education::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      $post = Education::find($id);

      $post->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Education::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }
}
