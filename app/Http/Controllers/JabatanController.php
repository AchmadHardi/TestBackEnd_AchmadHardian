<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Level;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\JabatanStoreRequest;
use App\Http\Requests\JabatanUpdateRequest;
use Illuminate\Http\JsonResponse;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::latest()->paginate(5);

        return view('jabatan.index', compact('jabatans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        return view('jabatan.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanStoreRequest $request): JsonResponse
    {
        $jabatan = Jabatan::create($request->validated());

        if ($jabatan) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dibuat',
                'data' => $jabatan,
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
        // Get jabatan by ID
        $jabatan = Jabatan::findOrFail($id);
        $levels = Level::all();

        // Render view with jabatan data
        return view('jabatan.edit', compact('jabatan', 'levels'));
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanUpdateRequest $request, string $id): JsonResponse
    {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Jabatan updated successfully',
            'data' => $jabatan,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $jabatan = Jabatan::findOrFail($id);

        if ($jabatan->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Jabatan deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete jabatan',
            ], 500);
        }
    }
}
