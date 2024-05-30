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
        return view('jabatan.create', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanStoreRequest $request): RedirectResponse
    {
        Jabatan::create($request->validated());

        return redirect()->route('jabatan.index')
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
    public function update(JabatanUpdateRequest $request, $id): RedirectResponse
    {
        $jabatans = Jabatan::findOrFail($id);

        $jabatans->update($request->validated());
        return redirect()->route('jabatan.index')
            ->with([
                'message' => 'jabatan updated successfully',
                'alert-type' => 'warning',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $jabatans = Jabatan::findOrFail($id);
        $jabatans->delete();

        return redirect()->route('jabatan.index')
            ->with([
                'message' => 'jabatan deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
