<?php

namespace Modelo\Personas;

use App\Personas\Persona;
use \PDO;

abstract class PersonaDAO implements InterfazPersonas
{

    private PDO $conexion;

    public function insertarPersona(Persona $persona): ?Persona
    {
        // TODO: Implement insertarPersona() method.
    }

    public function modificarPersona(Persona $persona): ?Persona
    {
        // TODO: Implement modificarPersona() method.
    }

    public function borrarPersona(Persona $persona): ?Persona
    {
        // TODO: Implement borrarPersona() method.
    }

    public function borrarPersonaPorDNI(string $dni): ?Persona
    {
        // TODO: Implement borrarPersonaPorDNI() method.
    }

    public function leerPersona(string $dni): ?Persona
    {
        // TODO: Implement leerPersona() method.
    }

    public function leerPersonaPorCorreo(string $correo):?Persona
    {
        // TODO: Implement leerPersonaPorCorreo() method.
    }

    public function leerTodasLasPersonas(): array
    {
        // TODO: Implement leerTodasLasPersonas() method.
    }

    public function obtenerPersonasSinTelefono(): array
    {
        // TODO: Implement obtenerPersonasSinTelefono() method.
    }

    public function obtenerPersonasPorNombre(string $nombre): array
    {
        // TODO: Implement obtenerPersonasPorNombre() method.
    }

    public function obtenerPersonasPorApellidos(string $apellidos): array
    {
        // TODO: Implement obtenerPersonasPorApellidos() method.
    }

    public function obtenerRangoPersonas(int $inicio, int $numeroResultado = NUMERORESULTADORANGO): array
    {
        // TODO: Implement obtenerRangoPersonas() method.
    }

    /**
     * @return PDO
     */
    public function getConexion(): PDO
    {
        return $this->conexion;
    }

    /**
     * @param PDO $conexion
     */
    public function setConexion(PDO $conexion): void
    {
        $this->conexion = $conexion;
    }



}