<?php

declare(strict_types=1);

namespace MarcoConsiglio\PHPrimesGenerator\Iterator;

use CallbackFilterIterator;
use Iterator;

/**
 * A custom filter for an iterator.
 * 
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
final class CustomCallbackFilterIterator extends CallbackFilterIterator
{
    private int $prime;

    public function __construct(Iterator $iterator, callable $callback, int $prime)
    {
        parent::__construct($iterator, $callback);

        $this->prime = $prime;
    }

    public function accept(): bool
    {
        return ($this->current() < $this->prime ** 2) || parent::accept();
    }
}
