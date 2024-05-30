<?php

namespace App\Http\Controllers;

use App\Models\Level;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\LevelStoreRequest;
use App\Http\Requests\LevelUpdateRequest;

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
    public function store(LevelStoreRequest $request): RedirectResponse
    {
        Level::create($request->validated());

        return redirect()->route('level.index')
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
    public function update(LevelUpdateRequest $request, $id): RedirectResponse
    {
        $levels = Level::findOrFail($id);

        $levels->update($request->validated());
        return redirect()->route('level.index')
            ->with([
                'message' => 'Level updated successfully',
                'alert-type' => 'warning',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $levels = Level::findOrFail($id);
        $levels->delete();

        return redirect()->route('level.index')
            ->with([
                'message' => 'Department deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
