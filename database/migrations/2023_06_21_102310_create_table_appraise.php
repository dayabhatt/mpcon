<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAppraise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraise', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('present_place_of_posting');
            $table->string('appraisal_for_the_period')->nullable();
            $table->string('annual_plan_target')->nullable();
            $table->string('annual_plan_achievement')->nullable();
            $table->longText('project_reports_consultancy')->nullable();
            $table->longText('edp_sdp_trainings_conducted_handled')->nullable();
            $table->longText('specialized_trainings_capacity')->nullable();
            $table->longText('reasons_for_achievement_annual_plan_target')->nullable();
            $table->longText('other_responsibilities_handled')->nullable();
            $table->longText('areas_of_interest_of_work')->nullable();
            $table->longText('areas_undergo_training')->nullable();
            $table->string('appraise_Officer_date')->nullable();

            $table->integer('integrity_honesty_ranking')->default(1)->nullable();
            $table->string('integrity_honesty_comments')->nullable();

            $table->integer('behaviour_colleagues_ranking')->default(1)->nullable();
            $table->string('behaviour_colleagues_comments')->nullable();

            $table->integer('discipline_observance_ranking')->default(1)->nullable();
            $table->string('discipline_observance_comments')->nullable();

            $table->integer('quality_of_work_ranking')->default(1)->nullable();
            $table->string('quality_of_work_comments')->nullable();

            $table->integer('initiative_dependability_ranking')->default(1)->nullable();
            $table->string('initiative_dependability_comments')->nullable();

            $table->integer('analytical_skills_ranking')->default(1)->nullable();
            $table->string('analytical_skills_comments')->nullable();

            $table->integer('writing_drafting_ranking')->default(1)->nullable();
            $table->string('writing_drafting_comments')->nullable();

            $table->integer('annual_plan_achievement_ranking')->default(1)->nullable();
            $table->string('annual_plan_achievement_comments')->nullable();

            $table->longText('comments_by_reporting_officer')->nullable();
            $table->longText('recommendation_reporting_officer')->nullable();
            $table->longText('areas_improvement')->nullable();
            $table->longText('suggestions_managing_director')->nullable();

            $table->string('reporting_Officer_date')->nullable();
            $table->string('managing_director_date')->nullable();

            $table->string('key_responsibilities_supporting_staff')->nullable();
            $table->string('areas_of_interest_supporting_staff')->nullable();

            $table->string('undergo_training_supporting_staff')->nullable();

            $table->string('reporting_officer_date_supporting_staff')->nullable();

            $table->integer('quality_of_work_ranking_s_staff')->default(1)->nullable();
            $table->longText('quality_of_work_comments_s_staff')->nullable();

            $table->integer('volum_of_work_ranking')->default(1)->nullable();
            $table->longText('volum_of_work_comments')->nullable();

            $table->integer('dependability_ranking')->default(1)->nullable();
            $table->longText('dependability_comments')->nullable();

            $table->integer('initiative_ranking')->default(1)->nullable();
            $table->longText('initiative_comments')->nullable();

            $table->integer('job_knowledge_ranking')->default(1)->nullable();
            $table->longText('job_knowledge_comments')->nullable();


            $table->integer('communication_oral_ranking')->default(1)->nullable();
            $table->longText('communication_oral_comments')->nullable();

            $table->integer('communication_writing_ranking')->default(1)->nullable();
            $table->longText('communication_writing_comments')->nullable();

            $table->integer('attitude_ranking')->default(1)->nullable();
            $table->longText('attitude_comments')->nullable();

            $table->integer('regularity_ranking')->default(1)->nullable();
            $table->longText('regularity_comments')->nullable();

            $table->longText('working_knowledge_computer')->nullable();
            $table->longText('other_comment_ss')->nullable();
            $table->longText('suggestions_md_ss')->nullable();

            $table->longText('reporting_officer_name')->nullable();
            $table->longText('reporting_officer_designation')->nullable();
            $table->string('reporting_officer_date_ss')->nullable();

            $table->longText('key_responsibilities_supporting_staff_last')->nullable();
            $table->longText('filled_reporting_officer')->nullable();

            $table->integer('regularity_punctuality_ranking')->default(1)->nullable();
            $table->longText('regularity_punctuality_comments')->nullable();

            $table->integer('trust_worthiness_ranking')->default(1)->nullable();
            $table->longText('trust_worthiness_comments')->nullable();

            $table->integer('courtesy_ranking')->default(1)->nullable();
            $table->longText('courtesy_comments')->nullable();

            $table->integer('diligence_ranking')->default(1)->nullable();
            $table->longText('diligence_comments')->nullable();

            $table->integer('willingness_ranking')->default(1)->nullable();
            $table->longText('willingness_comments')->nullable();

            $table->longText('comment_rofficer')->nullable();
            $table->longText('needs_improvement')->nullable();

            $table->string('name_reporting_officer')->nullable();
            $table->string('designation_reporting_officer')->nullable();

            $table->longText('md_suggestion')->nullable();
            $table->string('md_date')->nullable();

            $table->boolean('send_to_reporting_officer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraise');
    }
}
