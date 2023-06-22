@extends('layouts.app')

@section('title', 'Employee| MPCON')

{{-- //Sweet Alert --}}
@if(Session::has('success'))
  <script type="text/javascript">

  function massge() {
  Swal.fire(
            'Employee!',
            'Successfully Saved!',
            'success'
        );
  }

  window.onload = massge;
 </script>
@endif

@section('style')
<link href="{{ asset('css/datatables.min.css')}}" rel="stylesheet">

@endsection

@section('footerscript')
<script>
    $('#tblemployee').DataTable();
</script>
@endsection

@section('content')

<div class="container-fluid px-4">
    <!--<h1 class="mt-4">Dashboard</h1>-->
    <div class="row">
        <div class="col-md-6">
            <a href="{{  route('employeecreate') }}" class="btn btn-primary">New Employee</a>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb mb-4 text-right">
                <li class="breadcrumb-item active">Employee List</li>
            </ol> 
        </div>
    </div>
     

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Employee List
        </div>
        <div class="card-body">
            <table id="tblemployee" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>DOB</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>DOB</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </tfoot> --}}
                <tbody>
                    @foreach($employesses as $employee)
                    <tr>
                        <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                        <td>{{$employee->designation}}</td>
                        <td>{{$employee->dob}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->email}}</td>
                        <td><a href="{{  route('employee.edit',$employee->id) }}"><i class="fas fa-edit me-1"></i></a><a onclick="return confirm('Are you sure?')" href="{{  route('employee.delete',$employee->id) }}"><i class="fas fa-trash me-1"></i></a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection