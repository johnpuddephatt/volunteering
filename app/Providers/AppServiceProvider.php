<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('*', function($view){
        $view_name = str_replace('.', '-', $view->getName());
        view()->share('view_name', $view_name);

        $total_opportunities = \Cache::rememberForever('opportunity_count', function() {
          return \App\Models\Opportunity::active()->count();
        });
        view()->share('total_opportunities', $total_opportunities);
      });
    }
}
