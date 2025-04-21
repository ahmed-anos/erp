<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting=Setting::first();
        Context::push('breadcrumbs',['url'=>route('dashboard'), 'label'=>'الصفحه الرئيسه']);
        Context::push('breadcrumbs',['url'=>route('settings.index'), 'label'=>'الاعدادات']);
        return view('backend.settings.index' ,compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting=Setting::first();
        Context::push('breadcrumbs',['url'=>route('dashboard'), 'label'=>'الصفحه الرئيسه']);
        Context::push('breadcrumbs',['url'=>route('settings.index'), 'label'=>'الاعدادات']);
        Context::push('breadcrumbs',['url'=>route('settings.create'), 'label'=>'تعديل الاعدادات']);
        return view('backend.settings.update',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'owner'=>'required',
            'activity'=>'required',
            
        ],[
            'name'=>'من فضلك ادخل اسم الشركه',
            'owner'=>'من فضلك ادخل اسم المالك',
            'activity'=>'من فضلك ادخل نشاط الشركه'
        ]);

        $image=$request->file('logo');
        if($image){
            $image_name=time().'.'.$request->logo->getClientOriginalName();
            $extension=$request->logo->getClientOriginalExtension();
            $path=public_path('logo');
            $image->move($path ,$image_name);
        }
       
        Setting::first()->update([
            'name'=>$request->name ,
            'owner'=>$request->owner ,
            'activity'=>$request->activity ,
            'logo'=>$image_name??$image,
            'tax_number'=>$request->tax_number,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'user'=>Auth::user()->name
        ]);
        return to_route('settings.index')->with('success' ,'تم تجديث الاعدادات بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Context::push('breadcrumbs',['url'=>route('dashboard'), 'label'=>'الصفحه الرئيسه']);
        Context::push('breadcrumbs',['url'=>route('settings.index'), 'label'=>' الاعدادات']);
        Context::push('breadcrumbs',['url'=>route('settings.create'), 'label'=>'تعديل الاعدادات']);
        return view('backend.settings.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
