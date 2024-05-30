<?php

namespace App\Http\Controllers;

use App\Models\Department;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

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
    public function store(DepartmentStoreRequest $request): RedirectResponse
    {
        Department::create($request->validated());

        return redirect()->route('department.index')
            ->with([
                'message' => 'data sukses dibuat',
                'alert-type' => 'success',
            ]);
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
    public function edit(string $id): View
    {
        //get product by ID
        $departments = Department::findOrFail($id);

        //render view with product
        return view('department.edit', compact('departments'));
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, $id): RedirectResponse
    {
        $departments = Department::findOrFail($id);

        $departments->update($request->validated());
        return redirect()->route('department.index')
            ->with([
                'message' => 'Department updated successfully',
                'alert-type' => 'warning',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index')
            ->with([
                'message' => 'Department deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
