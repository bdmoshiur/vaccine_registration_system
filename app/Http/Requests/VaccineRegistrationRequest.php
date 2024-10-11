<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nid' => 'required|string|max:20|unique:registrations,nid',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:registrations,email',
            'vaccine_center_id' => 'required|exists:vaccine_centers,id',
        ];
    }
}
