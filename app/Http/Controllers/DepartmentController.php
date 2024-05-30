<?php

namespace App\Http\Controllers;

use App\Models\Department;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->paginate(5);

        return view('department.index', compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentStoreRequest $request): JsonResponse
    {
        $department = Department::create($request->validated());

        if ($department) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dibuat',
                'data' => $department,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat data',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, $id): JsonResponse
    {
        $department = Department::findOrFail($id);

        $department->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Department updated successfully',
            'data' => $department,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $department = Department::findOrFail($id);

        if ($department->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Department deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete department',
            ], 500); 
        }
    }
}
