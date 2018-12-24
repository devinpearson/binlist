<?php

namespace DevinPearson\BinList\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the BinList facade class.
 *
 * @method static array check(string $binNumber) fetches the binlist details.
 */
class BinList extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'binlist';
    }
}
