<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('clients.index') ,'label'=>'استعلام العملاء']);
        
        $clients= Client::get();
        return view('backend.clients.getClients' ,compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('clients.create') ,'label'=>' ادخال عميل']);
        $lastClient = Client::orderBy('id', 'desc')->first();
        return view('backend.clients.insert', compact('lastClient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'car' =>'required|unique:clients',
            'country'=>'required',
            'installment'=>'required',
            'start_installment'=>'required',
            'end_installment'=>'required',
            'installments_count'=>'required',
            'indebtedness'=>'required',
            'remaining'=>'required',
            'interest_rate'=>'required'
        ],[
            'country'=>'من فضلك ادخل خط العمل',
            'installment'=>'من فضلك ادخل قيمه القسط',
            'start_installment'=>'من فضلك حدد تاريخ بدايه القسط',
            'end_installment'=>'من فضلك حدد تاريخ نهايه القسط',
            'indebtedness'=>'من فضلك حدد المديونيه',
            'interest_rate'=>'من فضلك حدد معدل الفائده'
        ]);
        
        $remaining = $request->indebtedness - $request->paid;
        $paid=$request->paid ??0;
        Client::create([
            'name' => $request->name,
            'country' => $request->country,
            'car' => $request->car,
            'installment' => $request->installment,
            'start_installment' => $request->start_installment,
            'end_installment' => $request->end_installment,
            'installments_count' => $request->installments_count,
            'indebtedness' => $request->indebtedness,
            'interest_rate'=>$request->interest_rate,
            'paid' => $paid,
            'remaining' => $remaining,
            'delayed_months'=>$request->delayed_months,
            'interest' => $request->interest,
            'installment_status' => $request->installment_status,
    ]);
        
        return back()->with('success' ,'تم اضافه العميل بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $request->id;
    }

    public function edit($id)
    {
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('clients.index') ,'label'=>' استعلام عميل']);
        Context::push('breadcrumbs' ,['url'=>route('clients.details',$id) ,'label'=>' تفاصيل عميل']);
        Context::push('breadcrumbs' ,['url'=>route('clients.edit', $id) ,'label'=>' تغير حاله قسط']);
        $client = Client::where('id' ,$id)->first(); 
        return view('backend.clients.update', compact('client'));
    }
    

    public function details($id){
        $client=Client::where('id' ,$id)->first();
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('clients.index') ,'label'=>' استعلام عميل']);
        Context::push('breadcrumbs' ,['url'=>route('clients.details', $id) ,'label'=>' تفاصيل عميل']);
        
        return view('backend.clients.details' ,compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        
        $client->delete();
        return to_route('clients.index');

    }


    

}
