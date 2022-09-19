<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryProviderUserTypeVpRequest extends FormRequest
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
            'title' => 'sometimes|string|required',
            'provider_id' => 'sometimes|integer|required',
            'usertype_id' => 'sometimes|integer|required',
            'description' => 'sometimes|string|required',
            'image' => 'sometimes|required',
            'status' => 'string',
        ];
    }
}
