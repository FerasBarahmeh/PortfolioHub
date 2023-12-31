<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_numeric($value))  $fail(__('The :attribute must be a numeric'));
        if (strlen($value) !== 4)  $fail(__('The :attribute must be a valid four-digit year'));
        if ($value < 1990 || $value > Carbon::now()->year)
            $fail(__('The :attribute must be from 1990 - ' . Carbon::now()->year));

    }
}
