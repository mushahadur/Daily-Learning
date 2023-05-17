<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name' => ['required', 'max:250'],
            'price' => ['required', 'numeric'],
            'initial_quantity' => ['required', 'numeric'],
            'increment_decrement_quantity' => ['required', 'numeric'],
            'description' => ['required',],
            'is_active' => ['required',]
        ];
    }
}
