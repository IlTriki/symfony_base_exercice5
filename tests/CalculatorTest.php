<?php

namespace Tests;

use App\TestExercises\Calculator;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class CalculatorTest extends TestCase
{
    public function testSum()
    {
        $calculator = new Calculator();
        $this->assertEquals(3, $calculator->sum(1, 2));
    }

    public function testSumWithMax()
    {
        $calculator = new Calculator();
        $this->expectException(RuntimeException::class);
        $calculator->sumWithMax(2, 2, 3);
    }

}