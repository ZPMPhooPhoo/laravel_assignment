<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('permission:blogsList', ['only' => 'index']);
        $this->middleware('permission:blogsCreate', ['only' => ['create', 'store']]);
        $this->middleware('permission:blogsEdit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blogsShow', ['only' => 'show']);
        $this->middleware('permission:blogsDelete', ['only' => 'destroy']);
        $this->middleware('auth');
     }
     
    public function index()
    {
        //
        $data = Blog::all();
        //$data = Blog::first()->paginate(5);
        //dd($data);
        return view('backend.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        // Blog::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'is_active' => $request->has('is_active')? 1 : 0
        // ]);
        //dd($request->all());

        Blog::create($request->all());
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Blog::where('id', $id)->first();
        return view('backend.blogs.show',compact('data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::where('id', $id)->first();
        //dd($data);
        return view('backend.blogs.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        //dd($request->all());
        $data = Blog::where('id', $id)->first();
        
        // $data->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'is_active' => $request->is_active
        //     //'is_active' => $request->has('is_active')? 1 : 0
        // ]);

        $data->update($request->all());
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::where('id', $id)->first();
        //dd($data);
        $data->delete();
        return redirect()->route('blogs.index');
    }
}
