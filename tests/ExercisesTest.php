<?php

namespace Tests;

use App\TestExercises\Exercises;
use PHPUnit\Framework\TestCase;
use RuntimeException;
class ExercisesTest extends TestCase
{
    public function testRacineCarreeException()
    {
        $exercises = new Exercises();
        $this->expectException(RuntimeException::class);
        $exercises->racineCarree(-1);
    }

    public function testRacineCarreePositive()
    {
        $exercises = new Exercises();
        $this->assertEquals(2, $exercises->racineCarree(4));
    }

    public function testDiviserException()
    {
        $exercises = new Exercises();
        $this->expectException(RuntimeException::class);
        $exercises->diviser(1, 0);
    }

    public function testDiviser()
    {
        $exercises = new Exercises();
        $this->assertEquals(2, $exercises->diviser(4, 2));
    }

    public function testString()
    {
        $exercises = new Exercises();
        $this->assertEquals("Hello CACA", $exercises->hello("CACA"));
    }

    public function testEstPair()
    {
        $exercises = new Exercises();
        $this->assertEquals(true, $exercises->estPair(2));
    }

    public function testConcatenation()
    {
        $exercises = new Exercises();
        $this->assertEquals("Hello CACA", $exercises->concatener("Hello ", "CACA"));
    }

    public function testExtraireElementsPairs()
    {
        $exercises = new Exercises();
        $this->assertEquals([2, 4], $exercises->extraireElementsPairs([1, 2, 3, 4]));
    }
}
