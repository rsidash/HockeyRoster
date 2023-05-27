<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => 'required|string|max:50|regex:/^[A-Za-z]+$/u',
            'lastName' => 'required|string|max:50|regex:/^[A-Za-z]+$/u',
            'username' => 'required|string|min:2|max:25|regex:/^[a-z0-9_]+$/u|unique:users,username,NULL,deleted_at',
            'email' => 'required|string|email|unique:users,email,NULL,deleted_at',
            'password' => 'required|string|confirmed|min:8', // regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/u
//            'country' => 'required|string', // should exists: exists:countries
//            'city' => 'required|string', // should exists: exists:cities

            'birthdate' => 'nullable|date',
            'fileToUpload' => 'nullable|mimes:jpg,png,jpeg',
            'hand' => 'nullable|string',
            'jerseyNumber' => 'nullable|string|max:2', // regex
            'height' => 'nullable|digits_between:2,3',
            'weight' => 'nullable|digits_between:2,3',
//            'phone' => 'nullable|string', // regex
        ];
    }
}
