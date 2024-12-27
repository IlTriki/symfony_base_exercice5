<?php

namespace App\Tests\Exercises;

use App\TestExercises\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testSum(): void
    {
        $this->assertEquals(3, $this->calculator->sum(1, 2));
    }
}
