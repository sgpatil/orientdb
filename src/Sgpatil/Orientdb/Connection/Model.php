<?php
namespace Sgpatil\Orientdb\Connection;
use Illuminate\Database\Eloquent\Model as IlluminateModel;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author sumit
 */
class Model extends IlluminateModel {
    //put your code here
    
    public function __construct(array $attributes = array())
	{
        echo "Model constructor";
		$this->bootIfNotBooted();

		$this->syncOriginal();

		$this->fill($attributes);
	}
        
         public static function greeting(){
    echo "inside model";
  }
        

}
