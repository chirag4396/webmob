<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class HomeController extends Controller
{    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $categories = Category::get();
        return view('home')->with(['categories' => $categories]);
    }
}
