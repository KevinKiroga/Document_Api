<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Validacion de los campos
        return [
            'doc_nombre'     => 'required',
            'doc_codigo'     => 'unique:doc_documento,doc_codigo',
            'doc_contenido'  => 'required',
            'doc_id_tipo'    => 'required',
            'doc_id_proceso' => 'required',
        ];
    }

    public function messages(): array
    {
        // Personalizar los mensajes de las validaciones
        return [
            'doc_nombre'     => 'El campo nombre es obligatorio',
            'doc_codigo'     => 'El campo codigo es obligatorio y debe ser unico',
            'doc_contenido'  => 'El campo contenido es obligatorio',
            'doc_id_tipo'    => 'El campo tipo de documento es obligatorio',
            'doc_id_proceso' => 'El campo proceso es obligatorio',
        ];
    }
}
