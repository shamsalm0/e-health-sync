<?php

namespace App\Traits;

use DateTime;

trait AgeCalculator
{
    public function calculateYear($dob): array
    {
        $birthDate = new DateTime($dob);
        $today = new DateTime;

        $age = $today->diff($birthDate);

        return [
            'years' => $age->y,
            'months' => $age->m,
            'days' => $age->d,
        ];
    }
}
