<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderServiceRequest extends FormRequest
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
            "provider_id" => "string",
            "icon" => "sometimes|required",
            "title" => "sometimes|string|required",
            "description" => "sometimes|string|required",
            "status" => "string",
            "metatags" => "string",
        ];
    }
}
