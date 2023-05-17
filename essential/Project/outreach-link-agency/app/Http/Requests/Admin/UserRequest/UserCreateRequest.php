<?php

namespace App\Http\Requests\Admin\UserRequest;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'numeric'],
            'roles' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2096'],
        ];
    }
}
