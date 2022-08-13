<?php

$mainPosition = __DIR__;//constante do php que contem a posição do meu repositorio

//require_once("{$mainPosition}\bootstrap\Env.php");//require_once invoca no script. Forma de concatenar de forma inteligente variáveis com strings

//$env = new Env();
//dd($env);//dump

//dd(__DIR__);//constante mágica->tem a posição absoluta do diretório, que é o que faz referência nos arquivos

//dd(__DIR__); //metofd magico a posicao do diretorio,


require_once("{$mainPosition}\helper\helper.php");
require_once("{$mainPosition}\\vendor\autoload.php");


use Bootstrap\Env;
use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementation\FactoryMethods\FactoryProcessServerElement;

Env::execute();//executa o codigo da classe env


$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();
$processServerElements = ProcessServerElements::start();
dd($processServerElements);//para teste, roda e morre