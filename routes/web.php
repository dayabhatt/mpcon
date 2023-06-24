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
    
    Route::get('/appraisal/create',[AppraiseController::class,'create'])->name('appraisal.create');
    Route::post('/appraisal/submit',[AppraiseController::class, 'store'])->name('appraisal.submit');
    Route::get('/appraisal',[AppraiseController::class,'index'])->name('appraisal');

    Route::get('/appraisal/reviewlist',[AppraiseController::class,'reviewlist'])->name('appraisal.reviewlist');
    Route::get('/appraisal/{appraisal}/reviewappraisalupdate',[AppraiseController::class,'reviewappraisalupdate'])->name('appraisal.reviewappraisalupdate');
    Route::post('/appraisal/{appraisal}/updatereview',[AppraiseController::class,'updatereview'])->name('appraisal.updatereview');


    Route::get('/appraisal/{appraise}/edit',[AppraiseController::class,'edit'])->name('appraisal.edit');
    Route::post('/appraisal/{appraise}/update',[AppraiseController::class,'update'])->name('appraisal.update');
    Route::get('/appraisal/{appraise}/delete',[AppraiseController::class,'destroy'])->name('appraisal.delete');
    Route::get('/appraisal/{appraise}/updatereport',[AppraiseController::class,'updatereport'])->name('appraisal.updatereport');
    

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/employeecreate',[EmployeeController::class, 'create'])->name('employeecreate');

Route::post('/employeesubmit',[EmployeeController::class, 'store'])->name('employeesubmit');

