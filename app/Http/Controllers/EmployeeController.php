<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('admin.employee.index')->with('employesses',$employees);
    }

   
    public function create()
    {
        $output=[];

        $parents=Employee::all();

        if($parents)
        {
            foreach($parents as $parent)
            {
                $output[]=['id'=>$parent->id,'name'=>$parent->first_name.' '.$parent->last_name];
            }
        }
        
        return view('admin.employee.create')->with('parents',$output);
        
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'confirmed|min:6',
         ]);

         $employeetype=$request->employeetype;
         $employee_parent_id=$request->employee_parent_id;
         $first_name=$request->first_name;
         $last_name=$request->last_name;
         $designation=$request->designation;
         $joining_date=$request->joining_date;
         $dob=$request->dob;
         $email=$request->email;
         $phone=$request->phone;
         $address=$request->address;
         $city=$request->city;
         $state=$request->state;
         $employee_status='Active';

         $employee=Employee::create([
            'employeetype'=>$employeetype,
            'employee_parent_id'=>$employee_parent_id=='--'?0:$employee_parent_id,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'designation'=>$designation,
            'joining_date'=>$joining_date,
            'dob'=>$dob,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'city'=>$city,
            'state'=>$state,
            'employee_status'=>$employee_status,
        ]); 

        $user=User::create([
            'name'=>$first_name.''.$last_name,
            'email'=>$email,
            'password' => Hash::make($request->password)

        ]);

        $employee->user_id = $user->id;

        $employee->save();
        
        return Redirect::route('employee')->with('employesses',$employee);

        // return response(['success'=>1,'employee'=>$employee],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
