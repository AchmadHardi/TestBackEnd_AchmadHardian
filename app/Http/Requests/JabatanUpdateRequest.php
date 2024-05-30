<?php

// DepartmentUpdateRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JabatanUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_jabatan' => 'required',
            'id_level' => 'required',
        ];
    }
}

