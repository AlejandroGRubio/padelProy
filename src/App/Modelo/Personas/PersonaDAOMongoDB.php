<?php

namespace App\Modelo\Personas;

use App\Modelo\Excepciones\MongoDBConexionIncorrectaException;
use App\Modelo\Excepciones\PersonaNoEncontradaException;
use App\Personas\Persona;
use MongoDB\Client;
use MongoDB\Database;
use MongoDB\Collection;

class PersonaDAOMongoDB extends PersonaDAO implements InterfazPersonas
{

    private Database $db;
    private Collection $colecccion;

    public function __construct()
    {
        if (!$this->setConexion(new Client("mongodb://root:example@mongo:27017"))){
            throw new MongoDBConexionIncorrectaException();
        }

        $this->db = $this->getConexion()->padel;
        $this->colecccion = $this->db->persona;
        //$this->colecccion->createIndex(['dni'=>1], ['unique' => true]);
        //$this->colecccion->createIndex(['correo'=>1], ['unique' => true]);
    }


    public function insertarPersona(Persona $persona): ?Persona
    {
        //$id = Uuid::uuid4()->toString();

        $this->colecccion->insertOne($persona->convertirPersonaAArrayParaMongoDB());
        return $persona;

    }

    public function modificarPersona(Persona $persona): ?Persona
    {
        $resultado = $this->colecccion->updateOne(['dni' => $persona->getDni()], ['$set' => ['nombre' => $persona->getNombre(), 'apellidos' => $persona->getApellidos(), 'telefono' => $persona->getTelefono(), 'correo' => $persona->getCorreo(), 'contrasenya' => $persona->getContrasenya()]]);

        var_dump($resultado);
    if ($resultado->getModifiedCount()){
        return $persona;
    }else{
        return null;
    }

    }

    public function modificarTodasLasPersonas(array $elementosModificar){

        $resultado=$this->colecccion->updateMany([], ['$set'=>$elementosModificar]);


    }

    public function borrarPersona(Persona $persona): ?Persona
    {

    }

    public function borrarPersonaPorDNI(string $dni): ?Persona
    {
        $persona = $this->leerPersona($dni);

        $retorno = $this->colecccion->deleteOne($persona);
    }

    public function leerPersona(string $dni): ?Persona
    {
        $retorno = $this->colecccion->find(["dni" => $dni]);
        //var_dump($retorno);

        foreach ($retorno as $documento){
            $persona=$this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $persona;
    }

    public function leerPersonaPorCorreo(string $correo):?Persona
    {
        $retorno = $this->colecccion->find(["correo" => $correo]);
        //var_dump($retorno);

        foreach ($retorno as $documento){
            $persona=$this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $persona;
    }

    public function leerTodasLasPersonas(): array
    {
        $retorno = $this->colecccion->find();
        //var_dump($retorno);

        foreach ($retorno as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(), JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }

    public function obtenerPersonasSinTelefono(): array
    {
        $retorno = $this->colecccion->find(["telefono" => null]);
        //var_dump($retorno);

        foreach ($retorno as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(), JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }

    public function obtenerPersonasPorNombre(string $nombre): array
    {
        $retorno = $this->colecccion->find(["nombre" => $nombre]);
        //var_dump($retorno);

        foreach ($retorno as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(), JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }

    public function obtenerPersonasPorApellidos(string $apellidos): array
    {
        $retorno = $this->colecccion->find(["apellidos" => $apellidos]);
        //var_dump($retorno);

        foreach ($retorno as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(), JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }

    public function obtenerRangoPersonas(int $inicio, int $numeroResultado = NUMERORESULTADORANGO): array
    {
       $consulta = $this->colecccion->find([], ['skip' => $inicio, 'limit' => $numeroResultado]);

       if ($consulta->valid()){
           return $consulta->toArray();
       }
       else{
           throw new PersonaNoEncontradaException("No se puede encontrar el rango");
       }



    }

    private function convertirArrayPersona(array $datosPersona):?Persona{

        if (!isset($datosPersona['telefono']) || $datosPersona['telefono'] == NULL){
            $datosPersona['telefono'] = '';
        }
        return new Persona($datosPersona['dni'], $datosPersona['nombre'], $datosPersona['apellidos'], $datosPersona['correo'], $datosPersona['contrasenya'], $datosPersona['telefono'],);

    }




}