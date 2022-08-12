<?php 

namespace Bootstrap;

class Env{

    public static function execute(){
        $contentOfEnvFile = file_get_contents(__DIR__ . "\..\.env");
        $arrayEnv = explode("\n",$contentOfEnvFile);

        foreach($arrayEnv as $value){
            $keyAndValue = explode ("=", $value);

            if(!isset($keyAndValue[1])){//isset verifica se existe ! nega
                continue;
            }
            $nameOfVariable = $keyAndValue[0];
            $valueOfVariable = $keyAndValue[1];

            $_ENV[$nameOfVariable] = $valueOfVariable;

        }
    }
}