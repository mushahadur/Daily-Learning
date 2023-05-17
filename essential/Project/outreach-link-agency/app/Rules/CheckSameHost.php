<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use DOMDocument;

class CheckSameHost implements ValidationRule
{
    public $landing_page;
    public $anchor_text;

    public function __construct($landing_page, $anchor_text)
    {
        $this->landing_page = $landing_page;
        $this->anchor_text = $anchor_text;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dom = new DomDocument();
        $dom->loadHTML($value);
        $output = array();
        $domain = "";
        $text = "";
        foreach ($dom->getElementsByTagName('a') as $item) {
            $output[] = array(
                'str' => $dom->saveHTML($item),
                'href' => $item->getAttribute('href'),
                'anchorText' => $item->nodeValue
            );
            $domain = parse_url($item->getAttribute('href'), PHP_URL_HOST);
            $text = $text . $item->nodeValue;
        }

        $this->landing_page = parse_url($this->landing_page, PHP_URL_HOST);
        if (empty($output)) {
            $fail('No match of Anchor text');
        } else {
            if (count($output) > 1) {
                if (empty($output) || strcmp($text, $this->anchor_text)) {
                    $fail('No match of Anchor text');
                }
            } else {
                if (empty($output) || strcmp($output[0]['anchorText'], $this->anchor_text)) {
                    $fail('No match of Anchor text');
                }
            }

            if (!empty($output) && strcmp($this->landing_page, $domain) != 0) {
                $fail('Landing page/Link URL must have same host');
            }
        }
    }
}
