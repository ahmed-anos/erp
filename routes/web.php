<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDriverController;

use App\Livewire\AccountTree;
use App\Livewire\Client\ClientAccount;
use App\Livewire\Client\ClientTransactions;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;



// use Facades\App\Http\Controllers\SearchDriverController;





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    return view('auth.login');
});

Route::name('userDriver.')->group(function(){
    Route::get('userExpense/index', [UserDriverController::class, 'index'])->name('index');
    Route::get('userExpense/create', [UserDriverController::class, 'create'])->name('create');
    Route::post('store_expense/{expense}', [UserDriverController::class, 'store'])->name('store');
    Route::get('detail_expense/{expense}', [UserDriverController::class, 'detail'])->name('detail');
 });

Route::name('drivers.')->group(function () {
    Route::get('drivers' ,[DriverController::class, 'index'])->name('index');
    Route::get('drivers/create' ,[DriverController::class, 'create'])->name('create');
    Route::post('drivers/store' ,[DriverController::class, 'store'])->name('store');
    Route::get('drivers/show' ,[DriverController::class, 'show'])->name('show');
    Route::get('drivers/update/{id}' ,[DriverController::class, 'update'])->name('update');
    Route::put('drivers/edit/{id}' ,[DriverController::class, 'edit'])->name('edit');
    Route::delete('drivers/delete/{id}' ,[DriverController::class, 'destroy'])->name('destroy');
    Route::get('drivers/excel' ,[DriverController::class, 'export'])->name('export');
});

Route::name('expense.')->group(function () {
    Route::get('expense' ,[ExpenseController::class, 'index'])->name('index');
    Route::get('expenses/create' ,[ExpenseController::class, 'create'])->name('create');
    Route::post('expenses/store' ,[ExpenseController::class, 'store'])->name('store');
    Route::get('expenses/show' ,[ExpenseController::class, 'show'])->name('show');
    Route::get('expenses/edit/{id}' ,[ExpenseController::class, 'edit'])->name('edit');
    Route::put('expenses/update/{id}' ,[ExpenseController::class, 'update'])->name('update');
    Route::get('expenses/date' ,[ExpenseController::class, 'searchDate'])->name('dates');
    Route::get('expenses/total' ,[ExpenseController::class, 'total'])->name('total');
    Route::get('expenses/country/{country}' ,[ExpenseController::class, 'country'])->name('country');
    Route::get('expenses/details/{id}' ,[ExpenseController::class, 'details'])->name('details');
    Route::get('expenses/export' ,[ExpenseController::class, 'export'])->name('export');
    Route::delete('expenses/destroy/{id}' ,[ExpenseController::class, 'destroy'])->name('destroy');


});

Route::name('reports.')->group(function(){
        Route::get('drivers_reports', [ReportsController::class, 'allDrivers'])->name('drivers');
        Route::get('expenses_reports', [ReportsController::class, 'allExpenses'])->name('expenses');
        Route::get('daily_expenses_reports', [ReportsController::class, 'dailyExpenses'])->name('daily.expenses');
        Route::get('total_expenses_reports', [ReportsController::class, 'totalExpenses'])->name('total.expenses');
});

// Client
Route::resource('clients' ,ClientController::class);
Route::get('clientTransaction', ClientTransactions::class)->name('client.transaction');
Route::get('clientAccount', ClientAccount::class)->name('client.account');


// Accounts
Route::get('accountTree', AccountTree::class)->name('account.tree');

Route::resource('installments' ,InstallmentController::class);
Route::resource('settings' ,SettingController::class);
Route::get('details/{id}' ,[ClientController::class, 'details'])->name('clients.details');

Route::name('users.')->group(function(){
    Route::get('users' , [UserController::class, 'index'])->name('index');
    Route::get('users/add' , [UserController::class, 'add'])->name('add');
    Route::post('user' ,[UserController::class, 'store'])->name('store');
});


Route::name('attachments.')->group(function(){
        Route::post('new/{expense_id}' ,[AttachmentController::class, 'new'])->name('new');
        Route::get('view/{name}' ,[AttachmentController::class, 'view'])->name('view');
        Route::get('download/{name}' ,[AttachmentController::class, 'download'])->name('download');
        Route::delete('destroy/{name}' ,[AttachmentController::class, 'destroy'])->name('destroy');
});

// Route::group(['middleware' => ['role:owner|محاسب']], function() {
    Route::name('reports.')->group(function() {
        Route::get('drivers_reports', [ReportsController::class, 'allDrivers'])->name('drivers');
        Route::get('expenses_reports', [ReportsController::class, 'allExpenses'])->name('expenses');
    });
Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);

require __DIR__.'/auth.php';
require __DIR__.'/person.php';