<?php

namespace App\Providers;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // Solved by increasing StringLength

		$this->app['events']->listen(Authenticated::class, function ($e) {
			view()->share('community_center', $e->user->communityCenter);
		});

		view()->share('community_center', null);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
