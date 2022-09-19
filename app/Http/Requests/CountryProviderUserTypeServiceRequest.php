<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryProviderUserTypeServiceRequest extends FormRequest
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
            "country_id" => "integer",
            "provider_id" => "integer",
            "usertype_id" => "integer",
            "icon" => "sometimes|required",
            "name" => "sometimes|string|required",
            "description" => "sometimes|string|required",
            "status" => "string|nullable",
            "caption" => "string|nullable",
            "caption_image" => "image|nullable",
            "setup_caption" => "string|nullable",
            "setup_steps" => "string|nullable",
            "metatags" => "string|nullable",
        ];
    }
}
