<?php namespace Silo;

use Traversable;

/**
 */
class HydrateIterator extends \IteratorIterator
{
    /**
     * @var callable
     */
    protected $hydrate;

    public function __construct(Traversable $iterator, callable $hydrate)
    {
        parent::__construct($iterator);

        $this->hydrate = $hydrate;
    }

    public function current()
    {
        return call_user_func($this->hydrate, parent::current(), true);
    }
}
