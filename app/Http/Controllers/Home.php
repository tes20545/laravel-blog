<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SettingModel;
use App\Models\TypeBlogModel;
use Illuminate\Http\Request;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Blog::wherenot('blog_or_review','review')->paginate(5);
        $type = TypeBlogModel::all();
        $setting = SettingModel::first();
        return view('index',['data' => $data,'type' => $type,'setting' => $setting]);

    }

    public function review()
    {
        $data = Blog::join('users','users.id','=','blog.user_id')
        ->select('blog.*','users.name')
        ->wherenot('blog_or_review','blog')
        ->paginate(5);
        $setting = SettingModel::first();
        return view('review',['data' => $data,'setting' => $setting]);
    }

    public function type($id)
    {
        $data = Blog::where('type',$id)->paginate(5);
        $type = TypeBlogModel::all();
        $setting = SettingModel::first();
        return view('type',['data' => $data,'type' => $type,'setting' => $setting]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home = Blog::where('id',$id)->first();
        $type = TypeBlogModel::all();
        $setting = SettingModel::first();
        return view('post',['home' => $home,'type' => $type, 'setting' => $setting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
