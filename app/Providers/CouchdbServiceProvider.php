<?php

namespace App\Providers;
use App\Couchdb\Couchdb;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CouchdbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
		  $this->app->bind('couchdb',function(){
			return new Couchdb();

        });
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
