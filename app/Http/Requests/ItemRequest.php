<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
                'tipo_operacion' => ['required'],
                'fecha_registro' => ['required'],
                'descripcion' => ['required'],
                'tipo_recurso' => ['required'],
                'proveedor' => ['required'],
                'tipo_comprobante' => ['required'],
                'numero_comprobante' => ['required']
        ];
    }
    public function messages(){
        return [
                    'tipo_operacion.required' => 'Debe ingresar un tipo de operacion...',
                    'fecha_registro.required' => 'Debe ingresar una fecha de registro...',
                    'descripcion.required' => 'Debe ingresar una fecha de registro...',
                    'tipo_recurso.required' => 'Debe ingresar un tipo de recurso...',
                    'proveedor.required' => 'Debe ingresar un proveedor...',
                    'tipo_comprobante.required' => 'Debe ingresar una fecha de inici tipo de comprobante...',
                    'numero_comprobante.required' => 'Debe ingresar un numero de comprobante o en su defecto (S/F)...',

        ];
    }
}
