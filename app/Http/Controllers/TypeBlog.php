<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeBlogModel;
class TypeBlog extends Controller
{
    public function index()
    {
        $data = TypeBlogModel::all();
        return view('type/index',['data' => $data]);
    }

    public function create()
    {
        return view('type/create');
    }

    public function store(Request $request)
    {
        $type = new TypeBlogModel();
        $type->name = $request->name;

        if($type->save()){
            return redirect()->route('type.index');
        }else{
            return redirect()->route('type.index');
        }
    }

    public function show($id)
    {
        $type = TypeBlogModel::where('id',$id)->first();
        return view('type.show',['type' => $type]);
    }

    public function update(Request $request,$id)
    {
        $type = TypeBlogModel::where('id',$id)->first();

        $type->name = $request->name;

        if($type->save()){
            return redirect()->route('type.index');
        }else{
            return redirect()->route('type.index');
        }
    }

    public function delete($id)
    {
        $type = TypeBlogModel::where('id',$id);

        if ($type->delete()) {
            return redirect()->route('type.index');
        } else {
            return redirect()->route('type.index');
        }
    }
}
