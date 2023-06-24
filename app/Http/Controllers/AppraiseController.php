<?php

namespace App\Http\Controllers;

use App\Models\Appraise;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;


class AppraiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        $employee=$user->employee;
        $appraisals=$employee->appraisals()->latest()->get();
        $output=[];

        if($appraisals->count()){
            foreach($appraisals as $appraise){
                $employee=Employee::find($appraise->employee_id);
                $name=$employee->first_name.' '.$employee->last_name;
                $designation=$employee->designation;
                $dob=$employee->dob;

                $output[]=['name'=>$name,'designation'=>$designation,'dob'=>$dob
                ,'present_place_of_posting'=>$appraise->present_place_of_posting
                ,'appraisal_for_the_period'=>$appraise->appraisal_for_the_period
                ,'id'=>$appraise->id];
            }
        }
        return view('admin.appraise.index')->with('appraises',$output)->with('user',$user);
    }

    

    function reviewlist(){
        $user = Auth::user();
        $employee=$user->employee;
        $subordinateids=$employee->subordinates()->pluck('id')->toArray();
        $appraisals=Appraise::whereIn('employee_id',$subordinateids)->where('send_to_reporting_officer',1)->latest()->get();
        
        $output=[];

        if($appraisals->count()){
            foreach($appraisals as $appraise){
                
                $name=$appraise->employee->first_name.' '.$appraise->employee->last_name;
                
                $designation=$appraise->employee->designation;
                $dob=$appraise->employee->dob;

                $output[]=['name'=>$name,'designation'=>$designation,'dob'=>$dob
                ,'present_place_of_posting'=>$appraise->present_place_of_posting
                ,'appraisal_for_the_period'=>$appraise->appraisal_for_the_period
                ,'id'=>$appraise->id];
            }
        }
        // return view('admin.appraise.index',['appraises'=>$output]);
        return view('admin.appraise.reviewlist',['appraises'=>$output]);

    }
    public function create()
    {
        $user = Auth::user();
        $employee=$user->employee;   
        return view('admin.appraise.create',['employeetype'=>$employee->employeetype]);
    }

    public function updatereport(Request $request,Appraise $appraise)
    {
        $appraise->send_to_reporting_officer=1;

        $appraise->save();

        return Redirect::route('appraisal');
    }

    function updatereview(Request $request,Appraise $appraisal)
    {
        
        $appraisal->appraise_Officer_date=date('d/m/Y');
        $appraisal->integrity_honesty_ranking=$request->integrity_honesty_ranking;
        $appraisal->integrity_honesty_comments=$request->integrity_honesty_comments;
        $appraisal->behaviour_colleagues_ranking=$request->behaviour_colleagues_ranking;
        $appraisal->behaviour_colleagues_comments=$request->behaviour_colleagues_comments;
        $appraisal->discipline_observance_ranking=$request->discipline_observance_ranking;
        $appraisal->discipline_observance_comments=$request->discipline_observance_comments;
        $appraisal->quality_of_work_ranking=$request->quality_of_work_ranking;
        $appraisal->quality_of_work_comments=$request->quality_of_work_comments;
        $appraisal->initiative_dependability_ranking=$request->initiative_dependability_ranking;
        $appraisal->initiative_dependability_comments=$request->initiative_dependability_comments;
        $appraisal->analytical_skills_ranking=$request->analytical_skills_ranking;
        $appraisal->analytical_skills_comments=$request->analytical_skills_comments;
        $appraisal->writing_drafting_ranking=$request->writing_drafting_ranking;
        $appraisal->writing_drafting_comments=$request->writing_drafting_comments;
        $appraisal->annual_plan_achievement_ranking=$request->annual_plan_achievement_ranking;
        $appraisal->annual_plan_achievement_comments=$request->annual_plan_achievement_comments;
        $appraisal->comments_by_reporting_officer=$request->comments_by_reporting_officer;

        $appraisal->recommendation_reporting_officer=$request->recommendation_reporting_officer;
        $appraisal->areas_improvement=$request->areas_improvement;
        $appraisal->suggestions_managing_director=$request->suggestions_managing_director;
        $appraisal->reporting_Officer_date=date('d/m/Y');
        $appraisal->managing_director_date=date('d/m/Y');

        $appraisal->key_responsibilities_supporting_staff=$request->key_responsibilities_supporting_staff;
        $appraisal->areas_of_interest_supporting_staff=$request->areas_of_interest_supporting_staff;
        $appraisal->undergo_training_supporting_staff=$request->undergo_training_supporting_staff;
        $appraisal->reporting_officer_date_supporting_staff=date('d/m/Y');

        $appraisal->quality_of_work_ranking_s_staff=$request->quality_of_work_ranking_s_staff;
        $appraisal->quality_of_work_comments_s_staff=$request->quality_of_work_comments_s_staff;
        $appraisal->volum_of_work_ranking=$request->volum_of_work_ranking;
        $appraisal->volum_of_work_comments=$request->volum_of_work_comments;
        $appraisal->dependability_ranking=$request->dependability_ranking;
        $appraisal->dependability_comments=$request->dependability_comments;
        $appraisal->initiative_ranking=$request->initiative_ranking;
        $appraisal->initiative_comments=$request->initiative_comments;
        $appraisal->job_knowledge_ranking=$request->job_knowledge_ranking;
        $appraisal->job_knowledge_comments=$request->job_knowledge_comments;
        $appraisal->communication_oral_ranking=$request->communication_oral_ranking;
        $appraisal->communication_oral_comments=$request->communication_oral_comments;
        $appraisal->communication_writing_ranking=$request->communication_writing_ranking;
        $appraisal->communication_writing_comments=$request->communication_writing_comments;

        $appraisal->attitude_ranking=$request->attitude_ranking;
        $appraisal->attitude_comments=$request->attitude_comments;
        $appraisal->regularity_ranking=$request->regularity_ranking;
        $appraisal->regularity_comments=$request->regularity_comments;

        $appraisal->working_knowledge_computer=$request->working_knowledge_computer;
        $appraisal->other_comment_ss=$request->other_comment_ss;
        $appraisal->suggestions_md_ss=$request->suggestions_md_ss;
        $appraisal->reporting_officer_name=$request->reporting_officer_name;
        $appraisal->reporting_officer_designation=$request->reporting_officer_designation;
        $appraisal->reporting_officer_date_ss=date('d/m/Y');
        $appraisal->key_responsibilities_supporting_staff_last=$request->key_responsibilities_supporting_staff_last;
        $appraisal->filled_reporting_officer=$request->filled_reporting_officer;
        $appraisal->regularity_punctuality_ranking=$request->regularity_punctuality_ranking;
        $appraisal->regularity_punctuality_comments=$request->regularity_punctuality_comments;
        $appraisal->trust_worthiness_ranking=$request->trust_worthiness_ranking;
        $appraisal->trust_worthiness_comments=$request->trust_worthiness_comments;
        $appraisal->courtesy_ranking=$request->courtesy_ranking;
        $appraisal->courtesy_comments=$request->courtesy_comments;
        $appraisal->diligence_ranking=$request->diligence_ranking;
        $appraisal->diligence_comments=$request->diligence_comments;
        $appraisal->willingness_ranking=$request->willingness_ranking;
        $appraisal->willingness_comments=$request->willingness_comments;

        $appraisal->comment_rofficer=$request->comment_rofficer;
        $appraisal->needs_improvement=$request->needs_improvement;
        $appraisal->name_reporting_officer=$request->name_reporting_officer;
        $appraisal->designation_reporting_officer=$request->designation_reporting_officer;
        $appraisal->md_suggestion=$request->md_suggestion;
        $appraisal->md_date=date('d/m/Y');



        $appraisal->save();

        // return view('admin.appraise.reviewlist',['appraisal'=>$appraisal]);
        return Redirect::route('appraisal.reviewlist');


    }

    function reviewappraisal(Request $request, Appraise $appraisal){
        return view('appraise.reviewappraisal',['appraisal'=>$appraisal]);
    }
    function reviewappraisalupdate(Request $request, Appraise $appraisal){
        $user = Auth::user();
        
        $employee=$user->employee;   

        
        

        $employees=Employee::all();
        return view('admin.appraise.reviewappraisal',['employeetype'=>$employee->employeetype,'appraisal'=>$appraisal]);

    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'present_place_of_posting'=>'required',
            'appraisal_for_the_period'=>'required',
            'annual_plan_target'=>'required',
            'annual_plan_achievement'=>'required',

        ]);

        $employee_id=auth()->user()->employee->id;
        $send_to_reporting_officer=$request->has('submitandsend')?1:0;
        $present_place_of_posting=$request->present_place_of_posting;
        $appraisal_for_the_period=$request->appraisal_for_the_period;
        $annual_plan_target=$request->annual_plan_target;
        $annual_plan_achievement=$request->annual_plan_achievement;
        $project_reports_consultancy=$request->project_reports_consultancy;
        $edp_sdp_trainings_conducted_handled=$request->edp_sdp_trainings_conducted_handled;
        $specialized_trainings_capacity=$request->specialized_trainings_capacity;
        $reasons_for_achievement_annual_plan_target=$request->reasons_for_achievement_annual_plan_target;
        $other_responsibilities_handled=$request->other_responsibilities_handled;
        $areas_of_interest_of_work=$request->areas_of_interest_of_work;
        $areas_undergo_training=$request->areas_undergo_training;
        $appraise_Officer_date=date('d/m/Y');
        $integrity_honesty_ranking=$request->integrity_honesty_ranking;
        $integrity_honesty_comments=$request->integrity_honesty_comments;
        $behaviour_colleagues_ranking=$request->behaviour_colleagues_ranking;
        $behaviour_colleagues_comments=$request->behaviour_colleagues_comments;
        $discipline_observance_ranking=$request->discipline_observance_ranking;
        $discipline_observance_comments=$request->discipline_observance_comments;
        $quality_of_work_ranking=$request->quality_of_work_ranking;
        $quality_of_work_comments=$request->quality_of_work_comments;
        $initiative_dependability_ranking=$request->initiative_dependability_ranking;
        $initiative_dependability_comments=$request->initiative_dependability_comments;
        $analytical_skills_ranking=$request->analytical_skills_ranking;
        $analytical_skills_comments=$request->analytical_skills_comments;
        $writing_drafting_ranking=$request->writing_drafting_ranking;
        $writing_drafting_comments=$request->writing_drafting_comments;
        $annual_plan_achievement_ranking=$request->annual_plan_achievement_ranking;
        $annual_plan_achievement_comments=$request->annual_plan_achievement_comments;
        $comments_by_reporting_officer=$request->comments_by_reporting_officer;
        $recommendation_reporting_officer=$request->recommendation_reporting_officer;
        $areas_improvement=$request->areas_improvement;
        $suggestions_managing_director=$request->suggestions_managing_director;
        $reporting_Officer_date=date('d/m/Y');
        $managing_director_date=date('d/m/Y');

        $key_responsibilities_supporting_staff=$request->key_responsibilities_supporting_staff;
        $areas_of_interest_supporting_staff=$request->areas_of_interest_supporting_staff;
        $undergo_training_supporting_staff=$request->undergo_training_supporting_staff;
        $reporting_officer_date_supporting_staff=date('d/m/Y');

        $quality_of_work_ranking_s_staff=$request->quality_of_work_ranking_s_staff;
        $quality_of_work_comments_s_staff=$request->quality_of_work_comments_s_staff;
        $volum_of_work_ranking=$request->volum_of_work_ranking;
        $volum_of_work_comments=$request->volum_of_work_comments;
        $dependability_ranking=$request->dependability_ranking;
        $dependability_comments=$request->dependability_comments;
        $initiative_ranking=$request->initiative_ranking;
        $initiative_comments=$request->initiative_comments;
        $job_knowledge_ranking=$request->job_knowledge_ranking;
        $job_knowledge_comments=$request->job_knowledge_comments;
        $communication_oral_ranking=$request->communication_oral_ranking;
        $communication_oral_comments=$request->communication_oral_comments;
        $communication_writing_ranking=$request->communication_writing_ranking;
        $communication_writing_comments=$request->communication_writing_comments;
        $attitude_ranking=$request->attitude_ranking;
        $attitude_comments=$request->attitude_comments;
        $regularity_ranking=$request->regularity_ranking;
        $regularity_comments=$request->regularity_comments;

        $working_knowledge_computer=$request->working_knowledge_computer;
        $other_comment_ss=$request->other_comment_ss;
        $suggestions_md_ss=$request->suggestions_md_ss;
        $reporting_officer_name=$request->reporting_officer_name;
        $reporting_officer_designation=$request->reporting_officer_designation;
        $reporting_officer_date_ss=date('d/m/Y');
        $key_responsibilities_supporting_staff_last=$request->key_responsibilities_supporting_staff_last;
        $filled_reporting_officer=$request->filled_reporting_officer;
        $regularity_punctuality_ranking=$request->regularity_punctuality_ranking;
        $regularity_punctuality_comments=$request->regularity_punctuality_comments;
        $trust_worthiness_ranking=$request->trust_worthiness_ranking;
        $trust_worthiness_comments=$request->trust_worthiness_comments;
        $courtesy_ranking=$request->courtesy_ranking;
        $courtesy_comments=$request->courtesy_comments;
        $diligence_ranking=$request->diligence_ranking;
        $diligence_comments=$request->diligence_comments;
        $willingness_ranking=$request->willingness_ranking;
        $willingness_comments=$request->willingness_comments;

        $comment_rofficer=$request->comment_rofficer;
        $needs_improvement=$request->needs_improvement;
        $name_reporting_officer=$request->name_reporting_officer;
        $designation_reporting_officer=$request->designation_reporting_officer;
        $md_suggestion=$request->md_suggestion;
        $md_date=date('d/m/Y');



        $appraise=Appraise::create([
            'employee_id'=>$employee_id,
            'present_place_of_posting'=>$present_place_of_posting,
            'appraisal_for_the_period'=>$appraisal_for_the_period,
            'annual_plan_target'=>$annual_plan_target,
            'annual_plan_achievement'=>$annual_plan_achievement,
            'project_reports_consultancy'=>$project_reports_consultancy,
            'edp_sdp_trainings_conducted_handled'=>$edp_sdp_trainings_conducted_handled,
            'specialized_trainings_capacity'=>$specialized_trainings_capacity,
            'reasons_for_achievement_annual_plan_target'=>$reasons_for_achievement_annual_plan_target,
            'other_responsibilities_handled'=>$other_responsibilities_handled,
            'areas_of_interest_of_work'=>$areas_of_interest_of_work,
            'areas_undergo_training'=>$areas_undergo_training,
            'appraise_Officer_date'=>$appraise_Officer_date,
            'integrity_honesty_ranking'=>$integrity_honesty_ranking,
            'integrity_honesty_comments'=>$integrity_honesty_comments,
            'behaviour_colleagues_ranking'=>$behaviour_colleagues_ranking,
            'behaviour_colleagues_comments'=>$behaviour_colleagues_comments,
            'discipline_observance_ranking'=>$discipline_observance_ranking,
            'discipline_observance_comments'=>$discipline_observance_comments,
            'quality_of_work_ranking'=>$quality_of_work_ranking,
            'quality_of_work_comments'=>$quality_of_work_comments,
            'initiative_dependability_ranking'=>$initiative_dependability_ranking,
            'initiative_dependability_comments'=>$initiative_dependability_comments,
            'analytical_skills_ranking'=>$analytical_skills_ranking,
            'analytical_skills_comments'=>$analytical_skills_comments,
            'writing_drafting_ranking'=>$writing_drafting_ranking,
            'writing_drafting_comments'=>$writing_drafting_comments,
            'annual_plan_achievement_ranking'=>$annual_plan_achievement_ranking,
            'annual_plan_achievement_comments'=>$annual_plan_achievement_comments,
            'comments_by_reporting_officer'=>$comments_by_reporting_officer,
            'recommendation_reporting_officer'=>$recommendation_reporting_officer,
            'areas_improvement'=>$areas_improvement,
            'suggestions_managing_director'=>$suggestions_managing_director,
            'reporting_Officer_date'=>$reporting_Officer_date,
            'managing_director_date'=>$managing_director_date,
            'key_responsibilities_supporting_staff'=>$key_responsibilities_supporting_staff,
            'areas_of_interest_supporting_staff'=>$areas_of_interest_supporting_staff,
            'undergo_training_supporting_staff'=>$undergo_training_supporting_staff,
            'reporting_officer_date_supporting_staff'=>$reporting_officer_date_supporting_staff,
            'quality_of_work_ranking_s_staff'=>$quality_of_work_ranking_s_staff,
            'quality_of_work_comments_s_staff'=>$quality_of_work_comments_s_staff,
            'volum_of_work_ranking'=>$volum_of_work_ranking,
            'volum_of_work_comments'=>$volum_of_work_comments,
            'dependability_ranking'=>$dependability_ranking,
            'dependability_comments'=>$dependability_comments,
            'initiative_ranking'=>$initiative_ranking,
            'initiative_comments'=>$initiative_comments,
            'job_knowledge_ranking'=>$job_knowledge_ranking,
            'job_knowledge_comments'=>$job_knowledge_comments,
            'communication_oral_ranking'=>$communication_oral_ranking,
            'communication_oral_comments'=>$communication_oral_comments,
            'communication_writing_ranking'=>$communication_writing_ranking,
            'communication_writing_comments'=>$communication_writing_comments,
            'attitude_ranking'=>$attitude_ranking,
            'attitude_comments'=>$attitude_comments,
            'regularity_ranking'=>$regularity_ranking,
            'regularity_comments'=>$regularity_comments,
            'working_knowledge_computer'=>$working_knowledge_computer,
            'other_comment_ss'=>$other_comment_ss,
            'suggestions_md_ss'=>$suggestions_md_ss,
            'reporting_officer_name'=>$reporting_officer_name,
            'reporting_officer_designation'=>$reporting_officer_designation,
            'reporting_officer_date_ss'=>$reporting_officer_date_ss,
            'key_responsibilities_supporting_staff_last'=>$key_responsibilities_supporting_staff_last,
            'filled_reporting_officer'=>$filled_reporting_officer,
            'regularity_punctuality_ranking'=>$regularity_punctuality_ranking,
            'regularity_punctuality_comments'=>$regularity_punctuality_comments,
            'trust_worthiness_ranking'=>$trust_worthiness_ranking,
            'trust_worthiness_comments'=>$trust_worthiness_comments,
            'courtesy_ranking'=>$courtesy_ranking,
            'courtesy_comments'=>$courtesy_comments,
            'diligence_ranking'=>$diligence_ranking,
            'diligence_comments'=>$diligence_comments,
            'willingness_ranking'=>$willingness_ranking,
            'willingness_comments'=>$willingness_comments,
            'comment_rofficer'=>$comment_rofficer,
            'needs_improvement'=>$needs_improvement,
            'name_reporting_officer'=>$name_reporting_officer,
            'designation_reporting_officer'=>$designation_reporting_officer,
            'md_suggestion'=>$md_suggestion,
            'md_date'=>$md_date,
            'send_to_reporting_officer'=>$send_to_reporting_officer
            
       
        ]);

        return Redirect::route('appraisal')->with('appraises',$appraise)->withSuccess('Employee Save Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appraise  $appraise
     * @return \Illuminate\Http\Response
     */
    public function show(Appraise $appraise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appraise  $appraise
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Appraise $appraise)
    {
        $user = Auth::user();
        
        $employee=$user->employee;   

        

        $employees=Employee::all();
        return view('admin.appraise.edit',['employeetype'=>$employee->employeetype,'appraise'=>$appraise]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appraise  $appraise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appraise $appraise)
    {

        $this->validate($request,[
            'present_place_of_posting'=>'required',
            'appraisal_for_the_period'=>'required',
            'annual_plan_target'=>'required',
            'annual_plan_achievement'=>'required',

        ]);



        $appraise->employee_id=auth()->user()->employee->id;
        $appraise->send_to_reporting_officer=$request->has('submitandsend')?1:0;

        $appraise->present_place_of_posting=$request->present_place_of_posting;
        $appraise->appraisal_for_the_period=$request->appraisal_for_the_period;
        $appraise->annual_plan_target=$request->annual_plan_target;
        $appraise->annual_plan_achievement=$request->annual_plan_achievement;

        $appraise->project_reports_consultancy=$request->project_reports_consultancy;
        $appraise->edp_sdp_trainings_conducted_handled=$request->edp_sdp_trainings_conducted_handled;
        $appraise->specialized_trainings_capacity=$request->specialized_trainings_capacity;
        $appraise->reasons_for_achievement_annual_plan_target=$request->reasons_for_achievement_annual_plan_target;
        $appraise->other_responsibilities_handled=$request->other_responsibilities_handled;
        $appraise->areas_of_interest_of_work=$request->areas_of_interest_of_work;
        $appraise->areas_undergo_training=$request->areas_undergo_training;


        $appraise->appraise_Officer_date=date('d/m/Y');
        $appraise->integrity_honesty_ranking=$request->integrity_honesty_ranking;
        $appraise->integrity_honesty_comments=$request->integrity_honesty_comments;
        $appraise->behaviour_colleagues_ranking=$request->behaviour_colleagues_ranking;
        $appraise->behaviour_colleagues_comments=$request->behaviour_colleagues_comments;
        $appraise->discipline_observance_ranking=$request->discipline_observance_ranking;
        $appraise->discipline_observance_comments=$request->discipline_observance_comments;
        $appraise->quality_of_work_ranking=$request->quality_of_work_ranking;
        $appraise->quality_of_work_comments=$request->quality_of_work_comments;
        $appraise->initiative_dependability_ranking=$request->initiative_dependability_ranking;
        $appraise->initiative_dependability_comments=$request->initiative_dependability_comments;
        $appraise->analytical_skills_ranking=$request->analytical_skills_ranking;
        $appraise->analytical_skills_comments=$request->analytical_skills_comments;
        $appraise->writing_drafting_ranking=$request->writing_drafting_ranking;
        $appraise->writing_drafting_comments=$request->writing_drafting_comments;
        $appraise->annual_plan_achievement_ranking=$request->annual_plan_achievement_ranking;
        $appraise->annual_plan_achievement_comments=$request->annual_plan_achievement_comments;
        $appraise->comments_by_reporting_officer=$request->comments_by_reporting_officer;

        $appraise->recommendation_reporting_officer=$request->recommendation_reporting_officer;
        $appraise->areas_improvement=$request->areas_improvement;
        $appraise->suggestions_managing_director=$request->suggestions_managing_director;
        $appraise->reporting_Officer_date=date('d/m/Y');
        $appraise->managing_director_date=date('d/m/Y');

        $appraise->key_responsibilities_supporting_staff=$request->key_responsibilities_supporting_staff;
        $appraise->areas_of_interest_supporting_staff=$request->areas_of_interest_supporting_staff;
        $appraise->undergo_training_supporting_staff=$request->undergo_training_supporting_staff;
        $appraise->reporting_officer_date_supporting_staff=date('d/m/Y');

        $appraise->quality_of_work_ranking_s_staff=$request->quality_of_work_ranking_s_staff;
        $appraise->quality_of_work_comments_s_staff=$request->quality_of_work_comments_s_staff;
        $appraise->volum_of_work_ranking=$request->volum_of_work_ranking;
        $appraise->volum_of_work_comments=$request->volum_of_work_comments;
        $appraise->dependability_ranking=$request->dependability_ranking;
        $appraise->dependability_comments=$request->dependability_comments;
        $appraise->initiative_ranking=$request->initiative_ranking;
        $appraise->initiative_comments=$request->initiative_comments;
        $appraise->job_knowledge_ranking=$request->job_knowledge_ranking;
        $appraise->job_knowledge_comments=$request->job_knowledge_comments;
        $appraise->communication_oral_ranking=$request->communication_oral_ranking;
        $appraise->communication_oral_comments=$request->communication_oral_comments;
        $appraise->communication_writing_ranking=$request->communication_writing_ranking;
        $appraise->communication_writing_comments=$request->communication_writing_comments;

        $appraise->attitude_ranking=$request->attitude_ranking;
        $appraise->attitude_comments=$request->attitude_comments;
        $appraise->regularity_ranking=$request->regularity_ranking;
        $appraise->regularity_comments=$request->regularity_comments;

        $appraise->working_knowledge_computer=$request->working_knowledge_computer;
        $appraise->other_comment_ss=$request->other_comment_ss;
        $appraise->suggestions_md_ss=$request->suggestions_md_ss;
        $appraise->reporting_officer_name=$request->reporting_officer_name;
        $appraise->reporting_officer_designation=$request->reporting_officer_designation;
        $appraise->reporting_officer_date_ss=date('d/m/Y');
        $appraise->key_responsibilities_supporting_staff_last=$request->key_responsibilities_supporting_staff_last;
        $appraise->filled_reporting_officer=$request->filled_reporting_officer;
        $appraise->regularity_punctuality_ranking=$request->regularity_punctuality_ranking;
        $appraise->regularity_punctuality_comments=$request->regularity_punctuality_comments;
        $appraise->trust_worthiness_ranking=$request->trust_worthiness_ranking;
        $appraise->trust_worthiness_comments=$request->trust_worthiness_comments;
        $appraise->courtesy_ranking=$request->courtesy_ranking;
        $appraise->courtesy_comments=$request->courtesy_comments;
        $appraise->diligence_ranking=$request->diligence_ranking;
        $appraise->diligence_comments=$request->diligence_comments;
        $appraise->willingness_ranking=$request->willingness_ranking;
        $appraise->willingness_comments=$request->willingness_comments;

        $appraise->comment_rofficer=$request->comment_rofficer;
        $appraise->needs_improvement=$request->needs_improvement;
        $appraise->name_reporting_officer=$request->name_reporting_officer;
        $appraise->designation_reporting_officer=$request->designation_reporting_officer;
        $appraise->md_suggestion=$request->md_suggestion;
        $appraise->md_date=date('d/m/Y');



        $appraise->save();

        return Redirect::route('appraisal',['appraises'=>$appraise]);
    }

    
    public function destroy(Request $request,Appraise $appraise)
    {
        $appraise->delete();

        return Redirect::route('appraisal');

    }
}
