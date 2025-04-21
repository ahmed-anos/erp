<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    

    public function view($name){

        $path=public_path('expenses/'.$name);
        if(file_exists($path)){
            return response()->file($path);
        }
        return "الصوره غير موجوده";
    }

    public function download($name){
        $path=public_path('expenses/'.$name);
        if(file_exists($path)){
            return response()->download($path);
        }
    }

    public function destroy($name)
    {
        $path=public_path('expenses/'.$name);
        if(file_exists($path)){
            unlink($path);
            Attachment::where('name' ,$name)->first()->delete();
            return back()->with('success' ,'تم حذف المرفق بنجاح');
        }
        return 'الصوره غير موجوده';
    }

    
    public function new(Request $request, $expense_id)
    {

       if($request->expense_invoice==''){
        return back()->with('error' ,"حدث خطأ في ادخال المرفق");
       }
        $request->validate([
            'expense_invoice' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
        ], [
            'expense_invoice.required' => 'من فضلك اختر المرفق',
            'expense_invoice.mimes' => 'الملف يجب أن يكون من نوع: jpeg, png, jpg, gif, svg, pdf',
            'expense_invoice.max' => 'حجم الملف يجب ألا يتجاوز 5 ميجابايت',
        ]);
        
        // حفظ الملف في المسار المحدد
        $file = $request->file('expense_invoice');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('expenses');
        
        // إذا لم يكن المجلد موجودًا، نقوم بإنشائه
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
    
        // نقل الملف إلى المسار
        $file->move($destinationPath, $file_name);
    
        // حفظ المرفق في قاعدة البيانات
        Attachment::create([
            'expense_id' => $expense_id,
            'name' => $file_name,
            'date' => now(),
        ]);

            return back()->with('success','تم اضافه المرفق بنجاح');
        
    }
    

   
    
}
