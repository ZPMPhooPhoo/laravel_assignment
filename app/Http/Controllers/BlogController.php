<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function get(){
        return view('blog');
    }

    public function __construct(){
        $this->middleware('auth');
     }

    public function index(){
        $data = Blog::all();
        return view('backend.blog.index' ,compact('data'));
    }

    public function create(){
        return view('backend.blog.create');
    }

    public function store(BlogRequest $request){
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required'
        // ]);

        $data = $request->validated();
        
        // Blog::create([
        //     'name' => $data['name'],
        //     'description' => $data['description'],
        //     'is_active' => $data['is_active']
        // ]);
        Blog::create($data);
        // $data=Blog::all();
        // return view('blog.index', compact('data'));

        return redirect()->route('blog.index');
    }

    public function show(Blog $blog)
    {
        return view('backend.blog.show',compact('blog'));
        
    }
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));

    }   
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog->update($data);
        return redirect()->route('blog.index');
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
