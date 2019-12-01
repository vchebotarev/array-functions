<?php

declare(strict_types=1);

namespace Chebur\ArrayFunctions\Test;

use ArgumentCountError;
use ArrayObject;
use DateTime;
use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use Throwable;

class ArrayValueFloatTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $this->assertEquals(123.123, array_value_float(2, [1, 2, 123.123]));
        $this->assertEquals(123.0, array_value_float(2, [1, 2, 123]));
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
            [1, 2, '123'],
            //[1, 2, 123],
            //[1, 2, 123.123],
            [1, 2, new DateTime()],
            [1, 2, new ArrayObject([1, 2, 3])],
            [1, 2, [123]]
        ];

        foreach ($dateProvider as $testCase) {
            $this->assertEquals(null, array_value_float(2, $testCase));
            $this->assertEquals(123.123, array_value_float(2, $testCase, 123.123));
            $this->assertEquals(123, array_value_float(2, $testCase, 123.0));
        }
    }

    /**
     * @test
     */
    public function testArgumentCount(): void
    {
        $reflectionFunction = new ReflectionFunction('array_value_float');
        $this->assertEquals(3, $reflectionFunction->getNumberOfParameters());

        try {
            array_value_float();
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
        try {
            array_value_float(1);
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
    }
}
