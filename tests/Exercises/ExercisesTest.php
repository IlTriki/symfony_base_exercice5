<?php

namespace App\Tests\Exercises;

use App\TestExercises\Exercises;
use PHPUnit\Framework\TestCase;

class ExercisesTest extends TestCase
{
    protected Exercises $exercises;

    protected function setUp(): void
    {
        $this->exercises = new Exercises();
    }

    public function testRacineCarreeException(): void
    {
        $this->expectException('Exception');
        $this->exercises->racineCarree(-2);
    }

    public function testRacineCarreePositive(): void
    {
        $this->assertEquals(3, $this->exercises->racineCarree(9));
    }

    public function testDiviserException(): void
    {
        $this->expectException('Exception');
        $this->exercises->diviser(2, 0);
    }

    public function testDivision(): void
    {
        $this->assertEquals(2, $this->exercises->diviser(4, 2));
    }

    public function testString(): void
    {
        $this->assertEquals('Hello Laurine', $this->exercises->hello('Laurine'));
    }

    public function testEstPair(): void
    {
        $this->assertTrue($this->exercises->estPair(2));
        $this->assertFalse($this->exercises->estPair(3));
    }

    public function testConcatenation(): void
    {
        $this->assertEquals('Helloworld', $this->exercises->concatener('Hello', 'world'));
        $this->assertEquals('world', $this->exercises->concatener('', 'world'));
    }

    public function testExtraireElementsPairs(): void
    {
        $this->assertEquals([2, 4, 6], $this->exercises->extraireElementsPairs([1,2,3,4,5,6]));
    }
}
