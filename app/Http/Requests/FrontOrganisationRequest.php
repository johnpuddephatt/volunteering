<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class FrontOrganisationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
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
            'name' => 'required|max:100',
            'password' => 'required',
            'email' => 'required|email|unique:organisations',
            'contact_name' => 'required',
            'contact_role' => 'required',
            'phone' => 'required',
            'info' => 'required|max:300',
            'website' => 'nullable',
            'logo' => 'nullable',
            'photo' => 'nullable',

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'organisation name',
            'email' => 'email address',
            'phone' => 'phone number',
            'info' => 'organisation info'

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
