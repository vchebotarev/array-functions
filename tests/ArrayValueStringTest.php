<?php

declare(strict_types=1);

namespace Chebur\ArrayFunctions\Test;

use ArgumentCountError;
use ArrayObject;
use DateTime;
use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use Throwable;

class ArrayValueStringTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $this->assertEquals('123', array_value_string(2, [1, 2, '123']));
    }

    /**
     * @test
     */
    public function testDefault()
    {
        $dateProvider = [
            [],
            [1, 2, null],
            [1, 2, true],
            //[1, 2, '123'],
            [1, 2, 123],
            [1, 2, 123.123],
            [1, 2, new DateTime()],
            [1, 2, new ArrayObject([1, 2, 3])],
            [1, 2, [123]]
        ];

        foreach ($dateProvider as $testCase) {
            $this->assertEquals(null, array_value_string(2, $testCase));
            $this->assertEquals('123', array_value_string(2, $testCase, '123'));
        }
    }

    /**
     * @test
     */
    public function testArgumentCount(): void
    {
        $reflectionFunction = new ReflectionFunction('array_value_string');
        $this->assertEquals(3, $reflectionFunction->getNumberOfParameters());

        try {
            array_value_string();
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
        try {
            array_value_string(1);
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
    }
}
