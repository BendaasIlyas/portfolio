<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ExperienceCollection;
use App\Experience;

class ExperienceController extends Controller
{
    //
    public function store(Request $request)
    {
      $experience = new Experience([
        'title' => $request->get('title'),
        'start_date' => $request->get('start_date'),
        'end_date' => $request->get('end_date'),
        'company' => $request->get('company'),
        'mission' => $request->get('mission')
      ]);

      $experience->save();

      return response()->json('success');
    }

    public function index()
    {
      return new ExperienceCollection(Experience::all());
    }

    public function edit($id)
    {
      $post = Experience::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      $post = Experience::find($id);

      $post->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Experience::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }
}
