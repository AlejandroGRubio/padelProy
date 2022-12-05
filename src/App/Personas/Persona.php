<?php

namespace App\Personas;

use Ramsey\Uuid\Uuid;

class Persona implements \JsonSerializable
{

    private string $dni;
    private string $nombre;
    private string $apellidos;
    private string $telefono;
    private string $correo;
    private string $contrasenya;

    public function __construct(string $dni, string $nombre, string $apellidos, string $correo, string $contrasenya, string $telefono=''){
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->correo=$correo;
        $this->contrasenya=$contrasenya;
        $this->telefono=$telefono;
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
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * @param string $correo
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return string
     */
    public function getContrasenya(): string
    {
        return $this->contrasenya;
    }

    /**
     * @param string $contrasenya
     */
    public function setContrasenya(string $contrasenya): void
    {
        $this->contrasenya = $contrasenya;
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

    public function __toString(): string
    {
       return $this->nombre." ".$this->apellidos." ".$this->dni;
    }


    public function jsonSerialize(): mixed
    {
        return [
            'dni'=>$this->dni,
            'nombre'=>$this->nombre,
            'apellidos'=>$this->apellidos,
            'telefono'=>$this->telefono,
            'correo'=>$this->correo,
        ];
    }



    public function __serialize(): array{

        return [
            'dni'=>$this->dni,
            'nombre'=>$this->nombre,
            'apellidos'=>$this->apellidos,
            'telefono'=>$this->telefono,
            'correo'=>$this->correo,
            'contrasenya'=>$this->contrasenya,
        ];

    }

    public function convertirPersonaAArrayParaMongoDB(){

          return [

                '_id'=>Uuid::uuid4()->toString(),
                'dni'=>$this->dni,
                'nombre'=>$this->nombre,
                'apellidos'=>$this->apellidos,
                'telefono'=>$this->telefono,
                'correo'=>$this->correo,
                'contrasenya'=>$this->contrasenya,
            ];


    }
}