<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class HexColor implements ValidationRule
{
    private function setHash(mixed $value): bool|string
    {
        return $value[0] =='#' ? $value : '#'.$value;
    }
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = $this->setHash($value);
        if (! preg_match('/^#[a-fA-F0-9]{6}$/', $value)) {
            $fail('The :attribute must be a valid hex color.');
        }
    }
}
