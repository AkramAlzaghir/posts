<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\str_slug;
use Nette\Utils\IHtmlString;
use Illuminate\Support\Facades\File; 

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //to hide posts from auther users and only allow access to his own post
        //$posts=Post::where('user_id', Auth::id())->get();

        //to allow access to other posts, show all posts
        //if we use orderby, we must use get function, not all function
        $posts = Post::orderBy('created_at', 'DESC')->get(); // go to the model post and show me all
        // then go to view and access the folder posts and access index file
        //inside with 2 post, first post is the variable that will go to blade/index
        //the second with is the variable that is inside the controller
        //dd($posts);
        return view('posts.index')->with('posts', $posts); 
        
    }
    public function postTrashed()
    {
        $posts = Post::onlyTrashed()->where('user_id', Auth::id())->get(); // go to the model post and only trashed
        // then go to view and access the folder posts and access trashed file
        //inside with 2 post, first post is the variable that will go to blade/index
        //the second with is the variable that is inside the controller
        return view('posts.trashed')->with('posts', $posts);
    }

    public function create()
    {
        $tags = Tag::all();
        //if there is no tag, u first go to tag view and create tag
        if ($tags->count()==0) {
            return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags', $tags); //take me to create page only, no more 
        
    }

    public function store(Request $request)
    {
        //we first check, did the user fill in the information? we check this by using request
        //request is any information that the user send it to the controller
        //request has info as array
        $this->validate($request, 
        [
            'title'=>'required', //must be same name as in html name
            'tags'=>'required',  //must be same name as in html name
            'content'=>'required',
            'photo'=>'required|image'
        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts', $newPhoto);

        $post = Post::create([
            'user_id' =>Auth::id(), //take a user id from id as it is logged in
            'title' => $request->title, //when you come from user, i want the title
            'content' => $request->content, //when you come from user, i want the content
            'photo' => 'uploads/posts/'.$newPhoto, //i take it from the path
            'slug' => str_slug($request->title)// str slug is function to create random slug
        ]);
        //tag with () the function inside model post 
        $post->tag()->attach($request->tags);
        return redirect()->back();

    }

    
    public function show($slug)
    {
        $tags = Tag::all();
        //it depends on the slug
        $post = Post::where('slug', $slug)->first(); 

        // $post = Post::where('slug', $slug)->where('user_id', Auth::id())->first(); 

        // //if he click to show other people posts, redirect him to the posts again
        // if($post===null){
        //     return redirect()->back(); 
        // }
        // bring me the post when the slug inside the database is similar to the slug that 
        //is coming from user, first is to bring only one
        return view('posts.show')->with('post', $post)
        ->with('tags', $tags);
        
    }

    
    public function edit($id)
    {
        $tags = Tag::all();
         //$post = Post::find($id);//find this id 
         $post = Post::where('id', $id)->where('user_id', Auth::id())->first(); 

        //if he click to edit other people posts, redirect him to the posts again
        if($post===null){
            return redirect()->back(); 
        }
         // take me back to edit with this post
         return view('posts.edit')->with('post', $post)
         ->with('tags', $tags);
         
    }

    
    public function update(Request $request, $id)
    {
        // is similar to create
        $post = Post::find($id);//find this id,
        // then i check is he fill in the information
        $this->validate($request, 
        [
            'title'=>'required', 
            'content'=>'required'
        ]);
        //this condition if the user want to update the photo or not
        if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts', $newPhoto);
        $post->photo= 'uploads/posts/'.$newPhoto;
        }
        $post->title= $request->title;
        $post->content= $request->content;
        $post->save(); //to save the data
        $post->tag()->sync($request->tags);
        return redirect()->back();
    }

    public function destroy( $id)
    {
       // dd($id);
        //$post = Post::find($id);
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first(); 

        //if he click to show other people posts, redirect him to the posts again
        if($post===null){
            return redirect()->back(); 
        }

        // $path ='uploads/posts/'.$post->photo;
        // if(File::exists($path)){
        //     File::delete($path);
        // }

        $post->delete();
        return redirect()->back();
    }
    public function hdelete($id)
    {
       // when the column id from post is equal to the column id i give u
        $post = Post::withTrashed()->where('id', $id)->first();
        //dd($post); //till here is fine 
        $path =$post->photo;
       // dd($path.$path);
        //$path = str_replace('\\','/',public_path());
        //dd($path.$image);
        // if (File::exists($path)) {
        //     return 'file found';
        // } else {
        //     return 'file not found';
        // }
        if(File::exists($path)){
            unlink($path);
        }
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first()->restore();
        // $post->restore();
        return redirect()->back();
    }
}
