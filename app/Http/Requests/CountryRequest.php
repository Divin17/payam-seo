<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'required', 'unique:countries,name,' . $this->id],
            'flag' => 'sometimes|required',
            'status' => 'nullable',
            'published' => 'nullable',
            'currency' => 'string|nullable',
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'priority' => 'string|nullable',
            'metatags' => 'string|nullable',
        ];
    }
}
