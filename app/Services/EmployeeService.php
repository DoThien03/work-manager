<?php

namespace App\Services;

use App\Models\Employee;
use App\Services\AbstractServices;

class EmployeeService extends AbstractServices
{
    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }
    public function GetAllEmployee()
    {
        return $this->eloquentGetAll();
    }
}
