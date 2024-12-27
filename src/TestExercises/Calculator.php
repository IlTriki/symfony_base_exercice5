<?php

namespace App\TestExercises;

class Calculator
{
    public function sumWithMax(int $a, int $b, int $max): int
    {
        $result = $a + $b;

        if ($result > $max) {
            throw new \RuntimeException('max limit exceeded');
        }

        return $result;
    }

    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}
