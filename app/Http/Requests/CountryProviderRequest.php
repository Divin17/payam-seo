<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "sometimes|string|required",
            "image" => "sometimes|required",
            'description' => 'sometimes|string|required',
            "caption" => "string|nullable",
            "caption_image" => "image|nullable",
            "setup_caption" => "string|nullable",
            "setup_steps" => "string|nullable",
            "status" => "string|nullable",
            "metatags" => "string|nullable",
        ];
    }
}
