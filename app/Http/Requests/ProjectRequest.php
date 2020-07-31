<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'nombre_proyecto' => ['required'],
            'entidad_solicitante' => ['required'],
            'contratista' => ['required'],
            'monto_contratado' => ['required'],
            'inicio_obra' => ['required'],
            'fin_obra' => ['required']
        ];
    }
}