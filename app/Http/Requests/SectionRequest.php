<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name' => 'required|max:190|unique:sections,name',
            'description' => 'sometimes|string|max:60000',
        ];
    }

    private function updateRequest()
    {
        // dd($this->section->id);
        return [
            'name' => 'required|max:190|unique:sections,name,' . $this->section->id,
            'description' => 'sometimes|string|max:60000',
        ];
    }
}
