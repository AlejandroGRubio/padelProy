<?php

namespace App;

class Entrenador extends Empleado{

    private int $nivelEntrenador;
    private int $numFederacion;
    private Jugador $pupilo;

    /**
     * @param $nivelEntrenador
     * @param $numFederacion
     */
    public function __construct(string $nombre, string $apellidos, string $dni, string $direccion, string $cuentaCorriente, string $numSeguridadSocial, int $nivelEntrenador, int $numFederacion){


        parent::__construct($dni, $nombre, $apellidos, $direccion, $cuentaCorriente, $numSeguridadSocial);

        $this->nivelEntrenador = $nivelEntrenador;
        $this->numFederacion = $numFederacion;
    }

    /**
     * @return mixed
     */
    public function getNivelEntrenador():int
    {
        return $this->nivelEntrenador;
    }

    /**
     * @param mixed $nivelEntrenador
     */
    public function setNivelEntrenador($nivelEntrenador): void
    {
        $this->nivelEntrenador = $nivelEntrenador;
    }

    /**
     * @return mixed
     */
    public function getNumFederacion():int
    {
        return $this->numFederacion;
    }

    /**
     * @param mixed $numFederacion
     */
    public function setNumFederacion($numFederacion): void
    {
        $this->numFederacion = $numFederacion;
    }

    /**
     * @return mixed
     */
    public function getPupilo():Jugador
    {
        return $this->pupilo;
    }

    /**
     * @param mixed $pupilo
     */
    public function setPupilo(Jugador $pupilo): void
    {
        $this->pupilo = $pupilo;
    }





}