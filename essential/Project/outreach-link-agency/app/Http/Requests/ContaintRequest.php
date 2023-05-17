<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaintRequest extends FormRequest
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
            'topic' =>
            [
                'required',
                function ($attribute, $value, $fail) {
                    if (is_null($value) || in_array(null, $value)) {
                        $fail('The ' . $attribute . ' field is required.');
                    }
                },
            ],
            'anchor_text' =>
            [
                'required',
                function ($attribute, $value, $fail) {
                    if (is_null($value) || in_array(null, $value)) {
                        $fail('The ' . $attribute . ' field is required.');
                    }
                },
            ],
            'landing_page' =>
            [
                'required',
                function ($attribute, $value, $fail) {
                    if (is_null($value) || in_array(null, $value)) {
                        $fail('The ' . $attribute . ' field is required.');
                    }
                },
            ],
        ];
    }
}
