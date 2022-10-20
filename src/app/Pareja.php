<?php

namespace App;

class Pareja{

    private $jugador1;
    private $jugador2;

    /**
     * @param $jugador1
     * @param $jugador2
     */
    public function __construct(Jugador $jugador1, Jugador $jugador2)
    {
        $this->jugador1 = $jugador1;
        $this->jugador2 = $jugador2;
    }

    /**
     * @return Jugador
     */
    public function getJugador1(): Jugador
    {
        return $this->jugador1;
    }

    /**
     * @param Jugador $jugador1
     */
    public function setJugador1(Jugador $jugador1): void
    {
        $this->jugador1 = $jugador1;
    }

    /**
     * @return Jugador
     */
    public function getJugador2(): Jugador
    {
        return $this->jugador2;
    }

    /**
     * @param Jugador $jugador2
     */
    public function setJugador2(Jugador $jugador2): void
    {
        $this->jugador2 = $jugador2;
    }

    public function generarPareja():Pareja{

        /*
         * TODO Implementar  funcionalidad para generar pareja
         * basado en el lado en el que juegue, si acepta las partidas
         * la mano preferida y los horarios.
         */

        return $this;
    }

}