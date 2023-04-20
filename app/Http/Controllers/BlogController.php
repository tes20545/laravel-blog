<?php

namespace App\Http\Controllers;

use App\Models\TypeBlogModel;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\TypeBlogModel as Type;
 
class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        $type = Type::all()->count();
        return view('blog.index',['blog' => $blog , 'type' => $type]);
    }

    public function show($id)
    {
        $blog_select = Blog::query()->where('id',$id)->first();
        $type        = TypeBlogModel::all();
        return view('blog.show',['blog_select' => $blog_select,'type' => $type]);
    }

    public function create()
    {
        $type = TypeBlogModel::all();
        return view('blog.create',['type' => $type]);
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
            'type' => 'required',
            'route' => 'required',
        ]);

        $blog           = new Blog();
        $blog->title    = $request->title;
        $blog->contents = $request->contents;
        $blog->images   = $request->file('file_upload')->storePublicly('media/', ['disk' => 'public']); //รูปภาพหน้าปก;
        $blog->type     = $request->type;
        $blog->route    = $request->route;
        $blog->blog_or_review = 'blog';
        $blog->user_id  = request()->user()->id;

        if($blog->save()){
            return redirect()->route('blog.index');
        }
        return redirect()->route('blog.index');
    }

    public function update(Request $request,$id)
    {
        //save image
        if ($request->hasFile('upload')) { //ตรวจสอบว่ามีการอัพโหลดเข้ามาหรือไม่
            $originName = $request->file('upload')->getClientOriginalName(); //เก็บชื่อดั้งเดิมของไฟล์ไว้
            $fileName = pathinfo($originName, PATHINFO_FILENAME); // เก็บ pathinfo
            $extension = $request->file('upload')->getClientOriginalExtension(); // เก็บนามสกุลไฟล์ไว้
            $fileName = $fileName . '_' . time() . '.' . $extension; // เปลี่ยนชื่อใหม่ ชื่อ . เวลา . นามสกุลไฟล์

            $request->file('upload')->move(public_path('storage/media'), $fileName); // ย้ายไปไว้ใน storage/media

            $url = asset('storage/media/' . $fileName); //
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
        //update image?
        if ($request->file('file_upload')) {
            $image = $request->file('file_upload')->storePublicly('images/community', ['disk' => 'public']);
        } else {
            $image = $request->old_img;
        }

        $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required',
            'file_upload' => 'required',
            'type' => 'required',
            'route' => 'required',

        ]);

        $blog           = Blog::where('id',$id)->first();

        $blog->title    = $request->title;
        $blog->contents = $request->contents;
        $blog->images   = $image;
        $blog->type     = $request->type;
        $blog->route    = $request->route;
        $blog->blog_or_review = 'blog';
        $blog->user_id  = request()->user()->id;

        if($blog->save()){
            return redirect()->route('blog.index');
        }
        return redirect()->route('blog.index');
    }

    public function delete($id)
    {
        $destroy = Blog::where('id', $id);
        if ($destroy->delete()) {          //หากบันทึกสำเร็จจะเข้าฟังก์ชันนี้
            return redirect()->route('blog.index');
        } else {  //หากบันทึกไม่สำเร็จ
            return redirect()->route('blog.index');
        }
        return redirect()->route('blog.index');
    }
}
