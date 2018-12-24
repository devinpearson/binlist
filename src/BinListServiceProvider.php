<?php

namespace DevinPearson\BinList;

use Illuminate\Support\ServiceProvider;

/**
 * This is the BinList service provider class.
 */
class BinListServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerBindings(): void
    {
        $this->app->singleton(
            'binlist', function () {
                return new BinList();
            }
        );

        $this->app->alias('binlist', BinList::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'binlist',
        ];
    }
}
