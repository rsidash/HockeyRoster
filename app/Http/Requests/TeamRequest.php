<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:25|min:3',
            'description' => 'nullable|string|max:500',
//            'owner_id' => 'required|numeric|exists:users,id',
            'logo_file' => 'nullable|file|image|mimes:jpg,png',
        ];
    }
}
