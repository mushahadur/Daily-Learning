<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExploreSiteRequest extends FormRequest
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
            "site_name" => ['required', 'string', 'max:50'],
            "domain" => ['required', 'string', 'max:50'],
            "domain_url" => ['required', 'url'],
            "example_post_url" => ['required', 'url'],
            "moz_domain_authority" => ['required', 'integer'],
            "moz_spam_score" => ['required', 'integer'],
            "ahref_domain_rating" => ['required', 'integer'],
            "ahref_organic_traffic" => ['required', 'integer'],
            "max_no_of_hyperlink" => ['required', 'integer'],
            "explore_publication_type_id" => ['required'],
            // "explore_hyperlink_type_id" => ['required'],
            "language_id" => ['required', 'array'],
            "category_id" => ['required', 'array'],
            "country_id" => ['required', 'array'],
            // "service_type" => ['required', 'array'],
            "about" => ['required']
        ];
    }

    public function messages()
    {
        return [
            'language_id.required' => 'Language is required.',
            'category_id.required' => 'Category is required.',
            'country_id.required' => 'Country is required.',
            'explore_publication_type_id.required' => 'Publication Type is required.',
            'explore_hyperlink_type_id.required' => 'Hyperlinks Type is required.',
            'moz_domain_authority.integer' => 'The moz domain authority field must be a number.',
            'moz_spam_score.integer' => 'The moz spam score field must be a number.',
            'ahref_domain_rating.integer' => 'The ahref domain rating field must be a number.',
            'ahref_organic_traffic.integer' => 'The ahref organic traffic field must be a number.',
            'max_no_of_hyperlink.integer' => 'The max no of hyperlink field must be a number.'
        ];
    }
}
