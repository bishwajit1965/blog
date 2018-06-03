<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\user\category;
use App\Model\user\tag;
use App\Model\user\post;
use Illuminate\Support\Facades\Storage;
use Session;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $categories = category::all();
            $tags       = tag::all();
            return view('admin.post.post', compact('categories', 'tags'));
        }
        return redirect()->route('admin.home');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|min:6',
            'subtitle'  => 'required|min:6',
            'slug'      => 'required|min:4',
            'body'      => 'required|min:10',
            'posted_by' => 'required|min:3',
            'status'    => 'nullable',
            'image'     => 'required'
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }

        $post           = new post;
        $post->image    = $imageName;
        $post->title    = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug     = $request->slug;
        $post->body     = $request->body;
        $post->posted_by= $request->posted_by;
        $post->status   = $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        Session::flash('Success', 'Post data has successfully been saved !');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with('categories', 'tags')->where('id', $id)->first();
        $categories = category::all();
        $tags = tag::all();
        return view('admin.post.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required|min:6',
            'subtitle'  => 'required|min:6',
            'slug'      => 'required|min:4',
            'body'      => 'required|min:10',
            'posted_by' => 'required|min:3',
            'status'    => 'nullable',
            'image'     => 'required'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }

        $post = post::find($id);
        $post->image    = $imageName;
        $post->title    = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug     = $request->slug;
        $post->body     = $request->body;
        $post->posted_by= $request->posted_by;
        $post->status   = $request->status;
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        $post->save();
        Session::flash('Updated', 'Post data has successfully been updated !');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id', $id)->delete();
        Session::flash('Deleted', 'Post data has been deleted !');
        return redirect()->back();
    }
}
