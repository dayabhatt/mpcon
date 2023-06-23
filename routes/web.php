<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AppraiseController;

use Illuminate\Support\Facades\Auth;
//Route::post('/logout',[LoginController::class,'destroy'])->middleware('auth');

Auth::routes();



Route::get('/', function () {
    if(Auth::check()){
        $user = Auth::user();
        return view('admin.index')->with('user',$user);
        //return view('portal.index');
    }
    else{
        return view('auth.login');
    }
     
});

Route::middleware(['auth'])->group(function () {
    //After Login the routes are accept by the loginUsers...
    Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
    Route::get('/employee/{employee}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::post('/employee/{employee}/update',[EmployeeController::class,'update'])->name('employee.update');
    Route::get('/employee/{employee}/delete',[EmployeeController::class,'destroy'])->name('employee.delete');
    Route::get('/employeedata/{employee}',[EmployeeController::class,'employeedata'])->name('employeedata');
    
    Route::get('/appraisecreate',[AppraiseController::class,'create'])->name('appraise.create');
    Route::post('/appraisesubmit',[AppraiseController::class, 'store'])->name('appraise.submit');
    Route::get('/appraise',[AppraiseController::class,'index'])->name('appraise');
    Route::get('/appraise/{appraise}/edit',[AppraiseController::class,'edit'])->name('appraise.edit');
    Route::post('/appraise/{appraise}/update',[AppraiseController::class,'update'])->name('appraise.update');
    Route::get('/appraise/{appraise}/delete',[AppraiseController::class,'destroy'])->name('appraise.delete');
    Route::get('/appraise/{appraise}/updatereport',[AppraiseController::class,'updatereport'])->name('appraise.updatereport');
    

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/employeecreate',[EmployeeController::class, 'create'])->name('employeecreate');

Route::post('/employeesubmit',[EmployeeController::class, 'store'])->name('employeesubmit');

