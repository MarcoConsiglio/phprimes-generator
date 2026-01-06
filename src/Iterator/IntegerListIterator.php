<?php
namespace MarcoConsiglio\PHPrimesGenerator\Iterator;

use MarcoConsiglio\PHPrimesGenerator\Exception\MaximumIntegerIteratorValueReached;

final class IntegerListIterator extends ListIterator
{
    /**
     * Construct the iterator starting from $start, iterating
     * over integer values.
     *
     * @param mixed $start
     */
    public function __construct($start)
    {
        parent::__construct($start, $this->getIntegerSafeCallable());
    }

    /**
     * Return a safe callable to iterate over integer numbers.
     *
     * @return callable
     * @throws MaximumIntegerIteratorValueReached if the iterator attempts to 
     * go beyond PHP_INT_MAX.
     */
    protected function getIntegerSafeCallable(): callable
    {
        return static function(int $n): int {
            if (is_float($n + 1)) throw new MaximumIntegerIteratorValueReached;
            return $n + 1;
        };
    }
}