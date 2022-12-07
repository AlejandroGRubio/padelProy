<?php

namespace App;



class Pistas
{
    private int $idPistas;
    private float $precio;
    private boolean $luz;
    private float $precioLuz;
    private tipoPartido $tipoPista;
    private boolean $cubierta;
    private boolean $disponible;
    private array $reservasPistasMensuales;

    /**
     * @param int $idPistas
     * @param float $precio
     * @param bool $luz
     * @param float $precioLuz
     * @param tipoPartido $tipoPista
     * @param bool $cubierta
     * @param bool $disponible
     * @param array $reservasPistasMensuales
     */
    public function __construct(
        int $idPistas,
        float $precio,
        bool $luz,
        float $precioLuz,
        tipoPartido $tipoPista,
        bool $cubierta,
        bool $disponible,
        array $reservasPistasMensuales = []
    ) {
        $this->idPistas = $idPistas;
        $this->precio = $precio;
        $this->luz = $luz;
        $this->precioLuz = $precioLuz;
        $this->tipoPista = $tipoPista;
        $this->cubierta = $cubierta;
        $this->disponible = $disponible;
        $this->reservasPistasMensuales = $reservasPistasMensuales;
    }

    /**
     * @return int
     */
    public function getIdPistas(): int
    {
        return $this->idPistas;
    }

    /**
     * @param int $idPistas
     */
    public function setIdPistas(int $idPistas): void
    {
        $this->idPistas = $idPistas;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return bool
     */
    public function isLuz(): bool
    {
        return $this->luz;
    }

    /**
     * @param bool $luz
     */
    public function setLuz(bool $luz): void
    {
        $this->luz = $luz;
    }

    /**
     * @return float
     */
    public function getPrecioLuz(): float
    {
        return $this->precioLuz;
    }

    /**
     * @param float $precioLuz
     */
    public function setPrecioLuz(float $precioLuz): void
    {
        $this->precioLuz = $precioLuz;
    }

    /**
     * @return tipoPartido
     */
    public function getTipoPista(): tipoPartido
    {
        return $this->tipoPista;
    }

    /**
     * @param tipoPartido $tipoPista
     */
    public function setTipoPista(tipoPartido $tipoPista): void
    {
        $this->tipoPista = $tipoPista;
    }

    /**
     * @return bool
     */
    public function isCubierta(): bool
    {
        return $this->cubierta;
    }

    /**
     * @param bool $cubierta
     */
    public function setCubierta(bool $cubierta): void
    {
        $this->cubierta = $cubierta;
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
     * @return array
     */
    public function getReservasPistasMensuales(): array
    {
        return $this->reservasPistasMensuales;
    }

    /**
     * @param array $reservasPistasMensuales
     */
    public function setReservasPistasMensuales(array $reservasPistasMensuales): void
    {
        $this->reservasPistasMensuales = $reservasPistasMensuales;
    }






}