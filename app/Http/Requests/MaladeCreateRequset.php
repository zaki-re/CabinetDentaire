<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaladeCreateRequset extends FormRequest
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
            'nom' => '|string|max:50',
            'prenom' => '|string|max:50',
            'address' => 'nullable|string|max:50',
            'phone' => 'nullable|digits:10',
        ];
    }
}
