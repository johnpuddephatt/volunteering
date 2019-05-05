<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class FrontOpportunityRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required|max:1000',
            'intro' => 'required|max:100',
            'places' => 'nullable',
            'minimum_age' => 'nullable',
            'expenses' => 'nullable',
            'requirements' => 'nullable',
            'categories' => 'nullable',
            'accessibilities' => 'nullable',
            'suitabilities' => 'nullable',
            'skills_needed' => 'nullable',
            'skills_gained' => 'nullable',
            'from_home' => 'nullable',
            'address' => 'nullable',
            'address_ward' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'frequency' => 'nullable',
            'hours' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable'
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
            //
        ];
    }
}
