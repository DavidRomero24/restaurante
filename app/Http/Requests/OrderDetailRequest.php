<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDeteilRequest extends FormRequest
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
        if (request()->isMethod('POST')){
            return [
                'product_id' => 'nullable',
				'customer_id' => 'nullable',
				'price' => 'nullable',
                'total' => 'nullable',
                'subtotal'=>'nullable',
                'status' => 'nullable',
                'registerby' => 'nullable',	

            ];
        }elseif (request()->isMethod('put')){
            return[
                'product_id' => 'nullable',
				'customer_id' => 'nullable',
				'price' => 'nullable',
                'total' => 'nullable',
                'subtotal'=> 'nullable',
                'status' => 'nullable',
                'registerby' => 'nullable',	
            ];

        }
    }
}