<?php

function dd($input){ //mostra a variavel e mata o código ao invocar ela, da um breakpoint, usa para ir testando a variável
    var_dump($input); //mostra todas as informações do objeto
    die();//break
}

$mainPosition = __DIR__;

require_once("{$mainPosition}\bootstrap\Env.php");//require_once invoca no script. Forma de concatenar de forma inteligente variáveis com strings

$env = new Env();
dd($env);//dump

//dd(__DIR__);//constante mágica->tem a posição absoluta do diretório, que é o que faz referência nos arquivos