@extends('layouts.app')

@section('title', 'Appraisal| MPCON')

@section('footerscript')

<script>
    $(document).ready(function($){
        $("#employee_id").change(function(){
            
            

            var employee=$("#employee_id option:selected").val()

            {{-- alert(employee); --}}

            $("#designation").val('');
            $("#dob").val('');
            $('#educational_qualification').val('');

            $.ajax({
                type: "GET",
                url: "{{url('/employeedata')}}"+ '/' + employee,
                success: function(data)
                {
                    // console.log("data:"+ (data[0]['designation']));
                    $("#designation").val(data[0]['designation']);
                    $("#dob").val(data[0]['dob']);
                    $('#educational_qualification').val(data[0]['educational_qualification']);
                } 

            
            });
        });
    })
</script>

@endsection

@section('content')
    <div class="container-fluid px-4">
    
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Employee Appraisal</li>
        </ol> 

        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-light fa-user-tie me-2 mr-2"></i>Appraisal Form</h5>
            </div>

            <div class="card-body">

                <form  method="post" action="{{ route('appraisal.submit') }}" >

                    @csrf

                    

                    <section class="employeedetails">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Employee Details</h6>
                            </div>

                        </div>

                        {{-- <input type="text"   class="form-control" id="employee_id" name="employee_id" value=""> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h5>{{auth()->user()->employee->first_name.' '.auth()->user()->employee->last_name}}</h5></div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Designation: {{auth()->user()->employee->designation}}
                            </div>
                            <div class="col-md-4">
                                DOB: {{auth()->user()->employee->dob}}
                            </div>
                            <div class="col-md-4">
                                Educational qualification: {{auth()->user()->employee->educational_qualification}}
                                    
                            </div>
                            {{-- <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">DOB</label>
                                    <input type="text"  class="form-control" id="dob" name="dob" value="">
                                </div>
                            </div> --}}
                        </div>

                        
                        


                    </section>
                    <hr/>

                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="present_place_of_posting" class="">Present Place of Posting</label>
                                    <input type="text"   class="form-control @error('present_place_of_posting') is-invalid @enderror" id="present_place_of_posting" name="present_place_of_posting" value="{{old('present_place_of_posting')}}">
                                    @error('present_place_of_posting')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="appraisal_for_the_period" class="">Appraisal for the Period</label>
                                    <input type="text"  class="form-control @error('appraisal_for_the_period') is-invalid @enderror" id="appraisal_for_the_period" name="appraisal_for_the_period" value="{{old('appraisal_for_the_period')}}">
                                    @error('appraisal_for_the_period')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        @if($employeetype=='Professional')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="annual_plan_target" class="">Annual Plan Target</label>
                                    <input type="text"  class="form-control @error('annual_plan_target') is-invalid @enderror" id="annual_plan_target" name="annual_plan_target" value="{{old('annual_plan_target')}}">
                                    @error('annual_plan_target')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="annual_plan_achievement" class="">Annual Plan Achievement</label>
                                    <input type="text"  class="form-control @error('annual_plan_achievement') is-invalid @enderror" id="annual_plan_achievement" name="annual_plan_achievement" value="{{old('annual_plan_achievement')}}">
                                    @error('annual_plan_achievement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif
                    </section>

                    <section>

                        @if($employeetype=='Professional')

                            <div class="row">
                                <div class="col-md-12">
                                    <h6>A.1 Key Responsibilities/Works Handled during the Reporting Period (Please Write 
                                        N.A., if not applicable)</h6>
                                </div>
                            </div>
                       
                       

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="project_reports_consultancy" class="">i.    Project Reports/Consultancy:</label>
                                        <textarea  class="form-control" id="project_reports_consultancy" name="project_reports_consultancy" rows="2">{{old('project_reports_consultancy')}}</textarea>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="edp_sdp_trainings_conducted_handled" class="">ii.	EDPs/SDPs/ Trainings Conducted/Handled:</label>
                                        <textarea class="form-control" id="edp_sdp_trainings_conducted_handled" name="edp_sdp_trainings_conducted_handled" rows="2">{{old('edp_sdp_trainings_conducted_handled')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="specialized_trainings_capacity" class="">iii.  Specialized Trainings /Capacity Building Programmes/ Workshop/ Seminars   Organised :</label>
                                        <textarea class="form-control" id="specialized_trainings_capacity" name="specialized_trainings_capacity" rows="2">{{old('specialized_trainings_capacity')}}</textarea>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="reasons_for_achievement_annual_plan_target" class="">iii.	Reasons for Achievement/Non Achievement of Annual Plan Target:</label>
                                        <textarea class="form-control" id="reasons_for_achievement_annual_plan_target" name="reasons_for_achievement_annual_plan_target" rows="2">{{old('reasons_for_achievement_annual_plan_target')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="other_responsibilities_handled" class="">V. Other Responsibilities handled: </label>
                                        <textarea class="form-control" id="other_responsibilities_handled" name="other_responsibilities_handled" rows="2">{{old('other_responsibilities_handled')}}</textarea>
                                    </div>
                                </div>
                                
                            </div>

                        @endif

                        @if($employeetype!='Supporting Staff2')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="areas_of_interest_of_work" class="">A.2	Please indicate your areas of Interest of work where you would like to Share more responsibility:</label>
                                        <textarea class="form-control" id="areas_of_interest_of_work" name="areas_of_interest_of_work" rows="2">{{old('areas_of_interest_of_work')}}</textarea>
                                    </div>
                                </div>

                                
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="areas_undergo_training" class="">A.3 Please indicate the areas /subject on which you would like to undergo training in the future.</label>
                                        <textarea class="form-control" id="areas_undergo_training" name="areas_undergo_training" rows="2">{{old('areas_undergo_training')}}</textarea>
                                    </div>
                                </div>
                            </div>

                        @endif
                        

                    </section>

                   
                    
                    <div class="row">

                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button> <button type="submit" name="submitandsend" class="btn btn-primary mb-2">Submit & Send To Reporting Officer</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
@endsection
