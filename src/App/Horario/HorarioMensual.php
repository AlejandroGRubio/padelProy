<?php

namespace App\Horario;

class HorarioMensual{

    private $mes;
    private $anyo;
    private $horariosDiarios;

    /**
     * @param $mes
     * @param $anyo
     * @param $horariosDiarios
     */
    public function __construct($mes, $anyo, $horariosDiarios)
    {
        $this->mes = $mes;
        $this->anyo = $anyo;
        $this->horariosDiarios = $horariosDiarios;
    }

    /**
     * @return mixed
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param mixed $mes
     */
    public function setMes($mes): void
    {
        $this->mes = $mes;
    }

    /**
     * @return mixed
     */
    public function getAnyo()
    {
        return $this->anyo;
    }

    /**
     * @param mixed $anyo
     */
    public function setAnyo($anyo): void
    {
        $this->anyo = $anyo;
    }

    /**
     * @return mixed
     */
    public function getHorariosDiarios()
    {
        return $this->horariosDiarios;
    }

    /**
     * @param mixed $horariosDiarios
     */
    public function setHorariosDiarios($horariosDiarios): void
    {
        $this->horariosDiarios = $horariosDiarios;
    }





}