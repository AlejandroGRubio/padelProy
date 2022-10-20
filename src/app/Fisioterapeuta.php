<?php

namespace App;

class Fisioterapeuta extends Empleado{


    private $clienteVIP;

    /**
     * @param $clienteVIP
     */
    public function __construct(string $nombre, string $apellidos, string $dni, string $direccion, string $cuentaCorriente, string $numSeguridadSocial, Jugador $clienteVIP)
    {
        parent::__construct($dni, $nombre, $apellidos, $direccion, $cuentaCorriente, $numSeguridadSocial);
        $this->clienteVIP = $clienteVIP;
    }

    /**
     * @return Jugador
     */
    public function getClienteVIP(): Jugador
    {
        return $this->clienteVIP;
    }

    /**
     * @param Jugador $clienteVIP
     */
    public function setClienteVIP(Jugador $clienteVIP): void
    {
        $this->clienteVIP = $clienteVIP;
    }


}