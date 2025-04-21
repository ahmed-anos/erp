<?php

use App\Http\Controllers\frontend\ExpenseController;
use App\Http\Controllers\frontend\PersonHomeController;
use App\Http\Controllers\frontend\PersonLoginController;
use Illuminate\Support\Facades\Route;





Route::get('person/login' ,[PersonLoginController::class ,'login'])->name('person/login');
Route::post('person/login' ,[PersonLoginController::class ,'check'])->name('person/check');
Route::get('person/home' ,[PersonHomeController::class ,'index'])->name('person/index');


Route::get('frontend/index', [ExpenseController::class ,'index'])->name('frontend.index');
Route::post('frontend/expense', [ExpenseController::class ,'store'])->name('frontend.store');
Route::get('frontend/expense/create', [ExpenseController::class ,'create'])->name('frontend.create');
Route::get('frontend/expense/edit', [ExpenseController::class ,'edit'])->name('frontend.edit');
Route::put('frontend/expense/update/{id}', [ExpenseController::class ,'update'])->name('frontend.update');
Route::delete('frontend/expense/destroy/{id}', [ExpenseController::class ,'destroy'])->name('frontend.destroy');