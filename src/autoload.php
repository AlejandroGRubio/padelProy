<?php

spl_autoload_register(function ($class){

    $ruta=$class;
    $ruta.=".php";
    $ruta= str_replace("\\", "/", $ruta);

    include_once($ruta);
    echo $ruta;


});


