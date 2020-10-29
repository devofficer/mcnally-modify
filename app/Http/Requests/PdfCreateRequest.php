<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PdfCreateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'desc' => 'required',
            'date' => 'required',
            'visibility' => 'required|array',
            'file' => 'required',
        ];
    }
}
