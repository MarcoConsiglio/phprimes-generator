<?php
namespace MarcoConsiglio\PHPrimesGenerator\Tests\Unit\Iterator;

use MarcoConsiglio\PHPrimesGenerator\Exception\MaximumIntegerIteratorValueReached;
use PHPUnit\Framework\Attributes\CoversClass;
use MarcoConsiglio\PHPrimesGenerator\Iterator\IntegerListIterator;
use MarcoConsiglio\PHPrimesGenerator\Tests\Unit\TestCase;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\UsesClass;

#[CoversClass(IntegerListIterator::class)]
#[UsesClass(MaximumIntegerIteratorValueReached::class)]
#[TestDox("The IntegerListIterator")]
class IntegerListIteratorTest extends TestCase
{
    #[TestDox("throws MaximumIntegerIteratorValueReached exception when tries 
    to go beyond the PHP_INT_MAX value.")]
    public function test_iterator_throws_exception(): void
    {
        // Arrange
        $iterator = new IntegerListIterator(PHP_INT_MAX);

        // Assert & Assert
        $this->expectException(MaximumIntegerIteratorValueReached::class);
        $iterator->next(); // PHP_INT_MAX + 1
    }
}