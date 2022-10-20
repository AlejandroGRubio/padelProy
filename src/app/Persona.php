<?php

namespace App;

class Persona
{

    private string $dni;
    private string $nombre;
    private string $apellidos;
    private string $telefono;

    public function __construct(string $dni, string $nombre, string $apellidos){
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }

    public function setDNI(string $dni):Persona{
        $this->dni=$dni;
        return $this;
    }

    public function getDni(): string{
        return $this->dni;
    }

    /**
     * @return string
     */
    public function getNombre(): string{
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos(): string{
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void{
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getTelefono(){
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono):Persona{
        $this->telefono = $telefono;
        return $this;
    }






}