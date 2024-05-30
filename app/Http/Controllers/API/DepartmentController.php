<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $departments = Department::latest()->paginate(5);

        return response()->json($departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentStoreRequest $request): JsonResponse
    {
        $department = Department::create($request->validated());

        return response()->json($department, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $department = Department::findOrFail($id);

        return response()->json($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, string $id): JsonResponse
    {
        $department = Department::findOrFail($id);
        $department->update($request->validated());

        return response()->json($department, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(null, 204);
    }
}
