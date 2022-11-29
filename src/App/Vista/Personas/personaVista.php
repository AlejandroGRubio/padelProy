<?php

namespace App\Vista\Personas;

use App\Vista\plantilla\Plantilla;

class personaVista
{


    private Plantilla $html;

    public function __construct(){
        $html = new Plantilla("Datos Personales");
    }

    public function imprimirDatosPersona(Persona $persona):string{
        $salida =$this->html->generarTodaLaPagina();
        return $salida;
    }

    /**
     * @return Plantilla
     */
    public function getHtml(): Plantilla
    {
        return $this->html;
    }

    /**
     * @param Plantilla $html
     */
    public function setHtml(Plantilla $html): void
    {
        $this->html = $html;
    }


    public function __toString():string{

    }



}