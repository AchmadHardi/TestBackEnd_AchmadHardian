<?php

// DepartmentUpdateRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_dept' => 'required|string|max:255',
            // Atur aturan validasi lain sesuai kebutuhan Anda
        ];
    }
}

