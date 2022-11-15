<?php

namespace Modelo\Personas;
require_once __DIR__ . "/../../datosConexionDB.php";
require_once __DIR__ . "/../../datosConfiguracion.php";

use App\Personas\Persona;
use \PDO;

class PersonaDAOMySql extends PersonaDAO
{

    public function __construct(){

        $this->setConexion(new PDO("mysql:host=".HOSTBD."; dbname=".NOMBREBD, USUARIOBD, PASSBD));

        $this->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function leerPersona(string $dni):?Persona{
        $query = "SELECT * FROM persona WHERE DNI=?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$dni);
        $sentencia->execute();
        $fila=$sentencia->fetch();
        return new Persona($fila['DNI'], $fila['NOMBRE'], $fila['APELLIDOS'], $fila['CORREO'], $fila['CONTRASENYA'], $fila['TELEFONO']);

    }


    public function modificarPersona(Persona $persona): ?Persona
    {
        $query = "UPDATE persona SET DNI=:dni, NOMBRE=:nombre, APELLIDOS=:apellidos, TELEFONO =:telefono,
                   CORREO=:correo, CONTRASENYA=:contrasenya
                   WHERE DNI=:dni";

        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindValue("nombre", $persona->getNombre());
        $sentencia->bindValue("apellidos", $persona->getApellidos());
        $sentencia->bindValue("telefono", $persona->getTelefono());
        $sentencia->bindValue("correo", $persona->getCorreo());
        $sentencia->bindValue("contrasenya", $persona->getContrasenya());
        $sentencia->bindValue("dni", $persona->getDni());

        $resultado=$sentencia->execute();

        if ($resultado){
            return $persona;
        }
        else{
            return null;
        }



    }

    public function borrarPersonaPorDNI(string $dni):?Persona{
        $persona =$this->leerPersona($dni);
        $query = "DELETE FROM persona WHERE DNI=?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$dni);
        $resultado = $sentencia->execute();

        if ($resultado){
            return $persona;
        }
        else{
            return $resultado;
        }

    }

    public function borrarPersona(Persona $persona):?Persona{
        $resultado = $this->borrarPersonaPorDNI($persona->getDni());

        return $resultado;


    }

    public function BorrarTodasLasPersonas(Persona $persona):bool{

        $sentencia = $this->borrarPersonaPorDNI($persona->getDNI());
        return $sentencia-> execute();

    }





    public function insertarPersona(Persona $persona): ?Persona
    {

        if ($persona->getTelefono() === ''){
            $query = "INSERT INTO persona(DNI, NOMBRE, APELLIDOS, TELEFONO, CORREO, CONTRASENYA) VALUES (:dni, :nombre, :apellidos, NULL, :correo, :contrasenya)";

            $sentencia = $this->getConexion()->prepare($query);

            $sentencia->bindValue("dni", $persona->getDni());
            $sentencia->bindValue("nombre", $persona->getNombre());
            $sentencia->bindValue("apellidos", $persona->getApellidos());
            $sentencia->bindValue("correo", $persona->getCorreo());
            $sentencia->bindValue("contrasenya", $persona->getContrasenya());




        }else{
            $query = "INSERT INTO persona(DNI, NOMBRE, APELLIDOS, TELEFONO, CORREO, CONTRASENYA) VALUES (:dni, :nombre, :apellidos, :telefono, :correo, :contrasenya)";

            $sentencia = $this->getConexion()->prepare($query);

            $sentencia->bindValue("dni", $persona->getDni());
            $sentencia->bindValue("nombre", $persona->getNombre());
            $sentencia->bindValue("apellidos", $persona->getApellidos());
            $sentencia->bindValue("telefono", $persona->getTelefono());
            $sentencia->bindValue("correo", $persona->getCorreo());
            $sentencia->bindValue("contrasenya", $persona->getContrasenya());


        }

        $resultado = $sentencia->execute();

        if ($resultado){
            return $persona;
        }
        else{
            return 0;
        }


    }

    public function leerTodasLasPersonas(): array
    {
        $resultado = $this->getConexion()->query("SELECT * FROM persona");

        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();


        $arrayObjetos=[];

        foreach ( $arrayResultados as $filaPersona){
            $arrayObjetos[]=$this->convertirArrayPersona($filaPersona);
        }

        return $arrayObjetos;


    }
    private function convertirArrayPersona(array $datosPersona):?Persona{

        if ($datosPersona['TELEFONO'] === NULL){
            $datosPersona['TELEFONO'] = '';
        }
        return new Persona($datosPersona['DNI'], $datosPersona['NOMBRE'], $datosPersona['APELLIDOS'], $datosPersona['TELEFONO'], $datosPersona['CORREO'], $datosPersona['CONTRASENYA']);

    }


    public function obtenerRangoPersonas(int $inicio, int $numeroResultado = NUMERORESULTADORANGO): array
    {
        $resultado = $this->getConexion()->query("SELECT * FROM persona LIMIT $inicio, $numeroResultado");

        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();


        $arrayObjetos=[];

        foreach ( $arrayResultados as $filaPersona){
            $arrayObjetos[]=$this->convertirArrayPersona($filaPersona);
        }

        return $arrayObjetos;



    }

    public function obtenerPersonasPorNombre(string $nombre): array
    {

        $resultado = $this->getConexion()->query("SELECT * FROM persona WHERE NOMBRE like '".$nombre."'");
        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();


        $arrayObjetos=[];

        foreach ( $arrayResultados as $filaPersona){
            $arrayObjetos[]=$this->convertirArrayPersona($filaPersona);
        }

        return $arrayObjetos;


    }

    public function obtenerPersonasSinTelefono(): array
    {
        $resultado = $this->getConexion()->query("SELECT * FROM persona WHERE TELEFONO like null");
        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();


        $arrayObjetos=[];

        foreach ( $arrayResultados as $filaPersona){
            $arrayObjetos[]=$this->convertirArrayPersona($filaPersona);
        }

        return $arrayObjetos;
    }

    public function obtenerPersonasPorApellidos(string $apellidos): array
    {
        $resultado = $this->getConexion()->query("SELECT * FROM persona WHERE APELLIDOS like '".$apellidos."'");
        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();


        $arrayObjetos=[];

        foreach ( $arrayResultados as $filaPersona){
            $arrayObjetos[]=$this->convertirArrayPersona($filaPersona);
        }

        return $arrayObjetos;
    }

    public function leerPersonaPorCorreo(string $correo):?Persona
    {
         $query = 'SELECT * FROM persona WHERE CORREO=?';
         $sentencias = $this->getConexion()->prepare($query);

         $sentencias->bindParam(1, $correo);



         if ($sentencias->execute()){
             $resultado = $sentencias->fetch();
             return $this->convertirArrayPersona($resultado);
         }
         else{
             return null;
         }
    }

}
