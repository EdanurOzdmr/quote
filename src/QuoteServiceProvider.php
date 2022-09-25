<?php

namespace Devpackage\Quote;

use Devpackage\Quote\View\Components\Quotes;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class QuoteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    private const PATH_VIEWS = __DIR__.'/../resources/views';
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

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'quote');
        Blade::component('quotes', Quotes::class);

    }


}
