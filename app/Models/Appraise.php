<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraise extends Model
{
    use HasFactory;

    protected $table='appraise';

    protected $fillable=['employee_id','present_place_of_posting','appraisal_for_the_period'
                        ,'annual_plan_target','annual_plan_achievement','project_reports_consultancy'
                        ,'edp_sdp_trainings_conducted_handled','specialized_trainings_capacity'
                        ,'reasons_for_achievement_annual_plan_target','other_responsibilities_handled'
                        ,'areas_of_interest_of_work','areas_undergo_training','appraise_Officer_date'
                        ,'integrity_honesty_ranking','integrity_honesty_comments'
                        ,'behaviour_colleagues_ranking','behaviour_colleagues_comments'
                        ,'discipline_observance_ranking','discipline_observance_comments'
                        ,'quality_of_work_ranking','quality_of_work_comments'
                        ,'initiative_dependability_ranking','initiative_dependability_comments'
                        ,'analytical_skills_ranking','analytical_skills_comments'
                        ,'writing_drafting_ranking','writing_drafting_comments'
                        ,'annual_plan_achievement_ranking','annual_plan_achievement_comments'
                        ,'comments_by_reporting_officer','recommendation_reporting_officer'
                        ,'areas_improvement','suggestions_managing_director'
                        ,'reporting_Officer_date','managing_director_date'
                        ,'key_responsibilities_supporting_staff','areas_of_interest_supporting_staff'
                        ,'undergo_training_supporting_staff','reporting_officer_date_supporting_staff'
                        ,'quality_of_work_ranking_s_staff','quality_of_work_comments_s_staff'
                        ,'volum_of_work_ranking','volum_of_work_comments'
                        ,'dependability_ranking','dependability_comments'
                        ,'initiative_ranking','initiative_comments'
                        ,'job_knowledge_ranking','job_knowledge_comments'
                        ,'communication_oral_ranking','communication_oral_comments'
                        ,'communication_writing_ranking','communication_writing_comments'
                        ,'attitude_ranking','attitude_comments'
                        ,'regularity_ranking','regularity_comments'
                        ,'working_knowledge_computer','other_comment_ss'
                        ,'suggestions_md_ss'
                        ,'reporting_officer_name','reporting_officer_designation'
                        ,'reporting_officer_date_ss'
                        ,'key_responsibilities_supporting_staff_last','filled_reporting_officer'
                        ,'regularity_punctuality_ranking','regularity_punctuality_comments'
                        ,'trust_worthiness_ranking','trust_worthiness_comments'
                        ,'courtesy_ranking','courtesy_comments'
                        ,'diligence_ranking','diligence_comments'
                        ,'willingness_ranking','willingness_comments'
                        ,'comment_rofficer','needs_improvement'
                        ,'name_reporting_officer','designation_reporting_officer'
                        ,'md_suggestion','md_date'
                        ,'send_to_reporting_officer'];
}
