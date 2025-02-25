<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Services\LeaveRequestService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    use ApiResponseTrait;
    protected $leaveRequestService;
    public function __construct(LeaveRequestService $leaveRequestService)
    {
        $this->leaveRequestService = $leaveRequestService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $leaveRequest = $this->leaveRequestService->getAllLeaveRequests();
            if ($leaveRequest) {
                return $this->successResponse([
                    'message' => 'Get all leave requests',
                    'leaveRequest' => $leaveRequest
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
            $leaveRequest = $this->leaveRequestService->storeLeaveRequest($data);
            if ($leaveRequest) {
                return $this->successResponse([
                    'message' => 'Create leave request successfully',
                    'leaveRequest' => $leaveRequest
                ]);
            }
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
            $leaveRequest = $this->leaveRequestService->getLeaveRequestById($id);
            if ($leaveRequest) {
                return $this->successResponse([
                    'message' => 'Leave request was successfully with id ' . $id,
                    'leaveRequest' => $leaveRequest
                ]);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveRequest $leaveRequest)
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
                'leave_start_date' => 'required|date',
                'leave_end_date' => 'required|date',
                'leave_reason' => 'required|string|max:255',
                'leave_status' => 'required',
                'leave_type' => 'required',
                'leave_hours' => 'required',
                'leave_approved_date' => 'date',
                'leave_confirm_reason' => 'string|max:255',
            ]);
            $leaveRequest = $this->leaveRequestService->updateLeaveRequest($id, $data);
            if ($leaveRequest) {
                return $this->successResponse([
                    'message' => 'Update Leave request successfully with id ' . $id,
                    'leave Request' => $leaveRequest
                ]);
            }
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
            $leaveRequest = $this->leaveRequestService->destroyLeaveRequest($id);
            if ($leaveRequest) {
                return $this->successResponse([
                    'message' => 'Delete leave Request Successfully with id ' . $id,
                    'leaveRequest' => $leaveRequest
                ]);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }
}
