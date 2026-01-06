<?php
namespace MarcoConsiglio\PHPrimesGenerator\Tests\Feature;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use MarcoConsiglio\PHPrimesGenerator\AbstractPrimes;
use MarcoConsiglio\PHPrimesGenerator\Iterator\CustomCallbackFilterIterator;
use MarcoConsiglio\PHPrimesGenerator\Iterator\IntegerListIterator;
use MarcoConsiglio\PHPrimesGenerator\OptimusPrime;
use MarcoConsiglio\PHPrimesGenerator\Primes3;
use MarcoConsiglio\PHPrimesGenerator\Tests\Feature\TestCase;

#[CoversClass(OptimusPrime::class)]
#[UsesClass(AbstractPrimes::class)]
#[UsesClass(IntegerListIterator::class)]
#[UsesClass(Primes3::class)]
#[UsesClass(CustomCallbackFilterIterator::class)]
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

    /**
     * Uncomment this method to easily generate $limit prime numbers
     * in a text file.
     */
    // public function test_record_primes_numbers_to_file(): void
    // {
    //     $this->expectNotToPerformAssertions();
    //     $limit = 5;
    //     $primes = (new OptimusPrime($limit))->generate();
    //     $primes_numbers = [];
    //     $filename = "prime_numbers.txt";
    //     foreach($primes as $number) {
    //         $primes_numbers[] = $number.PHP_EOL;
    //     }
    //     file_put_contents($filename, $primes_numbers);
    // }
}