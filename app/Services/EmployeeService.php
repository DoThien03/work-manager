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
    public function storeEmployee($employee)
    {
        return $this->eloquentPostCreate($employee);
    }
    public function getEmployeeById($id)
    {
        return $this->eloquentFind($id);
    }
    public function updateEmployee($id, $employee)
    {
        $employee = (array)$employee;
        return $this->eloquentUpdate($id, $employee);
    }
    public function destroyEmployee($id)
    {
        return $this->eloquentDelete($id);
    }
}
