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
    public function messages(){
        return [
                    'nombre_proyecto.required' => 'Debe ingresar un nombre de proyecto...',
                    'entidad_solicitante.required' => 'Debe ingresar una entidad solicitante...',
                    'contratista.required' => 'Debe ingresar un contratista...',
                    'monto_contratado.required' => 'Debe ingresar un monto...',
                    'inicio_obra.required' => 'Debe ingresar una fecha de inicio...',
                    'fin_obra.required' => 'Debe ingresar una fecha de termino...',

        ];
    }
}
