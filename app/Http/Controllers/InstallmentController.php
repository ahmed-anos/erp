<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\InstallmentStatus;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
        ]);
        $status = $request->action === 'paid' ? 1 : 2;

        InstallmentStatus::create([
            'client_id' => $request->client_id,
            'status' => $status,
            'date' => $request->date,
            'responsible_person' => auth()->user()->name,
        ]);
    
        return redirect()->back()->with('success', 'تم حفظ الحالة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Installment $installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installment $installment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installment $installment)
    {
        //
    }
}
