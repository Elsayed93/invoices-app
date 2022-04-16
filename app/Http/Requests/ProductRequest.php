<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        return $this->isMethod('post') ? $this->storeRequest() : $this->updateRequest();
    }

    private function storeRequest()
    {
        return [
            'name' =>  [
                'required',
                'max:190',
                Rule::unique('products')->where('section_id', $this->section_id)
            ],
            'description' => 'sometimes|max:5000',
            'section_id' => 'required|exists:sections,id',
        ];
    }

    private function updateRequest()
    {
        dd($this->product->id);
        return [
            'name' =>  [
                'required',
                'max:190',
                Rule::unique('products')->ignore($this->product->id)
                    ->where('section_id', $this->section_id)
            ],
            'description' => 'sometimes|max:5000',
            'section_id' => 'required|exists:sections,id',
        ];
    }
}
