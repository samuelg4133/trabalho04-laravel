<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "firstname" => "bail|required|min:1|max:100",
            "lastname" => "bail|required|min:1",
            "birth_date" => "bail|date|required",
            "active" => "boolean",
            "profile_picture" => "bail|required|image|mimes:jpg,jpeg,png|max:2048",
            "role_id" => "required"
        ];
    }

    public function attributes(){
        return [
            "firstname" => "nome",
            "lastname" => "sobrenome",
            "role_id" => "função",
            "birth_date" => "data de nascimento",
            "active" => "status",
            "profile_picture" => "foto"
        ];
    }
}
