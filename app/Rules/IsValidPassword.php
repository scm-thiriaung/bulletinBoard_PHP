<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class IsValidPassword implements Rule
{
    /**
     * Determine if the Length Validation Rule passes.
     *
     * @var boolean
     */
    public $lengthPasses = true;

    /**
     * Determine if the Uppercase Validation Rule passes.
     *
     * @var boolean
     */
    public $uppercasePasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         $this->lengthPasses = (Str::length($value) >= 8);
        $this->uppercasePasses = (Str::lower($value) !== $value);
        $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));

        return ($this->lengthPasses && $this->uppercasePasses && $this->numericPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case ! $this->uppercasePasses
                && $this->numericPasses:
                return 'The :attribute must be at least 8 characters and contain at least one uppercase character.';

            case ! $this->numericPasses
                && $this->uppercasePasses:
                return 'The :attribute must be at least 8 characters and contain at least one number.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses:
                return 'The :attribute must be at least 8 characters and contain at least one uppercase character and one number.';

            default:
                return 'The :attribute must be at least 8 characters.';
        }
    }
}
