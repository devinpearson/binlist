<?php

namespace DevinPearson\Tests\BinList;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use DevinPearson\BinList\BinListServiceProvider;

/**
 * This is the abstract test class.
 */
abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return BinListServiceProvider::class;
    }
}
