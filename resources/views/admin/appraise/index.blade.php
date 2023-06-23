@extends('layouts.app')

@section('title', 'Appraisel| MPCON')

{{-- //Sweet Alert --}}
@if(Session::has('success'))
  <script type="text/javascript">

  function massge() {
  Swal.fire(
            'Appraisel!',
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
    $('#tblappraisel').DataTable();
</script>
@endsection

@section('content')

    <div class="container-fluid px-4">
        <!--<h1 class="mt-4">Dashboard</h1>-->
        <div class="row">
            <div class="col-md-6">
                <a href="{{  route('appraise.create') }}" class="btn btn-primary">New Appraisel</a>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb mb-4 text-right">
                    <li class="breadcrumb-item active">Appraisel List</li>
                </ol> 
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Appraisel List
            </div>
            <div class="card-body">
                <table id="tblappraisel" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>DOB</th>
                            <th>Posting Place</th>
                            <th>Appraisel Period</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($appraises as $appraise)
                        <tr>
                            <td>{{$appraise['name']}}</td>
                            <td>{{$appraise['designation']}}</td>
                            <td>{{$appraise['dob']}}</td>
                            <td>{{$appraise['present_place_of_posting']}}</td>
                            <td>{{$appraise['appraisal_for_the_period']}}</td>
                            <td><a href="{{  route('employee.edit',$appraise['id']) }}"><i class="fas fa-edit me-1"></i></a><a onclick="return confirm('Are you sure?')" href="{{  route('employee.delete',$appraise['id']) }}"><i class="fas fa-trash me-1"></i></a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection