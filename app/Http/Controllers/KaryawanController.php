<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\KaryawanStoreRequest;
use App\Http\Requests\KaryawanUpdateRequest;
use Illuminate\Http\JsonResponse;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(5);

        return view('karyawan.index', compact('karyawans'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('karyawan.create', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryawanStoreRequest $request): JsonResponse
    {
        $karyawans = Karyawan::create($request->validated());

        if ($karyawans) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dibuat',
                'data' => $karyawans,
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
    public function edit(string $id): View
    {
        // Get karyawan by ID
        $karyawan = Karyawan::findOrFail($id);
        $jabatans = Jabatan::all();
        
        return view('karyawan.edit', compact('karyawan', 'jabatans'));
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanUpdateRequest $request, $id): JsonResponse
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Karyawan updated successfully',
            'data' => $karyawan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $karyawan = Karyawan::findOrFail($id);

        if ($karyawan->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'karyawan deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete karyawan',
            ], 500);
        }
    }
}
