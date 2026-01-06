<?php
namespace MarcoConsiglio\PHPrimesGenerator\Exception;

use Exception;
use Throwable;

/**
 * The exception thrown when an integer iterator tries to go over the
 * maximum integer storable value specified in PHP_INT_MAX.
 */
class MaximumIntegerIteratorValueReached extends Exception
{
    /**
     * Construct this exception.
     */
    public function __construct()
    {
        return parent::__construct(
            "The iterator cannot go beyond the PHP_INT_MAX value."
        );
    }
}