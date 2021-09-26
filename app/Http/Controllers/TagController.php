<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);

    }

    
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
      //we first check, did the user fill in the information? we check this by using request
        //request is any information that the user send it to the controller
        $this->validate($request, 
        [
            'tag'=>'required', 
        ]);

        $tag = Tag::create([
            'tag' => $request->tag //when you come from user, i want the title
        ]);
        return redirect()->back();

    }

    public function edit($id)
    {
        $tag = Tag::find($id);//find this id 
         // take me back to edit with this post
         return view('tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
          // is similar to create
          $tag = Tag::find($id);//find this id,
          // then i check is he fill in the information
          $this->validate($request, 
          [
              'tag'=>'required', 
          ]);
          $tag->tag= $request->tag;
          $tag->save(); //to save the data
          return redirect()->back();
    }

    public function destroy( $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back();
    }
}
