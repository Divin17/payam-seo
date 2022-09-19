<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryProviderServiceRequest extends FormRequest
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
            "provider_id" => "sometimes|integer|required",
            "icon" => "sometimes|required",
            "name" => "sometimes|string|required",
            "description" => "sometimes|string|required",
            "status" => "string|nullable",
            "caption" => "string|nullable",
            "caption_image" => "image|nullable",
            "setup_steps" => "string|nullable",
            "setup_caption" => "string|nullable",
            "usertypes" => "string|nullable",
            "metatags" => "string|nullable",
        ];
    }
}
