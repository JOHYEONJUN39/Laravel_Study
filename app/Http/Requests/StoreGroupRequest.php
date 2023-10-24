<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
            'id' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email', 'max:50'],
            'gender' => ['required', 'boolean'],
            'age' => ['required'],
        ];
    }
}
