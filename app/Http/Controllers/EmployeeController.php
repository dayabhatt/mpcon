<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function employeedata(Request $request,Employee $employee)
    {
        $output=[];

        $output[]=['designation'=>$employee->designation,'dob'=>$employee->dob,
        'educational_qualification'=>$employee->educational_qualification];
        
        // return response(['employee'=>$employee]);
        return $output;
    }
    public function index()
    {
        $employees=Employee::all();
        $user = Auth::user();
        return view('admin.employee.index')->with('employesses',$employees)->with('user',$user);
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
        $user = Auth::user();
        return view('admin.employee.create')->with('parents',$output)->with('user',$user);
        
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
         $educational_qualification=$request->educational_qualification;
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
            'educational_qualification'=>$educational_qualification,
        ]); 

        $user=User::create([
            'name'=>$first_name.''.$last_name,
            'email'=>$email,
            'password' => Hash::make($request->password)

        ]);

        $employee->user_id = $user->id;

        $employee->save();
        
        return Redirect::route('employee')->with('employesses',$employee)->withSuccess('Employee Save Successfully');

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

    
    public function edit(Request $request,Employee $employee)
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

        $user = Auth::user();

        return view('admin.employee.edit')->with('employee',$employee)->with('parents',$output)->with('user',$user);;
    }

   
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'confirmed|min:6',
         ]);

         $employee->employeetype=$request->employeetype;
         $employee->employee_parent_id=$request->employee_parent_id=='--'?0:$request->employee_parent_id;
         $employee->first_name=$request->first_name;
         $employee->last_name=$request->last_name;
         $employee->designation=$request->designation;
         $employee->joining_date=$request->joining_date;
         $employee->dob=$request->dob;
         $employee->email=$request->email;
         $employee->phone=$request->phone;
         $employee->address=$request->address;
         $employee->city=$request->city;
         $employee->state=$request->state;
         $employee->employee_status='Active';
         $employee->educational_qualification=$request->educational_qualification;


         $employee->save();

         
        
        return Redirect::route('employee')->with('employesses',$employee)->withSuccess('Employee Save Successfully');
    }

    
    public function destroy(Request $request,Employee $employee)
    {
        $user=User::find($employee->user_id);
        $user->delete();
        $employee->delete();

        return Redirect::route('employee')->with('employesses',$employee);


    }
}
