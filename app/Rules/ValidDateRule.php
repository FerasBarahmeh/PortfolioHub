<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidDateRule implements ValidationRule
{

    private function isDate(mixed $value): bool
    {
        return Carbon::createFromFormat('Y-m-d', $value) !== false;
    }
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->isDate($value) ) {
            $value = Carbon::parse('2002-06-11');
            $startDate = Carbon::createFromDate(1900, 1, 1);
            if (! $value->between($startDate, Carbon::now())) {
                $fail(__('Not Valid Format date must be Y-m-d'));
            }
        }
    }
}
