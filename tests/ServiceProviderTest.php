<?php

namespace DevinPearson\Tests\BinList;

use DevinPearson\BinList\BinList;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

/**
 * This is the service provider test class.
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testBindings()
    {
        $this->assertIsInjectable(BinList::class);
    }
}
