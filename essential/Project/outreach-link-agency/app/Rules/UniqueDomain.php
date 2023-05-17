<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueDomain implements ValidationRule
{
    public $exploreSite;

    public function __construct($exploreSite)
    {
        $this->exploreSite = $exploreSite;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $campaignCheck = \App\Models\Campaign::where('name', $value)->first();
        if ($campaignCheck) {
            $hasExploreSite = $campaignCheck->exploreSites()->where('explore_site_id', $this->exploreSite)->exists();
            if ($hasExploreSite) {
                $fail('This ' . $value . ' is already exists');
            }
        }
    }
}
