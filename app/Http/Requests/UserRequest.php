<?php

namespace App\Http\Requests;

use App\ApplicationTraits\RoleTraits;
use App\Http\Requests\Request;

class UserRequest extends Request
{
    use RoleTraits;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(RoleTraits::access(['administrator'])) {
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
            'first_name' => 'required|max:120',
            'user_type' => 'required|max:120',
            'last_name' => 'required|max:120',
            'password' => 'required|max:150',
            'email' => 'required|max:255|unique:users,email'
        ];
    }
}
