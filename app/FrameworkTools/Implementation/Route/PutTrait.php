<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\UpdateDataController;

trait PutTrait {
    public static function put(){
        switch(self::$processServerElements->getRoute()){
            case '/update-data':
                return (new UpdateDataController)->exec();
            break;
        }
    }
}