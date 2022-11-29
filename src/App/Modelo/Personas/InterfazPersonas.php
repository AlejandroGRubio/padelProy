<?php

namespace App\Modelo\Personas;

require_once __DIR__ . "/../../datosConexionDB.php";
require_once __DIR__ . "/../../datosConfiguracion.php";

use App\Personas\Persona;

interface InterfazPersonas
{
    public function insertarPersona(Persona $persona):?Persona;
    public function modificarPersona(Persona $persona):?Persona;
    public function borrarPersona(Persona $persona):?Persona;
    public function borrarPersonaPorDNI(string $dni):?Persona;
    public function leerPersona(string $dni):?Persona;
    public function leerPersonaPorCorreo(string $correo):?Persona;

    public function leerTodasLasPersonas():array;
    public function obtenerPersonasSinTelefono():array;
    public function obtenerPersonasPorNombre(string $nombre):array;
    public function obtenerPersonasPorApellidos(string $apellidos):array;
    public function obtenerRangoPersonas(int $inicio, int $numeroResultado = NUMERORESULTADORANGO):array;


}