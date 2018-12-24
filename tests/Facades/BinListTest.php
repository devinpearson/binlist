<?php

declare(strict_types=1);

namespace DevinPearson\Tests\BinList\Facades;

use DevinPearson\BinList\BinList;
use DevinPearson\BinList\Facades\BinList as BinListFacade;
use DevinPearson\Tests\BinList\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

/**
 * This is the SwapShop facade test class.
 */
class BinListTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'binlist';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return BinListFacade::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return BinList::class;
    }
}
