<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\HelloWorldController;
use App\Controllers\TrainQueryController;

trait GetTrait{/*parte de uma classe*/

    public static function get(){
        switch(self::$processServerElements->getRoute()){
            case '/hello-world':
                return (new HelloWorldController)->execute(); 
                break;

            case '/train-query':
                return(new TrainQueryController)->execute();
                break;
        }
    }

}