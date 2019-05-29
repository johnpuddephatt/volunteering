<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $rules =  [
            'name' => 'required|unique:organisations|max:100',
            'contact_name' => 'required',
            'contact_role' => 'required',
            'phone' => 'required',
            'info' => 'required|max:300',
            'website' => 'nullable',
            'logo' => 'nullable',
            'photo' => 'nullable',

        ];
        if(\Auth::guest()) {
          $rules['password'] = 'required';
          $rules['email'] = 'email|unique:organisations|required';
        }
        return $rules;
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
          'name.unique' => 'This organisation name has already been taken.',
          'email.unique' => 'This email address has already been taken.'
        ];
    }
}
