<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientAsset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function calculateCurrentInstallment(Client $client)
     {
         $start = Carbon::parse($client->start_installment);
         $now = Carbon::now();
     
         $monthsPassed = $start->diffInMonths($now);
     
         $delayMonths = $client->delayed_months; 
     
         $currentInstallmentNumber = ($monthsPassed + $delayMonths) + 1;
     
         $currentInstallmentNumber = min($currentInstallmentNumber, $client->installments_count);
     
         return (int) $currentInstallmentNumber;
     }
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
            'code' =>'required|unique:clients',
            'car' =>'required|unique:clients',
            'country'=>'required',
            'installment'=>'required',
            'start_installment'=>'required',
            'end_installment'=>'required',
            'installments_count'=>'required',
            'indebtedness'=>'required',
            'remaining'=>'required',
        ],[
            'country'=>'من فضلك ادخل خط العمل',
            'start_installment'=>'من فضلك حدد تاريخ بدايه القسط',
            'end_installment'=>'من فضلك حدد تاريخ نهايه القسط',
            'indebtedness'=>'من فضلك حدد المديونيه',
            'code.required'=>' من فضلك ادخل الكود',
            'code.unique' =>'هذا الكود مسجل بالفعل'
        ]);
        
        $remaining = $request->indebtedness - $request->paid;
        $paid=$request->paid ??0;
        $client=Client::create([
            'code' => $request->code,
            'name' => $request->name,
            'country' => $request->country,
            'car' => $request->car,
            'installment' => $request->installment,
            'start_installment' => $request->start_installment,
            'end_installment' => $request->end_installment,
            'installments_count' => $request->installments_count,
            'indebtedness' => $request->indebtedness,
            'paid' => $paid,
            'remaining' => $remaining,
            // Guarantor
            'guarantor_name'=>$request->guarantor_name,
            'guarantor_phone'=>$request->guarantor_phone,
    ]);
    $client->asset()->create([
        'asset_type'=>$request->asset_type,
        'asset_color'=>$request->asset_color,
        'asset_year'=>$request->asset_year,
        'asset_shase'=>$request->asset_shase,
        'asset_format'=>$request->asset_format
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
        $currentInstallmentNumber = $this->calculateCurrentInstallment($client);
        return view('backend.clients.update', compact('client','currentInstallmentNumber'));
    }


    public function details($id){
        $client=Client::where('id' ,$id)->first();
        $installment_status= $client->installments;
        $currentInstallmentNumber = $this->calculateCurrentInstallment($client);
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('clients.index') ,'label'=>' استعلام عميل']);
        Context::push('breadcrumbs' ,['url'=>route('clients.details', $id) ,'label'=>' تفاصيل عميل']);
        
        return view('backend.clients.details' ,compact('client','currentInstallmentNumber' ,'installment_status'));
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
