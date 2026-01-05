<?php
namespace MarcoConsiglio\PHPrimesGenerator\Tests\Feature;

use MarcoConsiglio\PHPrimesGenerator\OptimusPrime;
use MarcoConsiglio\PHPrimesGenerator\Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(OptimusPrime::class)]
class OptimusPrimeTest extends TestCase
{
    public function test_generator(): void
    {
        // Arrange
        $primes = (new OptimusPrime(21))->generate();

        // Act & Assert
        $this->assertIsIterable($primes, "OptimusPrime::generate() method must return an iterable object.");
        $primes->next();
        $this->assertSame(3, $primes->current());
        $primes->next();
        $this->assertSame(5, $primes->current());
        $primes->next();
        $this->assertSame(7, $primes->current());
        $primes->next();
        $this->assertSame(11, $primes->current());
    }
}