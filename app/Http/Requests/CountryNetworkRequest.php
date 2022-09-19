<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryNetworkRequest extends FormRequest
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
            "name" => "sometimes|string|required",
            "image" => "sometimes|required",
            "caption" => "sometimes|string|nullable",
            "caption_image" => "image|nullable",
            "status" => "string|nullable",
            "setup_caption" => "string|nullable",
            "setup_steps" => "string|nullable",
            "metatags" => "string|nullable",
        ];
    }
}
