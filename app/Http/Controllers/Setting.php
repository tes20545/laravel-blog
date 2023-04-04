<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;

class Setting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = SettingModel::get();
        return view('setting.index',['data' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new SettingModel();

        $setting->name = $request->name;
        $setting->description = $request->description;
        $setting->image = $request->description;

        if($setting->save()){
            return redirect()->route('setting.index');
        }else{
            return redirect()->route('setting.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = SettingModel::where('id',$id)->first();
        return view('setting.show',['setting' => $setting]);
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
        $setting = SettingModel::where('id',$id)->first();

        $setting->name = $request->name;
        $setting->description = $request->description;

        if($setting->save())
        {
            return redirect()->route('setting.index');
        }else{
            return redirect()->route('setting.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $setting = SettingModel::where('id',$id);

        if($setting->delete())
        {
            return redirect()->route('setting.index');
        }else{
            return redirect()->route('setting.index');
        }
    }
}
