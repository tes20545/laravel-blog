<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('blog.index',['blog' => $blog]);
    }

    public function show($id)
    {
        $blog_select = Blog::query()->where('id',$id)->first();
        return view('blog.show',['blog_select' => $blog_select]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->contents = $request->editor;

        if($blog->save()){
            return redirect()->route('blog.index');
        }
        return redirect()->route('blog.index');
    }
}
