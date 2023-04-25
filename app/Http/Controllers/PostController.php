<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('permission:postList', ['only' => 'index']);
        $this->middleware('permission:postCreate', ['only' => ['create', 'store']]);
        $this->middleware('permission:postEdit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:postShow', ['only' => 'show']);
        $this->middleware('permission:postDelete', ['only' => 'destroy']);
        $this->middleware('auth');
     }

    public function index()
    {
        $data = Post::all();
        // $data = Post::first()->paginate(5);
        return view('backend.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Post::create($request->all());
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_active' => $request->has('is_active')? 1 : 0
        // ]);

        Post::create($request->validated());
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
        $data = Post::where('id', $id)->first();
        return view('backend.post.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::where('id', $id)->first();
        return view('backend.post.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $data = Post::where('id', $id)->first();
        //$data->update($request->all());
        // $data->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_active' => $request->has('is_active')? 1 : 0
        // ]);

        $data->update($request->validated());
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
        $data = Post::where('id', $id)->first();
        $data->delete();
        return redirect()->route('post.index');
    }
}
