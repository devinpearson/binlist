<?php

namespace DevinPearson\Tests\BinList;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use DevinPearson\BinList\BinList;

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
