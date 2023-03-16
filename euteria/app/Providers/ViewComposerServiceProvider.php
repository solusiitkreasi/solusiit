<?php

namespace App\Providers;

use Illuminate\Support\Facades\View as View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(
            ['frontend.partials.header','frontend.partials.footer','frontend.layouts.app','frontend.contact.index','frontend.post.reseller.index','frontend.index.about-us','backend.auth.login','backend.layouts.app','backend.layouts.auth','backend.partials.sidebar'], 'App\Http\ViewComposers\Header'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
