<?php

namespace App\Http\Controllers;

use App\Models\Level;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\LevelStoreRequest;
use App\Http\Requests\LevelUpdateRequest;
use Illuminate\Http\JsonResponse;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::latest()->paginate(5);

        return view('level.index', compact('levels'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelStoreRequest $request): JsonResponse
    {
        $level = Level::create($request->validated());

        if ($level) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dibuat',
                'data' => $level,
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
        //get product by ID
        $levels = Level::findOrFail($id);

        //render view with product
        return view('level.edit', compact('levels'));
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(LevelUpdateRequest $request, $id): JsonResponse
    {
        $level = Level::findOrFail($id);

        $level->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Level updated successfully',
            'data' => $level,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $level = Level::findOrFail($id);

        if ($level->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Level deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete level',
            ], 500);
        }
    }
}
