<?php

namespace App\Http\Requests;

use App\ApplicationTraits\RoleTraits;
use App\Http\Requests\Request;

class LocationsRequest extends Request
{
    use RoleTraits;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(RoleTraits::access(['administrator', 'client'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'location_type' => 'required|max:120',
            'name' => 'required|max:120',
            'address' => 'required|max:120',
            'description' => 'max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255'
        ];
    }
}
