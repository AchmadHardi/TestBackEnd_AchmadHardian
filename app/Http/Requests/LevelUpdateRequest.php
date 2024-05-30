<?php

// DepartmentUpdateRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_level' => 'required|string|max:255',
            // Atur aturan validasi lain sesuai kebutuhan Anda
        ];
    }
}

