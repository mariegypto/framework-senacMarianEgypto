<?php

namespace App\FrameworkTools\Implementation\FactoryMethods;

use App\FrameworkTools\Abstracts\FactoryMethods\AbstractFactoryMethods;
use App\FrameworkTools\ProcessServerElements;

class FactoryProcessServerElement extends AbstractFactoryMethods {
    private $processServerElements;

    public function __construct(){
        $this->processServerElements = ProcessServerElements::start();
    }

    public function operation(){
        $this->processServerElements->setDocumentRoot($_SERVER['DOCUMENT_ROOT']);
        $this->processServerElements->setServerName($_SERVER['SERVER_NAME']);
        //d($_SERVER);variavel magica com todas as informações do meu servidor
        dd($this->processServerElements);
    }
}

//classe que vai fabricar outra classe