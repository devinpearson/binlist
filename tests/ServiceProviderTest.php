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

    public function testSwapShopFactoryIsInjectable()
    {
        $this->assertIsInjectable(SwapShopFactory::class);
    }

    public function testSwapShopManagerIsInjectable()
    {
        $this->assertIsInjectable(SwapShopManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(SwapShopInterface::class);

        $original = $this->app['swapshop.connection'];
        $this->app['swapshop']->reconnect();
        $new = $this->app['swapshop.connection'];

        $this->assertNotSame($original, $new);
        $this->assertEquals($original, $new);
    }
}
