<?php

declare(strict_types=1);

namespace Chebur\ArrayFunctions\Test;

use ArgumentCountError;
use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use Throwable;

class ArrayValueTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $this->assertEquals('123', array_value(2, [1, 2, '123']));
    }

    /**
     * @test
     */
    public function testDefault()
    {
        $this->assertEquals(null, array_value(2, []));
        $this->assertEquals('4', array_value(2, [], '4'));
    }

    /**
     * @test
     */
    public function testArgumentCount(): void
    {
        $reflectionFunction = new ReflectionFunction('array_value');
        $this->assertEquals(3, $reflectionFunction->getNumberOfParameters());

        try {
            array_value();
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
        try {
            array_value(1);
        } catch (Throwable $e) {
            $this->assertInstanceOf(ArgumentCountError::class, $e);
        }
    }
}
