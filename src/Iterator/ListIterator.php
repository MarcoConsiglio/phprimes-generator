<?php

declare(strict_types=1);

namespace MarcoConsiglio\PHPrimesGenerator\Iterator;

use Iterator;

/**
 * A list iterator to iterate over numbers.
 * 
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class ListIterator implements Iterator
{
    /**
     * The current value the iterator is at.
     * 
     * @var mixed
     */
    protected $current;

    /**
     * The starting value from which the iterator starts.
     * 
     * @var mixed
     */
    protected $start;

    /**
     * The key of the current element.
     *
     * @var integer
     */
    protected int $key;

    /**
     * The callable used to produce the next value to iterate over.
     * 
     * @var callable
     */
    protected $next;

    /**
     * Construct the iterator starting from $start, iterating
     * over the values produced by the $next callable.
     *
     * @param mixed $start
     * @param callable $next
     */
    public function __construct($start, callable $next)
    {
        $this->start = $start;
        $this->next = $next;
        $this->current = $start;
        $this->key = 0;
    }

    /**
     * Return the current element.
     * 
     * @link https://php.net/manual/en/iterator.current.php
     * @return TValue Can return any type.
     */
    public function current(): mixed
    {
        return $this->current;
    }

    /**
     * Return the key of the current element.
     * 
     * @link https://php.net/manual/en/iterator.key.php
     * @return TKey|null TKey on success, or null on failure.
     */
    public function key(): int
    {
        return $this->key;
    }

    /**
     * Move forward to next element.
     * 
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */    
    public function next(): void
    {
        $this->current = ($this->next)($this->current);
        ++$this->key;
    }

    /**
     * Rewind the Iterator to the first element.
     * 
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind(): void
    {
        $this->current = $this->start;
        $this->key = 0;
    }

    /**
     * Checks if current position is valid.
     * 
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then 
     * evaluated. Returns true on success or false on failure.
     */
    public function valid(): bool
    {
        return true;
    }
}
