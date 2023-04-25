<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
     
    public function index(){
        //$user = User::with('roles')->get
        return view('backend.index');
    }

    public function widget(){
        return view('backend.widgets');
    }

    public function datatable(){
        return view('backend.datatable');
    }
}
