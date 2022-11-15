<?php

namespace App;

class Intervalo{

    private float $hora_ini;
    private float $hora_fin;
    private bool $disponibilidad;
    private Socio $socioReservado;

    /**
     * @param float $hora_ini
     * @param float $hora_fin
     */
    public function __construct(float $hora_ini, float $hora_fin)
    {
        $this->hora_ini = $hora_ini;
        $this->hora_fin = $hora_fin;
        $this->disponibilidad = true;
    }

    /**
     * @return float
     */
    public function getHoraIni(): float
    {
        return $this->hora_ini;
    }

    /**
     * @param float $hora_ini
     */
    public function setHoraIni(float $hora_ini): void
    {
        $this->hora_ini = $hora_ini;
    }

    /**
     * @return float
     */
    public function getHoraFin(): float
    {
        return $this->hora_fin;
    }

    /**
     * @param float $hora_fin
     */
    public function setHoraFin(float $hora_fin): void
    {
        $this->hora_fin = $hora_fin;
    }

    /**
     * @return bool
     */
    public function isDisponibilidad(): bool
    {
        return $this->disponibilidad;
    }

    /**
     * @param bool $disponibilidad
     */
    public function setDisponibilidad(bool $disponibilidad): void
    {
        $this->disponibilidad = $disponibilidad;
    }

    /**
     * @return Socio
     */
    public function getSocioReservado(): Socio
    {
        return $this->socioReservado;
    }

    /**
     * @param Socio $socioReservado
     */
    public function setSocioReservado(Socio $socioReservado): void
    {
        $this->socioReservado = $socioReservado;
    }



    public static function calcularFinIntervalo(float $horaInicioIntervalo, int $duracionIntervalo):float{

         while($duracionIntervalo > 60){
             $horaInicioIntervalo++;
             $duracionIntervalo = $duracionIntervalo - 60;
         }

         $restoF = $duracionIntervalo / 100;
         $horaInicioIntervalo = $horaInicioIntervalo + $restoF;

         return $horaInicioIntervalo;


    }



}