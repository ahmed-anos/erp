<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\frontend\PersonLoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonLoginController extends Controller
{
    public function login(){
        return view('frontend.login');
    }
    public function check(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        // return 'test';

        $person = User::where('email', $request->email)->first();
        
        if ($person && Hash::check($request->password, $person->password)) {
            

            // will show only  Expenses for driver

            return view('frontend.drivers.home');










        } else{
            return back()->withErrors(['password' => 'كلمة المرور غير صحيحة' ,'email'=>'الايميل غير صحيح']);

        }
        

    
    }}