<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if(request()->isMethod('post')){
            return [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
				'identification_document' => 'required|unique:personas,numerodocumento',
				'sexo' => 'required',
				'fechanacimiento' => 'required',
				'fechaexpedicion' => 'required',
				'direccion' => 'required',
				'telefono' => 'nullable|digits:10',
				'celular' => 'required|digits:10',
				'email' => 'required|unique:personas,email|email',
				'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
				'ciudad_idnacimiento' => 'required',
				'ciudad_idexpedicion' => 'required',
				'ciudad_idresidencia' => 'required',
				'tipodocumento_id' => 'required',
				'tiposanguineo_id' => 'required',
				
				'acudiente' => 'nullable|regex:/^[\pL\s\-]+$/u',
				'fechaingreso' => 'required',
				'archivo' => 'nullable|mimes:pdf|max:3000',
				'sisben_id' => 'required',
				'categoriaestudiante_id' => 'required'
				
            ];
        }elseif(request()->isMethod('put')){

        }
    }
}
