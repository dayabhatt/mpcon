<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='employee';

    protected $fillable=['employeetype','employee_parent_id','first_name','last_name'
    ,'designation','joining_date','dob','email','phone','address','city','state'
    ,'employee_status','user_id'];


}
