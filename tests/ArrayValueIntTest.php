<?php

declare(strict_types=1);

namespace Chebur\ArrayFunctions\Test;

use ArgumentCountError;
use ArrayObject;
use DateTime;
use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use Throwable;

class ArrayValueIntTest extends TestCase
{
    /**
     * @test
     */
    public function test(): void
    {
        $this->assertEquals(123, array_value_int(2, [1, 2, 123]));
    }

    /**
     * @test
     */
    public function testDefault(): void
    {
        $dateProvider = [
            [],
            [1, 2, null],
            [1, 2, true],
            [1, 2, '123'],
            //[1, 2, 123],
            [1, 2, 123.123],
            [1, 2, new DateTime()],
            [1, 2, new ArrayObject([1, 2, 3])],
            [1, 2, [123]],
        ];

        foreach ($dateProvider as $testCase) {
            $this->assertEquals(null, array_value_int(2, $testCase));
            $this->assertEquals(123, array_value_int(2, $testCase, 123));
        }
    }

    /**
     * @test
     */
    public function testArgumentCount(): void
    {
        $reflectionFunction = new ReflectionFunction('array_value_int');
        $this->assertEquals(3, $reflectionFunction->getNumberOfParameters());

        try {
            array_value_int();
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
        try {
            array_value_int(1);
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
    }
}
