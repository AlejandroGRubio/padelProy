<?php

namespace App\Personas;

class Fisioterapeuta extends Empleado{


    private $clienteVIP;

    /**
     * @param $clienteVIP
     */
    public function __construct(string $nombre, string $apellidos, string $dni, string $correo, string $contrasenya, string $telefono=null, string $direccion, string $cuentaCorriente, string $numSeguridadSocial, Jugador $clienteVIP)
    {
        parent::__construct($dni, $nombre, $apellidos, $correo, $contrasenya, $telefono, $direccion, $cuentaCorriente, $numSeguridadSocial);
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