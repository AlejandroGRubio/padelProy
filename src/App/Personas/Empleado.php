<?php

namespace App;

class Empleado extends Persona{

    private string $direccion;
    private string $cuentaCorriente;
    private string $numSeguridadSocial;
    private Horario $horario;
    private float $precioPorHora;
    private boolean $disponible;
    private float $salario;

    /**
     * @param $direccion
     * @param $cuentaCorriente
     * @param $numSeguridadSocial
     */
    public function __construct(string $nombre, string $apellidos, string $dni, string $correo, string $contrasenya, string $telefono=null, string $direccion, string $cuentaCorriente, string $numSeguridadSocial)
    {
        parent::__construct($dni, $nombre, $apellidos, $correo, $contrasenya, $telefono);
        $this->direccion = $direccion;
        $this->cuentaCorriente = $cuentaCorriente;
        $this->numSeguridadSocial = $numSeguridadSocial;
        $this->disponible=true;
    }

    /**
     * @return string
     */
    public function getDireccion(): string
    {
        return $this->direccion;
    }

    /**
     * @param string $direccion
     */
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return string
     */
    public function getCuentaCorriente(): string
    {
        return $this->cuentaCorriente;
    }

    /**
     * @param string $cuentaCorriente
     */
    public function setCuentaCorriente(string $cuentaCorriente): void
    {
        $this->cuentaCorriente = $cuentaCorriente;
    }

    /**
     * @return string
     */
    public function getNumSeguridadSocial(): string
    {
        return $this->numSeguridadSocial;
    }

    /**
     * @param string $numSeguridadSocial
     */
    public function setNumSeguridadSocial(string $numSeguridadSocial): void
    {
        $this->numSeguridadSocial = $numSeguridadSocial;
    }

    /**
     * @return mixed
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param mixed $horario
     */
    public function setHorario($horario): void
    {
        $this->horario = $horario;
    }

    /**
     * @return mixed
     */
    public function getPrecioPorHora()
    {
        return $this->precioPorHora;
    }

    /**
     * @param mixed $precioPorHora
     */
    public function setPrecioPorHora($precioPorHora): void
    {
        $this->precioPorHora = $precioPorHora;
    }

    /**
     * @return bool
     */
    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    /**
     * @param bool $disponible
     */
    public function setDisponible(bool $disponible): void
    {
        $this->disponible = $disponible;
    }

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }


    public function calcularSalario():float{

        $this->salario=1*$this->precioPorHora;
        return $this->salario;

    }




}