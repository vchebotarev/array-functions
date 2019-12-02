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

class ArrayMapKeyTest extends TestCase
{
    /**
     * @test
     */
    public function test(): void
    {
        $cases = [
            [[], []],
            [['13' => '3', '24' => '4'], ['1' => '3', '2' => '4']],
        ];

        foreach ($cases as $case) {
            $this->assertEquals($case[0], array_map_key(function ($k, $v) {
                return $k.$v;
            }, $case[1]));
        }
    }

    /**
     * @test
     */
    public function testArgumentCount(): void
    {
        $reflectionFunction = new ReflectionFunction('array_map_key');
        $this->assertEquals(2, $reflectionFunction->getNumberOfParameters());

        //test no defaults
        try {
            array_map_key();
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
        try {
            array_map_key(function(){});
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
    }

    /**
     * @test
     */
    public function testArgumentsTypes(): void
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

        foreach ($dateProvider as $argumentSecond) {
            try {
                array_map_key(function(){}, $argumentSecond);
            } catch (Throwable $e) {
                $this->assertInstanceOf(TypeError::class, $e);
            }
        }

        $dateProvider[] = [1, 2, 3];

        foreach ($dateProvider as $argumentFirst) {
            try {
                array_map_key($argumentFirst, [1, 2, 3]);
            } catch (Throwable $e) {
                $this->assertInstanceOf(TypeError::class, $e);
            }
        }
    }
}
