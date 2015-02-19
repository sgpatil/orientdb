<?php

namespace Sgpatil\Orientdb;

use Sgpatil\Orientdb\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Sgpatil\Orientdb\Connection;
use Sgpatil\Orientdb\Migrations\CreateOrientdbMigration;

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
        
        $this->app->register('Sgpatil\Orientdb\MigrationServiceProvider');

        $this->app['db']->extend('orientdb', function($config) {
            return new Connection($config);
        });

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Orientdb', 'Sgpatil\Orientdb\Eloquent\Model');
        });
        


        $this->app->bind('MigrationRepositoryInterface', function() {
            return new Sgpatil\Orientdb\DatabaseMigrationRepository();
        });
        
        $this->app->bind('ConnectionResolverInterface', function() {
            return new ConnectionResolver();
        });

        $this->app->bind('orientdb.database', function() {
            return new Connection(['host' => 'localhost',
                'port' => 2480,
                'username' => 'root',
                'password' => 'root']);
        });

        $this->app->bind('CreateOrientdbMigration', function($app) {
            //print_r($app);
            $database = $this->app->make('orientdb.database');
            return new CreateOrientdbMigration($database);
        });

        $CreateOrientdbMigration = $this->app->make('CreateOrientdbMigration');

        $this->commands('CreateOrientdbMigration');
        
        
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