<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
            'city' => 'required|max:30',
            'country'  => 'required|max:30',
            'postalcode' => 'required|max:10',
            'document' => 'required|max:20',
            'address' => 'required|max:50',
            'birthday' => 'required',
        ];
    }
}
