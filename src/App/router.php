<?php

namespace App;

use App\Exceptions\rutaNoEncontradaException;

class router
{
    private array $rutas;


    public function guardarRutas(string $metodo, string $ruta, callable|array $accion):self{
        $this->rutas[$metodo][$ruta]=$accion;
        return $this;
    }

    public function resolverRuta($ruta, $metodo){

        $rutaFiltrada = parse_url($ruta, PHP_URL_PATH);
        //echo  '<br>' .$rutaFiltrada.'</br>';
        $arrayRuta = explode('/', $rutaFiltrada);

        $parametros = null;

        if (count($arrayRuta)>3){
            $parametros = $arrayRuta[3];
            $rutaFiltrada ='/' .$arrayRuta[1].'/'.$arrayRuta[2];
            //echo $rutaFiltrada .' Param:' .$parametros .'</br>';
        }


        $metodo=strtolower($metodo);
        $accion = $this->rutas[$metodo ][$rutaFiltrada] ?? null;

        if (!$accion){
            throw new rutaNoEncontradaException("Ruta no disponible");
        }else{
            if (is_callable($accion)){
                return call_user_func($accion);
            }
           if (is_array($accion)){
               [$clase, $metodo] = $accion;
               if (class_exists($clase)){
                   $clase = new $clase;
                   if (method_exists($clase,$metodo)){
                       return call_user_func_array([$clase, $metodo], [$parametros]);
                   }
               }
           }
           throw new rutaNoEncontradaException("Parametro invalido");
        }




        return call_user_func($accion);
    }





}