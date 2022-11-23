<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\DeleteController;

trait DeleteTrait{/*parte de uma classe*/

    public static function delete(){
        switch(self::$processServerElements->getRoute()){
            case '/delete_user':
               return (new DeleteController())->exec();
            break;
        }
    }
}