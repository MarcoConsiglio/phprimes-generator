<?php

declare(strict_types=1);

namespace MarcoConsiglio\PHPrimesGenerator;

use CallbackFilterIterator;
use Generator;
use Iterator;

/**
 * The abstract behaviour of a prime number generator.
 * 
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
abstract class AbstractPrimes
{
    public static function generator(Iterator $init): Generator
    {
        return yield from static::sieve($init);
    }

    protected static function sieve(Iterator $iterator): ?Generator
    {
        yield $primeNumber = $iterator->current();

        $iterator = new CallbackFilterIterator(
            $iterator,
            static fn (int $a): bool => (0 !== ($a % $primeNumber)),
        );

        $iterator->next();

        return $iterator->valid() ?
            yield from self::sieve($iterator) :
            null;
    }
}
