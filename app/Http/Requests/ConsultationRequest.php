<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
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
            'id_malade'=>'required|integer',
            'date_prochaine_rdv'=>'nullable|string',
            'type_consultation'=>'string|required',
            'soins'=>'string|required',
            'versement'=>'string|required',
            'rest'=>'string|required',

        ];
    }
}
