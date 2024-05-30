<?php

// DepartmentUpdateRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nik' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'id_jabatan' => 'required',
        ];
    }
}

