<?php

declare(strict_types=1);

namespace MarcoConsiglio\PHPrimesGenerator;

use MarcoConsiglio\PHPrimesGenerator\Iterator\CustomCallbackFilterIterator;
use Generator;
use Iterator;

/**
 * A prime numbers generator from author drupol.
 * 
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
final class Primes3 extends AbstractPrimes
{
    protected static function sieve(Iterator $iterator): ?Generator
    {
        yield $primeNumber = $iterator->current();

        $iterator = new CustomCallbackFilterIterator(
            $iterator,
            static fn (int $a): bool => (0 !== ($a % $primeNumber)),
            $primeNumber
        );

        $iterator->next();

        return $iterator->valid() ?
            yield from self::sieve($iterator) :
            null;
    }
}
