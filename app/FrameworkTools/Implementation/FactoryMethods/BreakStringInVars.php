<?php

namespace App\FrameworkTools\Implementation\FactoryMethods;

trait BreakStringInVars{//Trait para quando tem duas classes usando o mesmo método, é tipo uma função, maneira de não deixar sua classe com muios métodos
    public function breakStringInVars($requestUri){
        $urlAndVars = explode("?", $requestUri);

        if(!isset($urlAndVars[1])){
            return;
        }

        $stringWithVars = $urlAndVars[1];

        $arrayWithVars = explode("&", $stringWithVars);

        $varsOfUrl = array_map(function($element){
            return explode("=",$element);
        },$arrayWithVars);

        DD(VarsOfUrl);//php para funções não é case sensitive
    }
}