<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CampaignExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $service_order;
    public $landingPage;

    public function __construct($landingPage, $service_order)
    {
        $this->service_order = $service_order;
        $this->landingPage = $landingPage;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strcmp($this->landingPage, $this->service_order->campaign->name)) {
            $fail('Invalid landing Page: ' . $this->service_order->campaign->name);
        }
    }
}
