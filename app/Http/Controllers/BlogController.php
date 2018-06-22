<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Carbon\Carbon;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $res = ['msg' => 'error'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBlogs(Request $r) {        
        $blogs = Blog::where(function ($blogs) use($r) {
            if($r->categories){
                $blogs->whereHas('categories', function ($blogs) use ($r) {
                    $blogs->whereIn('categories.id', $r->categories);
                });
            }
            if(!is_null($r->author)){
                $users = User::where('name', 'like', $r->author.'%')->get()->pluck('id');
                $blogs->whereIn('blog_posted_by', $users);
            }
            if(!is_null($r->posted)){
                $blogs->where('blog_posted_at', $r->posted);
            }
        })->get();
        return view('includes.all_blogs')->with(['blogs' => $blogs]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_blog')->with(['categories' => Category::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r){

        $blog = Blog::create([
            'blog_title' => $r->title,
            'blog_text' => $r->text, 
            'blog_posted_at' => Carbon::now(),
            'blog_posted_by' => Auth::id()
        ]);
        $blog->categories()->attach($r->categories);

        if($blog){
            $this->res['msg'] = 'success';
            $this->res['location'] = route('blog.show',['id' => $blog->id]);
        }

        return $this->res;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog')->with(['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
