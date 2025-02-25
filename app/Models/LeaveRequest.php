<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $table = 'leave_requests';
    protected $fillable  = [
        'emp_id',
        'leave_start_date',
        'leave_end_date',
        'leave_hours',
        'leave_type',
        'leave_reason',
        'leave_status',
        'leave_approved_date',
        'leave_confirm_reason',
        'leave_accept_by'
    ];

    public function LeaveRequestEmployee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
