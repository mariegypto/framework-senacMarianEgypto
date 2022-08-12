<?php 

namespace App\FrameworkTools;

class ProcessServerElements {

    private static $instance;

    private function __construct(){//construtor privado pois nao quero dar new nele em outro lugar
        //SINGLETON: utilizando classe mantem o acesso a essa classe de maneira global, querendo acessar os objetos de diferentes ponto do sistema

    }

    public static function start(){
        if(!ProcessServerElements::$instance){//se instância é null segue usando o mesmo 
        //objeto criado na primeira vez depois do primeiro start, já que não vai 
        //cair mais na condição de ser nulo, então vai só retornar o objeto 
        //criado anteriormente{
            ProcessServerElements::$instance = new ProcessServerElements();//instance é o objeto, dois pontos representa estar acessando um aatributo estático
        }

        return ProcessServerElements::$instance;
    }
}