<?php

namespace App\Services;

use App\Models\Department;
use App\Services\AbstractServices;

class DepartmentService extends AbstractServices
{
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }
    public function getAllDepartments()
    {
        return $this->eloquentGetAll();
    }
    public function getDepartmentById($id)
    {
        return $this->eloquentFind($id);
    }
    public function storeDepartment($department)
    {
        return $this->eloquentPostCreate($department);
    }
    public function updateDepartment($id, $department)
    {
        $data = (array)$department;
        return $this->eloquentUpdate($id, $data);
    }
    public function destroyDepartment($id)
    {
        return $this->eloquentDelete($id);
    }
}
