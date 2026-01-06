<?php
namespace MarcoConsiglio\PHPrimesGenerator\Tests\Unit\Exception;

use MarcoConsiglio\PHPrimesGenerator\Exception\MaximumIntegerIteratorValueReached;
use MarcoConsiglio\PHPrimesGenerator\Tests\Unit\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestDox;

#[CoversClass(MaximumIntegerIteratorValueReached::class)]
#[TestDox("The MaximumIntegerIteratorValueReached exception")]
class MaximumIntegerIteratorValueReachedTest extends TestCase
{
    #[TestDox("is thrown when the iterator tries to go beyond PHP_INT_MAX value.")]
    public function test_exception_return_message(): void
    {
        // Arrange
        $exception = new MaximumIntegerIteratorValueReached;

        // Act & Assert
        $this->assertEquals(
            "The iterator cannot go beyond the PHP_INT_MAX value.",
            $exception->getMessage()
        );
    }
}