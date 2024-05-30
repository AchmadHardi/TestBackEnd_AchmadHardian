<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function validateInput(Request $request)
    {
        // Validasi input di sini
        // Misalnya, cek apakah input adalah angka
        $input = $request->input('input');

        if (!is_numeric($input)) {
            return response()->json(['valid' => false]); // Mengirim respons JSON jika input tidak valid
        }

        return response()->json(['valid' => true]); // Mengirim respons JSON jika input valid
    }
}
