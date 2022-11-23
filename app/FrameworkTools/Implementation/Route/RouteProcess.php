<?php

namespace App\FrameworkTools\Implementation\Route;

use App\FrameworkTools\ProcessServerElements;

use App\FrameworkTools\Implementation\Route\GetTrait;

use App\FrameworkTools\Implementation\Route\PostTrait;

use App\FrameworkTools\Implementation\Route\PutTrait;

use App\FrameworkTools\Implementation\Route\DeleteTrait;

class RouteProcess{

    use GetTrait;
    use PostTrait;
    use PutTrait;
    use DeleteTrait;

    private static $processServerElements;// classe estatica nao cria objetos dela

    public static function execute(){
        self::$processServerElements = ProcessServerElements::start();
        $routeArray =[];

        switch(self::$processServerElements->getVerb()){/*self vc faz uma referencia a propria classe de maneira estática, acessar funcoes estaticas*/
            case'GET':
                return self::get();                
            case 'POST':
                return self::post();
            case 'PUT':
                return self::put();
            case 'DELETE':
                return self::delete();
        }
    }

}