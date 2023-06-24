@extends('layouts.app')
@section('title', 'Employee| MPCON')
@section('style')
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

@endsection
@section('footerscript')

<script>
    $(document).ready(function($){
        $( "#joining_date" ).datepicker({
            dateFormat:"dd/mm/yy",
            changeMonth:true,
            changeYear:true
        });
        $( "#dob" ).datepicker({
            dateFormat:"dd/mm/yy",
            changeMonth:true,
            changeYear:true
        });
    })
</script>

@endsection
@section('content')



    <div class="container-fluid px-4">
        <!--<h1 class="mt-4">Dashboard</h1>-->
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Employee Update</li>
        </ol> 

        {{-- @section('content_header')
        <h1>Employee</h1>
        @stop --}}

        
            

        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-user me-1 mr-2"></i>Employee Details</h5>
            </div>

            <div class="card-body">

                <form  method="post" action="{{ route('employee.update',$employee->id) }}" >

                    @csrf

                    <div class=" row">

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="first_name" class="">First Name</label>
                                <input type="text"  class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{old('first_name',$employee->first_name)}}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="last_name" class="">Last Name</label>
                                <input type="text"  class="form-control @error('first_name') is-invalid @enderror" id="last_name" name="last_name" value="{{old('last_name',$employee->last_name)}}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="employeetype" class="">Employee Type</label>
                                <select class="form-control" name="employeetype" id="employeetype">
                                    {{-- <option value="Jeff" {{ old('name', $DB->default-value) == 'Jeff' ? 'selected' : '' }}>Jeff</option> --}}
                                    <option value="--">Select Type</option>
                                    <option value="Professional" {{ old('employeetype',$employee->employeetype)=='Professional'?'selected':'' }}>Professional</option>
                                    <option value="Supporting Staff" {{ old('employeetype',$employee->employeetype)=='Supporting Staff'?'selected':'' }}>Supporting Staff</option>
                                    <option value="Supporting Staff2" {{ old('employeetype',$employee->employeetype)=='Supporting Staff2'?'selected':'' }}>Supporting Staff2</option>


                                </select>

                            </div>
                        </div>

                    </div>

                    <div class=" row">

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="designation" class="">Designation</label>
                                <select class="form-control"name="designation" id="designation" >
                                    <option value="--">Select Type</option>
                                    <option value="MD" {{old('designation',$employee->designation)=='MD'?'selected':''}}>MD</option>
                                    <option value="Manager" {{old('designation',$employee->designation)=='Manager'?'selected':''}}>Manager</option>
                                    <option value="Accountant" {{old('designation',$employee->designation)=='Accountant'?'selected':''}}>Accountant</option>
                                    <option value="LDC" {{old('designation',$employee->designation)=='LDC'?'selected':''}}>LDC</option>
                                    <option value="Computer Operator" {{old('designation',$employee->designation)=='Computer Operator'?'selected':''}}>Computer Operator</option>
                                    <option value="Supporting" {{old('designation',$employee->designation)=='Supporting'?'selected':''}}>Supporting</option>


                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="employee_parent_id" class="">Reporting Employee</label>
                                <select class="form-control"name="employee_parent_id" id="employee_parent_id" >
                                    <option value="--">Select Type</option>
                                    {{-- @for($i=1;$i<=count($parents);$i++) --}}
                                    @foreach($parents as $parent)
                                    <option value="{{$parent['id']}}" {{old('employee_parent_id',$employee->employee_parent_id)==$parent['id']?'selected':''}}>{{$parent['name']}}</option>
                                    @endforeach
                                    {{-- <option value="2">Supporting</option> --}}
                                    {{-- @endfor --}}

                                </select>

                            </div>
                        </div>

                        

                        

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="joining_date" class="">Joining Date</label>
                                <input type="text"  class="form-control " id="joining_date" name="joining_date" value="{{old('joining_date',$employee->joining_date)}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="joining_date" class="">Date of Birth</label>
                                <input type="text"  class="form-control " id="dob" name="dob" value="{{old('dob',$employee->dob)}}">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="email" class="">Email</label>
                                <input type="text"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email',$employee->email)}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="phone" class="">Phone</label>
                                <input type="text"  class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone',$employee->phone)}}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="phone" class="">Educational Qualification</label>
                                <input type="text"  class="form-control " id="educational_qualification" name="educational_qualification" value="{{old('educational_qualification',$employee->educational_qualification)}}">
                                
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="address" class="">Address</label>
                                <input type="text"  class="form-control " id="address" name="address" value="{{old('address',$employee->address)}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="city" class="">City</label>
                                <input type="text"  class="form-control " id="city" name="city" value="{{old('city',$employee->city)}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="state" class="">State</label>
                                <input type="text"  class="form-control " id="state" name="state" value="{{old('state',$employee->state)}}">
                            </div>
                        </div>

                    </div>

                    

                    <div class="row">

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>

                
            
            
        
        
    </div>
@endsection