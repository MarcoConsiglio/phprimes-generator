<?php

declare(strict_types=1);

namespace MarcoConsiglio\PHPrimesGenerator;

use drupol\primes\Iterator\ListIterator;
use drupol\primes\Primes3;
use Iterator;
use LimitIterator;

/**
 * The best performance prime number generator using
 * Primes3 class from author drupol.
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
     */
    public function __construct(?int $limit = null)
    {
        $this->limit = $limit ?? 500;
        $this->list = new ListIterator(2, static fn (int $n): int => $n + 1);
    }

    /**
     * Produce an iterable generator of prime numbers.
     */
    public function generate(): Iterator
    {
        return new LimitIterator(Primes3::generator($this->list), 0, $this->limit);
    }
}
