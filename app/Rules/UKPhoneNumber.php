<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UKPhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^(\+44\s?|0\s?)\d{3}\s?\d{7}$/';
        if (!preg_match($pattern, $value)) {
            $fail('The :attribute format must be: +44 123 1234567');
        }
    }
}
