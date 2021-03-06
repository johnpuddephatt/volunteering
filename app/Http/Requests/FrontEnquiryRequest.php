<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class FrontEnquiryRequest extends FormRequest
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
          'enquirable_type' => 'required',
          'enquirable_id' => 'required|integer',
          'name' => 'required|max:100',
          'email' => 'nullable|email|max:100',
          'phone' => 'required_without:email|max:100',
          'message' => 'required|max:500'
        ];
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
            // 'name' => 'organisation name',
            // 'email' => 'email address',
            // 'phone' => 'phone number',
            // 'info' => 'organisation info'
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
            'phone.required_without' => 'You must provide either an email address or phone number',
            'name.required' => 'You must provide your name',
            'message.required' => 'You must enter a message',
        ];
    }
}
