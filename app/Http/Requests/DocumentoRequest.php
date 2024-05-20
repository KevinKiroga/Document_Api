<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
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
        return [
            'doc_nombre' => 'required',
            'doc_codigo' => 'unique:doc_documento,doc_codigo',
            'doc_contenido' => 'required',
            'doc_id_tipo' => 'required',
            'doc_id_proceso' => 'required',
        ];
    }
}
