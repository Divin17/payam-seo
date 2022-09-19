<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NetworkRequest extends FormRequest
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
            "name" => "sometimes|required|unique:networks,name," . $this->id,
            "image" => "sometimes|required",
            "caption" => "string|nullable",
            "caption_image" => "image|nullable",
            "status" => "nullable",
            "setup_caption" => "string|nullable",
            "setup_steps" => "string|nullable",
            "metatags" => "string|nullable",
        ];
    }
}
