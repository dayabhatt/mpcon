<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
//Route::post('/logout',[LoginController::class,'destroy'])->middleware('auth');

Auth::routes();



Route::get('/', function () {
    if(Auth::check()){
        return view('admin.index');
        //return view('portal.index');
    }
    else{
        return view('auth.login');
    }
     
});

Route::middleware(['auth'])->group(function () {
    //After Login the routes are accept by the loginUsers...
    Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/employeecreate',[EmployeeController::class, 'create'])->name('employeecreate');

Route::post('/employeesubmit',[EmployeeController::class, 'store'])->name('employeesubmit');

