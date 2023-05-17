<?php

namespace App\Http\Requests;

use App\Models\SubscribePlan;
use Illuminate\Foundation\Http\FormRequest;

class SubscribePlanRequest extends FormRequest
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
            // 'unique:' . SubscribePlan::class
            'price' => ['required', 'numeric'],
            'description' => ['required',],
            'validity' => ['required',],
            'is_active' => ['required',]
        ];
    }
}
