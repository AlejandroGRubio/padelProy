<?php

namespace App;

class Jugador extends Persona{

    private int $nivelJuego;
    private LadoPreferido $manoHabil;
    private LadoPreferido $ladoPreferido;
    private $indiceDeIrresponsabilidad;
    private $numFederacion;
    private $horarioMensualPreferido;
    private $renovacionAutomaticaHorario;
    private $fisioAsociado;
    private $entrenadorPersonal;
    private bool $mixtas;
    private int $socio;

    /**
     * @param $nivelJuego
     * @param $manoHabil
     * @param $ladoPreferido
     * @param $indiceDeIrresponsabilidad
     * @param $numFederacion
     * @param $horarioMensualPreferido
     * @param $renovacionAutomaticaHorario
     * @param $fisioAsociado
     * @param $entrenadorPersonal
     * @param $mixtas
     * @param $socio
     */
    public function __construct(string $dni, string $nombre, string $apellidos,int $nivelJuego, $manoHabil, $ladoPreferido, $indiceDeIrresponsabilidad, $numFederacion, $horarioMensualPreferido, $renovacionAutomaticaHorario, $fisioAsociado, $entrenadorPersonal, $mixtas, $socio)
    {
        parent::__construct($dni, $nombre, $apellidos);

        $this->nivelJuego = $nivelJuego;
        $this->manoHabil = $manoHabil;
        $this->ladoPreferido = $ladoPreferido;
        $this->indiceDeIrresponsabilidad = $indiceDeIrresponsabilidad;
        $this->numFederacion = $numFederacion;
        $this->horarioMensualPreferido = $horarioMensualPreferido;
        $this->renovacionAutomaticaHorario = $renovacionAutomaticaHorario;
        $this->fisioAsociado = $fisioAsociado;
        $this->entrenadorPersonal = $entrenadorPersonal;
        $this->mixtas = $mixtas;
        $this->socio = $socio;
    }

    /**
     * @return int
     */
    public function getNivelJuego(): int
    {
        return $this->nivelJuego;
    }

    /**
     * @param int $nivelJuego
     */
    public function setNivelJuego(int $nivelJuego): void
    {
        $this->nivelJuego = $nivelJuego;
    }

    /**
     * @return mixed
     */
    public function getManoHabil()
    {
        return $this->manoHabil;
    }

    /**
     * @param mixed $manoHabil
     */
    public function setManoHabil($manoHabil): void
    {
        $this->manoHabil = $manoHabil;
    }

    /**
     * @return mixed
     */
    public function getLadoPreferido()
    {
        return $this->ladoPreferido;
    }

    /**
     * @param mixed $ladoPreferido
     */
    public function setLadoPreferido($ladoPreferido): void
    {
        $this->ladoPreferido = $ladoPreferido;
    }

    /**
     * @return mixed
     */
    public function getIndiceDeIrresponsabilidad()
    {
        return $this->indiceDeIrresponsabilidad;
    }

    /**
     * @param mixed $indiceDeIrresponsabilidad
     */
    public function setIndiceDeIrresponsabilidad($indiceDeIrresponsabilidad): void
    {
        $this->indiceDeIrresponsabilidad = $indiceDeIrresponsabilidad;
    }

    /**
     * @return mixed
     */
    public function getNumFederacion()
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
    public function getHorarioMensualPreferido()
    {
        return $this->horarioMensualPreferido;
    }

    /**
     * @param mixed $horarioMensualPreferido
     */
    public function setHorarioMensualPreferido($horarioMensualPreferido): void
    {
        $this->horarioMensualPreferido = $horarioMensualPreferido;
    }

    /**
     * @return mixed
     */
    public function getRenovacionAutomaticaHorario()
    {
        return $this->renovacionAutomaticaHorario;
    }

    /**
     * @param mixed $renovacionAutomaticaHorario
     */
    public function setRenovacionAutomaticaHorario($renovacionAutomaticaHorario): void
    {
        $this->renovacionAutomaticaHorario = $renovacionAutomaticaHorario;
    }

    /**
     * @return mixed
     */
    public function getFisioAsociado()
    {
        return $this->fisioAsociado;
    }

    /**
     * @param mixed $fisioAsociado
     */
    public function setFisioAsociado($fisioAsociado): void
    {
        $this->fisioAsociado = $fisioAsociado;
    }

    /**
     * @return mixed
     */
    public function getEntrenadorPersonal()
    {
        return $this->entrenadorPersonal;
    }

    /**
     * @param mixed $entrenadorPersonal
     */
    public function setEntrenadorPersonal($entrenadorPersonal): void
    {
        $this->entrenadorPersonal = $entrenadorPersonal;
    }

    /**
     * @return mixed
     */
    public function getMixtas()
    {
        return $this->mixtas;
    }

    /**
     * @param mixed $mixtas
     */
    public function setMixtas($mixtas): void
    {
        $this->mixtas = $mixtas;
    }

    /**
     * @return mixed
     */
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * @param mixed $socio
     */
    public function setSocio($socio): void
    {
        $this->socio = $socio;
    }






}