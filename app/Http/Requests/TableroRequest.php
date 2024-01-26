<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //el valor del total de filas es requerido, debe ser un entero y puede tomar solo 3 valores.
        return [
            'totalFilas' => 'required|integer|in:8,64,1000',
        ];
    }

    public function messages()
    {
        return [

            'totalFilas.required' => 'El campo totalFilas es obligatorio.',
            'totalFilas.integer' => 'El campo totalFilas debe ser un entero.',
            'totalFilas.in' => 'El campo totalFilas debe ser uno de los siguientes valores: 8, 64 o 1000.',
        ];
    }

    protected function failedValidation($validator)
    {
        $response = [
            'status:' => 'error',
            'mensaje:' => $validator->errors()->first(),
        ];

        throw new \Illuminate\Validation\ValidationException(
            $validator,
            response()->json($response, 422)
        );
    }
}
