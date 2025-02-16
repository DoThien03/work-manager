<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_code',
        'emp_name',
        'emp_dob',
        'password',
        'emp_email',
        'emp_position',
        'emp_level',
        'emp_join_date',
        'emp_annual_leave_days',
        'emp_remaining_leave_days',
        'dept_id',
        'emp_status'
    ];
    public function employeeDepartment()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
