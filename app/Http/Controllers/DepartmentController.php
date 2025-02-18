<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Services\DepartmentService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;


class DepartmentController extends Controller

{
    use ApiResponseTrait;
    protected $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $department = $this->departmentService->getAllDepartments();
            if ($department) {
                return $this->successResponse([
                    'message' => 'Get all departments',
                    'department' => $department
                ]);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $department = $this->departmentService->storeDepartment($data);
            if ($department) {
                return $this->successResponse([
                    'message' => 'Create department successfully',
                    'department' => $department
                ]);
            };
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $department = $this->departmentService->getDepartmentById($id);
            if ($department) {
                return $this->successResponse([
                    'message' => 'Get department information for department ' . $id,
                    'department' => $department
                ]);
            };
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'dept_name' => 'required|string'
            ]);
            $department = $this->departmentService->updateDepartment($id, $data);
            if ($department) {
                return $this->successResponse([
                    'message' => '  department updated successfully',
                    'department' => $department
                ]);
            };
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $department = $this->departmentService->destroyDepartment($id);
            if ($department) {
                return $this->successResponse([
                    'message' => 'Deleted department successfully with id = ' . $id,
                    'department' => $department
                ]);
            };
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }
}
