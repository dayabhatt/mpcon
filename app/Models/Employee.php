<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table='employee';

    protected $fillable=['employeetype','employee_parent_id','first_name','last_name'
    ,'designation','joining_date','dob','email','phone','address','city','state'
    ,'employee_status','user_id','educational_qualification'];


}
