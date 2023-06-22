@extends('layouts.app')

@section('title', 'Appraise| MPCON')

@section('footerscript')

<script>
    $(document).ready(function($){
        $("#employee_id").change(function(){
            
            var employee=$(this).value;

            $.ajax({
                type: "GET",
                url: "{{url('/employeedata/2')}}",
                success: function(data)
                {
                    // console.log("data:"+ (data[0]['designation']));
                    $("#designation").val(data[0]['designation']);
                    $("#dob").val(data[0]['dob']);
                } 

            
            });
        });
    })
</script>

@endsection

@section('content')
    <div class="container-fluid px-4">
    
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Employee Appraise</li>
        </ol> 

        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-light fa-user-tie me-2 mr-2"></i>Appraise Form</h5>
            </div>

            <div class="card-body">

                <form  method="post" action="{{ route('appraise.submit') }}" >

                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="employee_id" class="">Employee</label>
                                <select class="form-select"name="employee_id" id="employee_id" >
                                    <option value="--">Select Type</option>
                                    
                                    @foreach($employees as $employee)
                                    <option value="{{$employee['id']}}">{{$employee['first_name'].' '.$employee['last_name']}}</option>
                                    @endforeach
                                    

                                </select>

                            </div>
                        </div>
                    </div>

                    <section class="employeedetails">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Employee Details</h6>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="designation" class="">Designation</label>
                                    <input type="text" disabled  class="form-control" id="designation" name="designation" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">DOB</label>
                                    <input type="text" disabled class="form-control" id="dob" name="dob" value="">
                                </div>
                            </div>
                            {{-- <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">DOB</label>
                                    <input type="text"  class="form-control" id="dob" name="dob" value="">
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="present_place_of_posting" class="">Present Place of Posting</label>
                                    <input type="text"   class="form-control @error('present_place_of_posting') is-invalid @enderror" id="present_place_of_posting" name="present_place_of_posting" value="">
                                    @error('present_place_of_posting')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="appraisal_for_the_period" class="">Appraisal for the Period</label>
                                    <input type="text"  class="form-control @error('appraisal_for_the_period') is-invalid @enderror" id="appraisal_for_the_period" name="appraisal_for_the_period" value="">
                                    @error('appraisal_for_the_period')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="annual_plan_target" class="">Annual Plan Target</label>
                                    <input type="text"  class="form-control @error('annual_plan_target') is-invalid @enderror" id="annual_plan_target" name="annual_plan_target" value="">
                                    @error('annual_plan_target')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">DOB</label>
                                    <input type="text"  class="form-control" id="dob" name="dob" value="">
                                </div>
                            </div> --}}
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="annual_plan_achievement" class="">Annual Plan Achievement</label>
                                    <input type="text"  class="form-control @error('annual_plan_achievement') is-invalid @enderror" id="annual_plan_achievement" name="annual_plan_achievement" value="">
                                    @error('annual_plan_achievement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        


                    </section>

                    <section>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>A.1 Key Responsibilities/Works Handled during the Reporting Period (Please Write 
                                    N.A., if not applicable)</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="designation" class="">i.    Project Reports/Consultancy:</label>
                                    <textarea class="form-control" id="project_reports_consultancy" name="project_reports_consultancy" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">ii.	EDPs/SDPs/ Trainings Conducted/Handled:</label>
                                    <textarea class="form-control" id="edp_sdp_trainings_conducted_handled" name="edp_sdp_trainings_conducted_handled" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="designation" class="">iii.  Specialized Trainings /Capacity Building Programmes/ Workshop/ Seminars   Organised :</label>
                                    <textarea class="form-control" id="specialized_trainings_capacity" name="specialized_trainings_capacity" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">iii.	Reasons for Achievement/Non Achievement of Annual Plan Target:</label>
                                    <textarea class="form-control" id="reasons_for_achievement_annual_plan_target" name="reasons_for_achievement_annual_plan_target" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="designation" class="">Other Responsibilities handled: </label>
                                    <textarea class="form-control" id="other_responsibilities_handled" name="other_responsibilities_handled" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                    </section>

                    <div class="row">

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
@endsection
