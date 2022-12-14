<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\InsertDataController;

trait PostTrait{/*parte de uma classe*/

    public static function post(){
        switch(self::$processServerElements->getRoute()){
            case '/insert-data':
                return (new InsertDataController)->exec();
            break;
        }
    }

}