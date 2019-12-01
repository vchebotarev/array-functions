<?php

declare(strict_types=1);

namespace Chebur\ArrayFunctions\Test;

use ArgumentCountError;
use ArrayObject;
use DateTime;
use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use Throwable;
use TypeError;

class ArrayValueLastTest extends TestCase
{
    public function getTestCases(): array
    {
        return [
            [null, []],
            [null, [null]],
            [false, [false]],
            ['', ['']],
            [0, [0]],
            [[], [[]]],
            [1, [1]],
            [0, [2, 0]],
            [0, [2, 0, ',', '', [[]], '0', true, 0]],
        ];
    }

    /**
     * @test
     * @dataProvider getTestCases
     */
    public function test($expected, array $array): void
    {
        $this->assertEquals($expected, array_value_last($array));
    }

    /**
     * @test
     */
    public function testArgumentCount(): void
    {
        $reflectionFunction = new ReflectionFunction('array_value_last');
        $this->assertEquals(1, $reflectionFunction->getNumberOfParameters());

        //test no defaults
        try {
            array_value_last();
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
    }
    
    /**
     * @test
     */
    public function testArgumentType(): void
    {
        $dateProvider = [
            null,
            true,
            '123',
            123,
            123.123,
            new DateTime(),
            new ArrayObject([1, 2, 3]),
        ];

        foreach ($dateProvider as $item) {
            try {
                array_value_last($item);
            } catch (Throwable $e) {
                $this->assertInstanceOf(TypeError::class, $e);
            }
        }
    }
}
