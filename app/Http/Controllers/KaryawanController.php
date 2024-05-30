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
    public function store(KaryawanStoreRequest $request): RedirectResponse
    {
        Karyawan::create($request->validated());

        return redirect()->route('karyawan.index')
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
        // Get karyawan by ID
        $karyawan = Karyawan::findOrFail($id);
        $jabatans = Jabatan::all(); // Jika perlu, Anda juga bisa mengambil daftar jabatan untuk digunakan dalam form edit

        // Render view with karyawan data
        return view('karyawan.edit', compact('karyawan', 'jabatans'));
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanUpdateRequest $request, $id): RedirectResponse
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update($request->validated());
        return redirect()->route('karyawan.index')
            ->with([
                'message' => 'karyawan updated successfully',
                'alert-type' => 'warning',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with([
                'message' => 'karyawan deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
