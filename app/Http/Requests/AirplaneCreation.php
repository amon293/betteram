<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AirplaneCreation
 *
 * @package App\Http\Requests
 */
class AirplaneCreation extends FormRequest
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
     * @todo create validation fields
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required',
            'price' => 'integer',
            'capacity' => 'integer'
        ];
    }
}
