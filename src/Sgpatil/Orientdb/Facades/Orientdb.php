<?php namespace Sgpatil\Orientdb\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Orientdb extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'orientdb'; }
 
}
