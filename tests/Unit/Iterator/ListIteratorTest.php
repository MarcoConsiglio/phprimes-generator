<?php
namespace MarcoConsiglio\PHPrimesGenerator\Tests\Unit\Iterator;

use MarcoConsiglio\PHPrimesGenerator\Iterator\ListIterator;
use MarcoConsiglio\PHPrimesGenerator\Tests\Unit\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestDox;
use TypeError;

#[CoversClass(ListIterator::class)]
#[TestDox("The ListIterator")]
class ListIteratorTest extends TestCase
{
    #[TestDox("throws TypeError when tries to go beyond the PHP_INT_MAX 
    value.")]
    public function test_iterator_throws_error(): void
    {
        // Arrange
        $iterator = new ListIterator(PHP_INT_MAX, static fn(int $n): int => $n + 1);

        // Assert
        $this->expectException(TypeError::class);

        // Act
        $iterator->next();
    }
}