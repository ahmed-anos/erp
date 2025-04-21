<?php

namespace App\Http\Controllers;

use App\Exports\DriverExport;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;
use Maatwebsite\Excel\Facades\Excel;

class DriverController extends Controller
{
    public function index(){
        Context::push('breadcrumbs', ['url' => route('dashboard'), 'label' => 'الرئيسيه']);
        Context::push('breadcrumbs', ['url' => route('drivers.index'), 'label' => 'السائقين']);


        $allDrivers=Driver::paginate(15);
        return view('backend.drivers.driver_list' ,compact('allDrivers'));
    }

    public function create(){
        Context::push('breadcrumbs', ['url' => route('dashboard'), 'label' => 'الرئيسيه']);
        Context::push('breadcrumbs', ['url' => route('drivers.create'), 'label' => 'ادخال السائقين']);

        
        // Context::push('breadcrumbs', 'Add Driver');

        return view('backend.drivers.driver_form');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|max:50',
            'phone'=>'required|unique:drivers',
            'car'=>'required|unique:drivers'
        ]);
        Driver::create($request->only(['name' ,'phone' ,'car' ,'country' ,'notice']));
        return redirect('drivers')->with('success' ,'تم اضافه سائق جديد بنجاح');
    }

    public function show(Request $request ){


        $oneDriver= Driver::where('id' ,$request->id)->get();
        $allDrivers=Driver::all();
        return view('backend.drivers.searchDriver' ,['allDrivers'=>$allDrivers ,'oneDriver'=>$oneDriver]);
    }

   
    public function update($id){
            $driver=Driver::where('id' ,$id)->first();
            return view('backend.drivers.update_driver')->with('driver',$driver);
    }



    public function edit($id ,Request $request){
        // $allDrivers=Driver::paginate(15);
       $driver=Driver::find($id);
       $driver->update([
        'name'=> $request->name,
        'phone'=>$request->phone,
        'car' =>$request->car,
        'country'=>$request->country,
        'notice'=>$request->notice,
        // 'address'=>$request->address   will be add later
    ]);
       return to_route('drivers.index')->with('success' ,'تم تعديل بيانات السائق بنجاح');
    }

    public function destroy($id){
        $driver= Driver::find($id);
        $driver->delete();
        return to_route('drivers.index')->with('success' ,'تم حذف بيانات السائق من قاعده البيانات بنجاح');
    }

    public function export(){
        return Excel::download(new DriverExport, 'جميع السائقين.xlsx');
    }
}
