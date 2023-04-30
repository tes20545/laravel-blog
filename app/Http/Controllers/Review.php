<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class Review extends Controller
{
    public function index()
    {
        $review = Blog::whereIn('blog_or_review',['review','blog'])->where('user_id', '=', request()->user()->id)->get();
        return view('review.index',['review' => $review]);
    }

    public function create()
    {
        return view('review.create');
    }

    public function store(Request $request)
    {
        //save image
        if ($request->hasFile('upload')) { //ตรวจสอบว่ามีการอัพโหลดเข้ามาหรือไม่
            $originName = $request->file('upload')->getClientOriginalName(); //เก็บชื่อดั้งเดิมของไฟล์ไว้
            $fileName = pathinfo($originName, PATHINFO_FILENAME); // เก็บ pathinfo
            $extension = $request->file('upload')->getClientOriginalExtension(); // เก็บนามสกุลไฟล์ไว้
            $fileName = $fileName . '_' . time() . '.' . $extension; // เปลี่ยนชื่อใหม่ ชื่อ . เวลา . นามสกุลไฟล์

            $request->file('upload')->move(public_path('storage/media'), $fileName); // ย้ายไปไว้ใน storage/media

            $url = asset('storage/media/' . $fileName); //
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]); // ส่งค่ากลับไปแสดงใน editor

        }

        $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required',
            'file_upload' => 'required',
            'route' => 'required',
        ]);

        $blog           = new Blog();
        $blog->title    = $request->title;
        $blog->contents = $request->contents;
        $blog->images   = $request->file('file_upload')->storePublicly('media/', ['disk' => 'public']); //รูปภาพหน้าปก;
        if(request()->user()->position == 'user' || request()->user()->position == null){
            $blog->type     = 'review';
        }else{
            $blog->type     = 'blog';
        }
        $blog->route    = $request->route;
        if(request()->user()->position == 'user' || request()->user()->position == null){
            $blog->blog_or_review     = 'review';
        }else{
            $blog->blog_or_review     = 'blog';
        }
        $blog->user_id  = request()->user()->id;

        if($blog->save()){
            return redirect()->route('review.index');
        }
        return redirect()->route('review.index');
    }
}
