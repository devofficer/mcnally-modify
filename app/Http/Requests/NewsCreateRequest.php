<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
            'slug'  => 'required|max:255',
            'subtitle' => 'required|max:500',
            'description' => 'required',
            'date' => 'required',
            'visibility' => 'required|array',
            'image' => 'required',
            'epigraph' => 'required|max:255',
        ];
    }
}
