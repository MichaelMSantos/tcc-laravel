<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB; // Para usar o DB facade

class UniqueCodigo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $codigoExists = DB::table('camisetas')->where('codigo', $value)->exists() ||
            DB::table('tecidos')->where('codigo', $value)->exists() ||
            DB::table('tintas')->where('codigo', $value)->exists();

        if ($codigoExists) {
            $fail('O código já existe em outro produto.');
        }
    }
}
