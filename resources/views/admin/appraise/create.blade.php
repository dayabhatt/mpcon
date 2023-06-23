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
                                    <option value="">--Select Employee--</option>
                                    
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

                        {{-- <input type="text"   class="form-control" id="employee_id" name="employee_id" value=""> --}}

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
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dob" class="">Educational qualification</label>
                                    <input type="text" disabled class="form-control" id="educational_qualification" name="educational_qualification" value="">
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
                                    <input type="text"   class="form-control @error('present_place_of_posting') is-invalid @enderror" id="present_place_of_posting" name="present_place_of_posting" value="{{old('present_place_of_posting')}}">
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
                                    <input type="text"  class="form-control @error('appraisal_for_the_period') is-invalid @enderror" id="appraisal_for_the_period" name="appraisal_for_the_period" value="{{old('appraisal_for_the_period')}}">
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
                                    <input type="text"  class="form-control @error('annual_plan_target') is-invalid @enderror" id="annual_plan_target" name="annual_plan_target" value="{{old('annual_plan_target')}}">
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
                                    <input type="text"  class="form-control @error('annual_plan_achievement') is-invalid @enderror" id="annual_plan_achievement" name="annual_plan_achievement" value="{{old('annual_plan_achievement')}}">
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
                                    <label for="project_reports_consultancy" class="">i.    Project Reports/Consultancy:</label>
                                    <textarea class="form-control" id="project_reports_consultancy" name="project_reports_consultancy" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="edp_sdp_trainings_conducted_handled" class="">ii.	EDPs/SDPs/ Trainings Conducted/Handled:</label>
                                    <textarea class="form-control" id="edp_sdp_trainings_conducted_handled" name="edp_sdp_trainings_conducted_handled" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="specialized_trainings_capacity" class="">iii.  Specialized Trainings /Capacity Building Programmes/ Workshop/ Seminars   Organised :</label>
                                    <textarea class="form-control" id="specialized_trainings_capacity" name="specialized_trainings_capacity" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="reasons_for_achievement_annual_plan_target" class="">iii.	Reasons for Achievement/Non Achievement of Annual Plan Target:</label>
                                    <textarea class="form-control" id="reasons_for_achievement_annual_plan_target" name="reasons_for_achievement_annual_plan_target" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="other_responsibilities_handled" class="">Other Responsibilities handled: </label>
                                    <textarea class="form-control" id="other_responsibilities_handled" name="other_responsibilities_handled" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="areas_of_interest_of_work" class="">A.2	Please indicate your areas of Interest of work where you would like to Share more responsibility:</label>
                                    <textarea class="form-control" id="areas_of_interest_of_work" name="areas_of_interest_of_work" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="areas_undergo_training" class="">A.3 Please indicate the areas /subject on which you would like to undergo training in the   
                                        future.
                             </label>
                                    <textarea class="form-control" id="areas_undergo_training" name="areas_undergo_training" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        

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
                                    <tbody>
                                        
                                        <tr>
                                            <td>Integrity, honesty & Trustworthiness</td>
                                            <td><input type="text"   class="form-control " id="integrity_honesty_ranking" name="integrity_honesty_ranking" value="{{old('integrity_honesty_ranking')}}"></td>
                                            <td><textarea class="form-control" id="integrity_honesty_comments" name="integrity_honesty_comments" rows="2"></textarea></td>
                                            
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
                                </table>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="areas_of_interest_of_work" class="">B.2	Any other comments on appraise by the Reporting Officer:</label>
                                    <textarea class="form-control" id="comments_by_reporting_officer" name="comments_by_reporting_officer" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="areas_undergo_training" class="">B.3 Comments/recommendation of the Reporting Officer on the Training needs of  the appraise:</label>
                                    <textarea class="form-control" id="recommendation_reporting_officer" name="recommendation_reporting_officer" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="areas_of_interest_of_work" class="">C. Please indicate the areas on which the appraise needs improvement</label>
                                    <textarea class="form-control" id="areas_improvement" name="areas_improvement" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="areas_undergo_training" class="">D. Report/Recommendations/Suggestions of the Managing Director:</label>
                                    <textarea class="form-control" id="suggestions_managing_director" name="suggestions_managing_director" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>


                    </section>

                    <section>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>PERFORMANCE APPRAISAL (For Supporting  Staff)</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>To be filled by the Appraise</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="project_reports_consultancy" class="">A.1	Key Responsibilities/Works Handled during the Reporting Period (Please Write    N.A., if not applicable)</label>
                                    <textarea class="form-control" id="key_responsibilities_supporting_staff" name="key_responsibilities_supporting_staff" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="edp_sdp_trainings_conducted_handled" class="">A.2	Please indicate your areas of Interest of work where you would like to Share more
                                        responsibility:
                             </label>
                                    <textarea class="form-control" id="areas_of_interest_supporting_staff" name="areas_of_interest_supporting_staff" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="project_reports_consultancy" class="">A.3	Please indicate the areas /subject on which you would like to undergo training in the
                                        future.</label>
                                    <textarea class="form-control" id="undergo_training_supporting_staff" name="undergo_training_supporting_staff" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                    </section>

                    <section>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>B.1   Rate the Appraise on the following parameters on a Scale of 1 to 10. (Please indicate reasons for significantly lower or higher ratings).</h6>
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
                                    <tbody>
                                        
                                        <tr>
                                            <td>Quality of work</td>
                                            <td><input type="text"   class="form-control " id="quality_of_work_ranking_s_staff" name="quality_of_work_ranking_s_staff" value="{{old('quality_of_work_ranking_s_staff')}}"></td>
                                            <td><textarea class="form-control" id="quality_of_work_comments_s_staff" name="quality_of_work_comments_s_staff" rows="2"></textarea></td>
                                            
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
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="project_reports_consultancy" class="">B.2	Whether  the appraise has good working knowledge and experience in Computer ?</label>
                                    <textarea class="form-control" id="working_knowledge_computer" name="working_knowledge_computer" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="edp_sdp_trainings_conducted_handled" class="">B.3    Any other comments on appraise by the Reporting Officer.</label>
                                    <textarea class="form-control" id="other_comment_ss" name="other_comment_ss" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="project_reports_consultancy" class="">D. Report/Recommendations/Suggestions of the Managing Director:</label>
                                    <textarea class="form-control" id="suggestions_md_ss" name="suggestions_md_ss" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="reporting_officer_name" class="">Name of the Reporting Officer</label>
                                    <input type="text"   class="form-control" id="reporting_officer_name" name="reporting_officer_name" value="{{old('reporting_officer_name')}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="reporting_officer_designation" class="">Designation of the Reporting Officer</label>
                                    <input type="text"   class="form-control" id="reporting_officer_designation" name="reporting_officer_designation" value="{{old('reporting_officer_designation')}}">
                                </div>
                            </div>

                        </div>

                    </section>

                    <section>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>PERFORMANCE APPRAISAL (For Supporting  Staff)</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>To be filled by the Appraise</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="key_responsibilities_supporting_staff_last" class="">A.1	Key Responsibilities/Works Handled during the Reporting Period (Please Write    N.A., if not applicable)</label>
                                    <textarea class="form-control" id="key_responsibilities_supporting_staff_last" name="key_responsibilities_supporting_staff_last" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="filled_reporting_officer" class="">B. To be filled by the Reporting Officer/Admn. Incharge</label>
                                    <textarea class="form-control" id="filled_reporting_officer" name="filled_reporting_officer" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        

                        <div class="row">
                            <div class="col-md-12">
                                <h6>B.1   Rate the Appraise on the following parameters on a Scale of 1 to 10. 
                                    (Please indicate reasons for significantly lower or higher ratings).
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
                                    <tbody>
                                        
                                        <tr>
                                            <td>Regularity/Punctuality</td>
                                            <td><input type="text"   class="form-control " id="regularity_punctuality_ranking" name="regularity_punctuality_ranking" value="{{old('regularity_punctuality_ranking')}}"></td>
                                            <td><textarea class="form-control" id="regularity_punctuality_comments" name="regularity_punctuality_comments" rows="2"></textarea></td>
                                            
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
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="comment_rofficer" class="">C. Comments of the Reporting Officer on the appraise’s work</label>
                                    <textarea class="form-control" id="comment_rofficer" name="comment_rofficer" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="filled_reporting_officer" class="">C.1 Please indicate the areas on  which the appraise needs improvement </label>
                                    <textarea class="form-control" id="needs_improvement" name="needs_improvement" rows="2"></textarea>
                                </div>
                            </div>
                            
                        </div>

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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="md_suggestion" class="">D. Reports/Recommendations/suggestions of the Managing Director</label>
                                    <textarea class="form-control" id="md_suggestion" name="md_suggestion" rows="2"></textarea>
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
