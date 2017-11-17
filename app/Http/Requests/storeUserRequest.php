<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class storeUserRequest extends Request
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
            "first_name" => "bail|required|alpha|min:2",
            "last_name" => "bail|required|alpha|min:2",
            "business_role" => "required|alpha|",
            "type" => "bail|required|in:vip,admin,normal,public",
            "email" => "bail|required|unique:users,email",
            "phone" => "bail|required|unique:users,phone",
            "password" => "bail|required|min:6|confirmed",
        ];
    }
}
