<?php

namespace App;

class Pista
{

    private Pareja $pareja1;
    private Pareja $pareja2;
    private Pista $pista;
    private Intervalo $intervalo;

    /**
     * @param Pareja $pareja1
     * @param Pareja $pareja2
     * @param Pista $pista
     * @param Intervalo $intervalo
     */
    public function __construct(Pareja $pareja1, Pareja $pareja2, Pista $pista, Intervalo $intervalo)
    {
        $this->pareja1 = $pareja1;
        $this->pareja2 = $pareja2;
        $this->pista = $pista;
        $this->intervalo = $intervalo;
    }


    /**
     * @return Pareja
     */
    public function getPareja1(): Pareja
    {
        return $this->pareja1;
    }

    /**
     * @param Pareja $pareja1
     */
    public function setPareja1(Pareja $pareja1): void
    {
        $this->pareja1 = $pareja1;
    }

    /**
     * @return Pareja
     */
    public function getPareja2(): Pareja
    {
        return $this->pareja2;
    }

    /**
     * @param Pareja $pareja2
     */
    public function setPareja2(Pareja $pareja2): void
    {
        $this->pareja2 = $pareja2;
    }

    /**
     * @return Pista
     */
    public function getPista(): Pista
    {
        return $this->pista;
    }

    /**
     * @param Pista $pista
     */
    public function setPista(Pista $pista): void
    {
        $this->pista = $pista;
    }

    /**
     * @return Intervalo
     */
    public function getIntervalo(): Intervalo
    {
        return $this->intervalo;
    }

    /**
     * @param Intervalo $intervalo
     */
    public function setIntervalo(Intervalo $intervalo): void
    {
        $this->intervalo = $intervalo;
    }



    public function generarPartida():?Partida{
        /*
         * TODO funcion para generar partida
         */

        return $this;
    }






}