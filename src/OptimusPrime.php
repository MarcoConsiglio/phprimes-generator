<?php

declare(strict_types=1);

namespace MarcoConsiglio\PHPrimesGenerator;

use Iterator;
use LimitIterator;
use MarcoConsiglio\PHPrimesGenerator\Iterator\ListIterator;
use MarcoConsiglio\PHPrimesGenerator\Primes3;

/**
 * The best performance prime number generator using
 * Primes3 class from author Pol Dellaiera.
 * 
 * @author Marco Consiglio <mrccnsgl@gmail.com>
 */
class OptimusPrime
{
    /**
     * The limit of the series of prime numbers.
     */
    protected int $limit;

    /**
     * The iterator responsible for traversing the series of prime numbers.
     */
    protected ListIterator $list;

    /**
     * Construct the prime number generator.
     *
     * @param int|null $limit The limit of the series of prime
     * numbers. If null, defaults to 500.
     * @param ListIterator|null The iterator used to generate integer numbers.
     * Default value starts at number 2 because the number 1 is obviously a 
     * prime number.
     */
    public function __construct(?int $limit = null, ListIterator|null $iterator = null)
    {
        $this->limit = $limit ?? 500;
        $this->list = $iterator ?? new ListIterator(2, static fn (int $n): int => $n + 1);
    }

    /**
     * Produce an iterable generator of prime numbers.
     */
    public function generate(): Iterator
    {
        return new LimitIterator(Primes3::generator($this->list), 0, $this->limit);
    }
}
