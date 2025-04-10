<?php

namespace App\Http\Requests\UtilityInfo;

use App\Http\Requests\Request;
use App\Models\UtilityInfo\Roadline;

class SewerLineRequest extends Request
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
        
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'length' => 'nullable|numeric',
                        'location' => 'nullable|string',
                        'diameter' => 'nullable|numeric',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'length' => 'nullable|numeric',
                        'location' => 'nullable|string',
                        'diameter' => 'nullable|numeric',
                    ];
                }
            default:break;
        }
    }
     public function messages()
    {
        return [
            'name.regex' => __('The name field should contain only contain letters and spaces.'),
            'length.numeric' => __('The Length (m) must be a number.'),
            'location.string' => __('The Location must be a string.'),
            'diameter.numeric' => __('The Diameter must be a number.'),
            ];
    }
}
