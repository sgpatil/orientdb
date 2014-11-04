<?php

namespace Sgpatil\Orientdb;

use Sgpatil\Orientdb\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class OrientdbServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        Model::setConnectionResolver($this->app['db']);
        Model::setEventDispatcher($this->app['events']);
        $this->package('sgpatil/orientdb');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app['db']->extend('orientdb', function($config) {
            return new Connection($config);
        });

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Orientdb', 'Sgpatil\Orientdb\Eloquent\Model');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

}
