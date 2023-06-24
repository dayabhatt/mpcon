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

                <form  method="post" action="{{ route('appraisal.updatereview',$appraisal->id) }}" >

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
                                <h5>{{$appraisal->employee->first_name.' '.$appraisal->employee->last_name}}</h5></div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Designation: {{$appraisal->employee->designation}}
                            </div>
                            <div class="col-md-4">
                                DOB: {{$appraisal->employee->dob}}
                            </div>
                            <div class="col-md-4">
                                Educational qualification: {{$appraisal->employee->educational_qualification}}
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
                                Present Place of Posting: {{old('present_place_of_posting',$appraisal->present_place_of_posting)}}
                            </div>
                            <div class="col-md-6">
                                Appraisal for the Period: {{old('appraisal_for_the_period',$appraisal->appraisal_for_the_period)}}
                            </div>
                            
                            
                        </div>
                        
                        @if($employeetype=='Professional')
                        <div class="row">
                            <div class="col-md-6">
                                Annual Plan Target: {{old('annual_plan_target',$appraisal->annual_plan_target)}}
                            </div>
                            <div class="col-md-6">
                                Annual Plan Achievement: {{old('annual_plan_achievement',$appraisal->annual_plan_achievement)}}
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
                                       <strong>i.    Project Reports/Consultancy:</strong> {{old('project_reports_consultancy',$appraisal->project_reports_consultancy)}}
                                    
                                </div>
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <strong>ii.	EDPs/SDPs/ Trainings Conducted/Handled:</strong> {{old('edp_sdp_trainings_conducted_handled',$appraisal->edp_sdp_trainings_conducted_handled)}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <strong>iii.  Specialized Trainings /Capacity Building Programmes/ Workshop/ Seminars   Organised :</strong>{{old('specialized_trainings_capacity',$appraisal->specialized_trainings_capacity)}}
                                </div>
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                       <strong>iii.	Reasons for Achievement/Non Achievement of Annual Plan Target:</strong>{{old('reasons_for_achievement_annual_plan_target',$appraisal->reasons_for_achievement_annual_plan_target)}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <strong>v.Other Responsibilities handled:</strong> {{old('other_responsibilities_handled',$appraisal->other_responsibilities_handled)}}
                                </div>
                                
                            </div>

                        @endif

                        @if($appraisal->employee->employeetype!='Supporting Staff2')

                            <div class="row">
                                <div class="col-md-12">
                                   <strong>A.2	Please indicate your areas of Interest of work where you would like to Share more responsibility:</strong> {{old('areas_of_interest_of_work',$appraisal->areas_of_interest_of_work)}}
                                </div>

                                
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <strong>A.3 Please indicate the areas /subject on which you would like to undergo training in the future.:</strong>{{old('areas_undergo_training',$appraisal->areas_undergo_training)}}
                                </div>
                            </div>

                        @endif
                        

                    </section>

                    <section>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>To be filled by the Reporting Officer :</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>B.1   Rate the Appraise on the following parameters on a Scale of 1 to 10. (Please indicate reasons for significantly lower or higher ratings).

                                </h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="tblappraisel" class="table">
                                    <thead>
                                        <tr>
                                            <th>Parameter</th>
                                            <th>Ranking</th>
                                            <th>Comments/Remarks</th>
                                        </tr>
                                    </thead>
                                    @if($employeetype=='Professional')

                                    <tbody>
                                        
                                        <tr>
                                            <td>Integrity, honesty & Trustworthiness</td>
                                            <td><input type="text"   class="form-control " id="integrity_honesty_ranking" name="integrity_honesty_ranking" value="{{old('integrity_honesty_ranking')}}"></td>
                                            <td><textarea class="form-control" id="integrity_honesty_comments" name="integrity_honesty_comments" rows="2">{{old('integrity_honesty_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Behaviour with colleagues, Clients & Others</td>
                                            <td><input type="text"   class="form-control " id="behaviour_colleagues_ranking" name="behaviour_colleagues_ranking" value="{{old('behaviour_colleagues_ranking')}}"></td>
                                            <td><textarea class="form-control" id="behaviour_colleagues_comments" name="behaviour_colleagues_comments" rows="2">{{old('behaviour_colleagues_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Discipline- Observance & Maintenance</td>
                                            <td><input type="text"   class="form-control " id="discipline_observance_ranking" name="discipline_observance_ranking" value="{{old('discipline_observance_ranking')}}"></td>
                                            <td><textarea class="form-control" id="discipline_observance_comments" name="discipline_observance_comments" rows="2">{{old('discipline_observance_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Quality of Work Delivered by You</td>
                                            <td><input type="text"   class="form-control " id="quality_of_work_ranking" name="quality_of_work_ranking" value="{{old('quality_of_work_ranking')}}"></td>
                                            <td><textarea class="form-control" id="quality_of_work_comments" name="quality_of_work_comments" rows="2">{{old('quality_of_work_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Initiative & Dependability</td>
                                            <td><input type="text"   class="form-control " id="initiative_dependability_ranking" name="initiative_dependability_ranking" value="{{old('initiative_dependability_ranking')}}"></td>
                                            <td><textarea class="form-control" id="initiative_dependability_comments" name="initiative_dependability_comments" rows="2">{{old('initiative_dependability_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Analytical Skills</td>
                                            <td><input type="text"   class="form-control " id="analytical_skills_ranking" name="analytical_skills_ranking" value="{{old('analytical_skills_ranking')}}"></td>
                                            <td><textarea class="form-control" id="analytical_skills_comments" name="analytical_skills_comments" rows="2">{{old('analytical_skills_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Writing & Drafting Ability</td>
                                            <td><input type="text"   class="form-control " id="writing_drafting_ranking" name="writing_drafting_ranking" value="{{old('writing_drafting_ranking')}}"></td>
                                            <td><textarea class="form-control" id="writing_drafting_comments" name="writing_drafting_comments" rows="2">{{old('writing_drafting_comments')}}</textarea></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Annual Plan Achievement    3x</td>
                                            <td><input type="text"   class="form-control " id="annual_plan_achievement_ranking" name="annual_plan_achievement_ranking" value="{{old('annual_plan_achievement_ranking')}}"></td>
                                            <td><textarea class="form-control" id="annual_plan_achievement_comments" name="annual_plan_achievement_comments" rows="2">{{old('annual_plan_achievement_comments')}}</textarea></td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                    @endif
                                    @if($employeetype=='Supporting Staff')
                                        <tbody>
                                            
                                            <tr>
                                                <td>Quality of work</td>
                                                <td><input type="text"   class="form-control " id="quality_of_work_ranking_s_staff" name="quality_of_work_ranking_s_staff" value="{{old('quality_of_work_ranking_s_staff')}}"></td>
                                                <td><textarea class="form-control" id="quality_of_work_comments_s_staff" name="quality_of_work_comments_s_staff" rows="2">{{old('quality_of_work_comments_s_staff')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Volume of work (output)</td>
                                                <td><input type="text"   class="form-control " id="volum_of_work_ranking" name="volum_of_work_ranking" value="{{old('volum_of_work_ranking')}}"></td>
                                                <td><textarea class="form-control" id="volum_of_work_comments" name="volum_of_work_comments" rows="2">{{old('volum_of_work_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Dependability</td>
                                                <td><input type="text"   class="form-control " id="dependability_ranking" name="dependability_ranking" value="{{old('dependability_ranking')}}"></td>
                                                <td><textarea class="form-control" id="dependability_comments" name="dependability_comments" rows="2">{{old('dependability_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Initiative</td>
                                                <td><input type="text"   class="form-control " id="initiative_ranking" name="initiative_ranking" value="{{old('initiative_ranking')}}"></td>
                                                <td><textarea class="form-control" id="initiative_comments" name="initiative_comments" rows="2">{{old('initiative_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Job knowledge Volume of work</td>
                                                <td><input type="text"   class="form-control " id="job_knowledge_ranking" name="job_knowledge_ranking" value="{{old('job_knowledge_ranking')}}"></td>
                                                <td><textarea class="form-control" id="job_knowledge_comments" name="job_knowledge_comments" rows="2">{{old('job_knowledge_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Communication (oral)</td>
                                                <td><input type="text"   class="form-control " id="communication_oral_ranking" name="communication_oral_ranking" value="{{old('communication_oral_ranking')}}"></td>
                                                <td><textarea class="form-control" id="communication_oral_comments" name="communication_oral_comments" rows="2">{{old('communication_oral_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Communication (writing)</td>
                                                <td><input type="text"   class="form-control " id="communication_writing_ranking" name="communication_writing_ranking" value="{{old('communication_writing_ranking')}}"></td>
                                                <td><textarea class="form-control" id="communication_writing_comments" name="communication_writing_comments" rows="2">{{old('communication_writing_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Attitude to Superiors/Co-workers</td>
                                                <td><input type="text"   class="form-control " id="attitude_ranking" name="attitude_ranking" value="{{old('attitude_ranking')}}"></td>
                                                <td><textarea class="form-control" id="attitude_comments" name="attitude_comments" rows="2">{{old('attitude_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Regularity/Punctuality</td>
                                                <td><input type="text"   class="form-control " id="regularity_ranking" name="regularity_ranking" value="{{old('regularity_ranking')}}"></td>
                                                <td><textarea class="form-control" id="regularity_comments" name="regularity_comments" rows="2">{{old('regularity_comments')}}</textarea></td>
                                                
                                            </tr>
                                            
                                        </tbody>
                                    @endif
                                    @if($employeetype=='Supporting Staff2')

                                        <tbody>
                                            
                                            <tr>
                                                <td>Regularity/Punctuality</td>
                                                <td><input type="text"   class="form-control " id="regularity_punctuality_ranking" name="regularity_punctuality_ranking" value="{{old('regularity_punctuality_ranking')}}"></td>
                                                <td><textarea class="form-control" id="regularity_punctuality_comments" name="regularity_punctuality_comments" rows="2">{{old('regularity_punctuality_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Trust worthiness(Honest & Integrity)</td>
                                                <td><input type="text"   class="form-control " id="trust_worthiness_ranking" name="trust_worthiness_ranking" value="{{old('trust_worthiness_ranking')}}"></td>
                                                <td><textarea class="form-control" id="trust_worthiness_comments" name="trust_worthiness_comments" rows="2">{{old('trust_worthiness_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Courtesy, Personal Relations etc.</td>
                                                <td><input type="text"   class="form-control " id="courtesy_ranking" name="courtesy_ranking" value="{{old('courtesy_ranking')}}"></td>
                                                <td><textarea class="form-control" id="courtesy_comments" name="courtesy_comments" rows="2">{{old('courtesy_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Diligence</td>
                                                <td><input type="text"   class="form-control " id="diligence_ranking" name="diligence_ranking" value="{{old('diligence_ranking')}}"></td>
                                                <td><textarea class="form-control" id="diligence_comments" name="diligence_comments" rows="2">{{old('diligence_comments')}}</textarea></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Willingness to learn</td>
                                                <td><input type="text"   class="form-control " id="willingness_ranking" name="willingness_ranking" value="{{old('willingness_ranking')}}"></td>
                                                <td><textarea class="form-control" id="willingness_comments" name="willingness_comments" rows="2">{{old('willingness_comments')}}</textarea></td>
                                                
                                            </tr>

                                            
                                            
                                        </tbody>

                                    @endif
                                </table>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="areas_of_interest_of_work" class="">B.2	Any other comments on appraise by the Reporting Officer:</label>
                                    <textarea class="form-control" id="comments_by_reporting_officer" name="comments_by_reporting_officer" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                        
                        
                        @if($employeetype=='Supporting Staff')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="project_reports_consultancy" class="">B.2	Whether  the appraise has good working knowledge and experience in Computer ?</label>
                                        <textarea class="form-control" id="working_knowledge_computer" name="working_knowledge_computer" rows="2">{{old('working_knowledge_computer')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="areas_undergo_training" class="">B.3 Comments/recommendation of the Reporting Officer on the Training needs of  the appraise:</label>
                                    <textarea class="form-control" id="recommendation_reporting_officer" name="recommendation_reporting_officer" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        @if($employeetype=='Supporting Staff2' || $employeetype=='Professional')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="areas_of_interest_of_work" class="">C. Please indicate the areas on which the appraise needs improvement</label>
                                        <textarea class="form-control" id="areas_improvement" name="areas_improvement" rows="2"></textarea>
                                    </div>
                                </div>

                                
                                
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="areas_undergo_training" class="">D. Report/Recommendations/Suggestions of the Managing Director:</label>
                                    <textarea class="form-control" id="suggestions_managing_director" name="suggestions_managing_director" rows="2"></textarea>
                                </div>
                            </div>
                        </div>


                    </section>

                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name_reporting_officer" class="">Name of the Reporting Officer:</label>
                                    <input type="text"  class="form-control" id="name_reporting_officer" name="name_reporting_officer" value="{{old('name_reporting_officer')}}">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="designation_reporting_officer" class="">Designation of the Reporting Officer:</label>
                                    <input type="text"  class="form-control" id="designation_reporting_officer" name="designation_reporting_officer" value="{{old('designation_reporting_officer')}}">
                                    
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
