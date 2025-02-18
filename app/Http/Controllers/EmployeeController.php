<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeService;
use App\Traits\ApiResponseTrait;

use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use ApiResponseTrait;
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employees = $this->employeeService->GetAllEmployee();
            return $this->successResponse([
                'message' => 'Success',
                'Employees' => $employees
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $employee = $this->employeeService->storeEmployee($data);
            return $this->successResponse([
                'message' => 'Employee successfully',
                'employee' => $employee
            ], 200);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $employee = $this->employeeService->getEmployeeById($id);
            return $this->successResponse([
                'message' => 'Employee list was successfully',
                'employee' => $employee
            ]);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
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
                'emp_name' => 'required|string',
            ]);
            $employee = $this->employeeService->updateEmployee($id, $data);
            return $this->successResponse([
                'message' => "Employee updated successfully",
                'employee' => $employee
            ]);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employee = $this->employeeService->destroyEmployee($id);
            return $this->successResponse([
                'message' => "Successfully deleted employee",
                'employee' => $employee
            ]);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        };
    }
}
