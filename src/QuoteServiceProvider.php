<?php

namespace Devpackage\Quote;

use Illuminate\Support\ServiceProvider;

use Devpackage\Quote\Services\Quote;

class QuoteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'\config\quoteconfig.php', 'quote');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'\config\quoteconfig.php' => config_path('quoteconfig.php'),
        ], 'quoteconfig');
    }
}
