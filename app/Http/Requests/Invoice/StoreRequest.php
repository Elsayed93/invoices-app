<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'invoice_number' => 'required|string|max:190',
            'invoice_date' => 'required|date|after_or_equal:' . date('Y-m-d'),
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'section_id' => 'required|exists:sections,id',
            'product_id' => 'required|exists:products,id',
            'amount_collection' => 'required|numeric|between:0,999999.99', // 
            'amount_commision' => 'required|numeric|between:0,999999.99',
            'discount' => 'required|numeric|between:0,999999.99',
            'vat_rate' => 'required|string|max:190',
            'vat_value' => 'required|numeric|between:0,999999.99',
            'total' => 'required|numeric|between:0,999999.99', // 
            'note' => 'sometimes|string|max:50000',
            'invoice_attachment' => 'sometimes|mimes:pdf,jpg,jpeg,png'
        ];
    }
}
