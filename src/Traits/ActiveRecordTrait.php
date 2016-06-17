<?php namespace Silo\Traits;

use Silo\Builder\Schema;

/**
 */
trait ActiveRecordTrait
{
    /**
     * @var Schema
     */
    protected static $_query;

    /**
     * @return Schema
     * @throws \Exception
     */
    protected static function query()
    {
        throw new \Exception('unimplemented');
    }

    public function save()
    {
        if (isset(static::$_query)) {
            $q = static::$_query;
        } else {
            $q = static::$_query = static::query();
        }

        return $q::save($this);
    }

    public function remove()
    {
        if (isset(static::$_query)) {
            $q = static::$_query;
        } else {
            $q = static::$_query = static::query();
        }

        return $q::remove($this);
    }
}
