<?php

namespace App\Services;

use App\Models\LeaveRequest;
use App\Services\AbstractServices;

class LeaveRequestService extends AbstractServices
{
    public function __construct(LeaveRequest $leaveRequest)
    {
        parent::__construct($leaveRequest);
    }
    public function getAllLeaveRequests()
    {
        return $this->eloquentGetAll();
    }
    public function getLeaveRequestById($id)
    {
        return $this->eloquentFind($id);
    }
    public function storeLeaveRequest($leaveRequest)
    {
        return $this->eloquentPostCreate($leaveRequest);
    }
    public function updateLeaveRequest($id, $leaveRequest)
    {
        $leaveRequest = (array)$leaveRequest;
        return $this->eloquentUpdate($id, $leaveRequest);
    }
    public function destroyLeaveRequest($id)
    {
        return $this->eloquentDelete($id);
    }
}
