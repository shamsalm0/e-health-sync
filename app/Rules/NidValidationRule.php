<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class NidValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if value has a length of 10, 13, or 17 and is numeric
        if (! preg_match('/^\d{10}$|^\d{13}$|^\d{17}$/', $value)) {
            $fail("The $attribute must be numeric and have a length of 10, 13, or 17 characters.");
        }

        // Check if the value consists of all zeros
        if (preg_match('/^0+$/', $value)) {
            $fail("The $attribute cannot consist of all zeros.");
        }
    }
}
