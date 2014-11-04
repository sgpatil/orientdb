<?php namespace Sgpatil\Orientdb;

use Vinelab\NeoEloquent\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class NeoEloquentServiceProvider extends ServiceProvider {

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


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
           
		$this->app['db']->extend('neo4j', function($config)
		{
			return new Connection($config);
		});
 
		$this->app->booting(function(){
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('NeoEloquent', 'Vinelab\NeoEloquent\Eloquent\Model');
		});
	}

}
