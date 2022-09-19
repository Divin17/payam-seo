<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'required', 'unique:languages,name,' . $this->id],
            "code" => ['sometimes', 'string', 'required', 'unique:languages,code,' . $this->id],
            "image" => "sometimes|image|required",
            "status" => "nullable",
        ];
    }
}
