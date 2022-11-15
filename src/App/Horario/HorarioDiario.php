<?php

namespace App\Horario;

use App\Horario\Excepciones\HoraNoValidaException;
use App\Intervalo;

class HorarioDiario
{

    private \DateTime $fecha;
    private float $hora_apertura;
    private float $hora_cierre;
    private int $duracionIntervalos;
    private Intervalo $intervalosDelDia;

    /**
     * @param \DateTime $fecha
     * @param float $hora_apertura
     * @param float $hora_cierre
     * @param int $duracionIntervalos
     */
    public function __construct(\DateTime $fecha, float $hora_apertura, float $hora_cierre, int $duracionIntervalos)
    {
        $this->fecha = $fecha;
        if ($hora_apertura < 0 || $hora_apertura > 23){
            throw new HoraNoValidaException("Hora de apertura no valida.");
        }
        if ($hora_cierre < 0 || $hora_cierre > 23){
            throw new HoraNoValidaException("Hora de cierre no valida.");
        }
        if ($hora_apertura >= $hora_cierre){
            throw new HoraNoValidaException("Hora de apertura mayor que la de cierre.");
        }
        if (Intervalo::calcularFinIntervalo($hora_apertura, $duracionIntervalos) > $hora_cierre){
            throw new HoraNoValidaException("Imposible crear un intervalo.");
        }
        if ($hora_apertura-intval($hora_apertura)>0.59){
            throw new HoraNoValidaException("Parte fraccionaria de la hora de apertura no valida.");
        }
        if ($hora_cierre-intval($hora_cierre)>0.59){
            throw new HoraNoValidaException("Parte fraccionaria de la hora de cierre no valida.");
        }



        $this->hora_apertura = $hora_apertura;
        $this->hora_cierre = $hora_cierre;
        $this->duracionIntervalos = $duracionIntervalos;
        $intervalosDelDia = [];
    }

    /**
     * @return \DateTime
     */
    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha(\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return float
     */
    public function getHoraApertura(): float
    {
        return $this->hora_apertura;
    }

    /**
     * @param float $hora_apertura
     */
    public function setHoraApertura(float $hora_apertura): void
    {
        $this->hora_apertura = $hora_apertura;
    }

    /**
     * @return float
     */
    public function getHoraCierre(): float
    {
        return $this->hora_cierre;
    }

    /**
     * @param float $hora_cierre
     */
    public function setHoraCierre(float $hora_cierre): void
    {
        $this->hora_cierre = $hora_cierre;
    }

    /**
     * @return int
     */
    public function getDuracionIntervalos(): int
    {
        return $this->duracionIntervalos;
    }

    /**
     * @param int $duracionIntervalos
     */
    public function setDuracionIntervalos(int $duracionIntervalos): void
    {
        $this->duracionIntervalos = $duracionIntervalos;
    }


    public function generarIntervalo():?HorarioDiario{






    return "";
    }

    public function imprimirHorarioDiario():string{







        return "";
    }


}