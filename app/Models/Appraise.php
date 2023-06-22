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
                        ,'reasons_for_achievement_annual_plan_target','other_responsibilities_handled'];
}
