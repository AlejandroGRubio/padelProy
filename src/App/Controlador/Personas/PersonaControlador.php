<?php

namespace App\Controlador\Personas;

use App\Personas\Persona;
use App\Modelo\Excepciones\actualizarPersonasException;
use App\Modelo\Excepciones\PersonaNoEncontradaException;
use App\Controlador\Excepciones\ParametrosDePersonaIncorrectosException;
use App\Modelo\Personas\PersonaDAO;
use App\Modelo\Personas\PersonaDAOMySql;
use App\Vista\Personas\personaVista;


class PersonaControlador
{
    private personaDAO $modelo;
    private personaVista $vista;

    /**
     * @param personaDAO $modelo
     * @param personaVista $vista
     */
    public function __construct()
    {
        $this->modelo = new personaDAOMySQL();
        $this->vista = new personaVista();
    }

    public function recibirDatosLogin(){
        if (isset($_POST['correo']) && isset($_POST['contrasenya'])){
            $this->comprobarUsuarioWeb($_POST['correo'], $_POST['contrasenya']);
        }else{
            echo "Parametros de login incorrectos";
        }
    }

    public function comprobarUsuarioWeb($correo, $contrasenya){
        $persona = $this->modelo->leerPersonaPorCorreo($correo);
        var_dump($persona);
        echo $contrasenya;
        if(password_verify($contrasenya, $persona->getContrasenya())){
            session_start();
            $_SESSION['logeado'] = true;
            $_SESSION['usuario'] = $persona->getNombre();
            echo "<a href='/'>Inicio</a>";
        }
        else{
            echo "f";
        }
    }

    public function crear(){

        $passCifrado = password_hash('1234', PASSWORD_DEFAULT);
        $persona = new Persona('44151222B', 'Carlos', 'Perez', 'javi@gmail.com', $passCifrado, '12345678');


        $this->modelo->insertarPersona($persona);
    }


    public function login(){
        echo "Esta es la página de login";
    }

    public function mostrar($dni){

        if (isset($dni)){
            try {
                $this->mostrarDatosPersonaAPI($dni);
            }
            catch (PersonaNoEncontradaException $e){
                //TODO implementar respuesta http
                echo "No existe la persona buscada" .$e->getMessage();
            }

        }
        else{
            $this->mostrarTodasLasPersonasAPI();
        }

        //echo json_encode($this->modelo->leerTodasLasPersonas());
    }
    private function mostrarTodasLasPersonasAPI(){

        echo json_encode($this->modelo->leerTodasLasPersonas(), JSON_PRETTY_PRINT);

    }

    private function mostrarDatosPersonaAPI($dni){
        echo json_encode($this->modelo->leerPersona($dni), JSON_PRETTY_PRINT);
    }

    public function guardar(){

        $respuestaControlPersona = $this->comprobarDatosPersonaCorrectos("post");

        if (is_bool($respuestaControlPersona)){
            $persona = new Persona($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['correo'], password_hash($_POST['contrasenya'], PASSWORD_DEFAULT));

            if (isset($_POST['telefono'])){
                $persona->setTelefono($_POST['telefono']);
            }
            $this->modelo->insertarPersona($persona);
        }
        else{
            $mensajeError = "Error en los siguientes campos ";
            foreach ($respuestaControlPersona as $error){
                $mensajeError .= "Error en el parámetro " .$error ."<br>";
            }
            throw new ParametrosDePersonaIncorrectosException($mensajeError);
        }



    }

    private function comprobarDatosPersonaCorrectos($metodo):array|bool{
        $arrayFallos = array();
        if ($metodo == 'post'){
            if (!isset($_POST['dni'])){
                $arrayFallos[]='dni';
            }
            if (!isset($_POST['nombre'])){
                $arrayFallos[]='nombre';
            }
            if (!isset($_POST['apellidos'])){
                $arrayFallos[]='apellidos';
            }
            if (!isset($_POST['correo'])){
                $arrayFallos[]='correo';
            }
            if (!isset($_POST['contrasenya'])){
                $arrayFallos[]='contrasenya';
            }

        }
        if (count($arrayFallos)>0){
            return $arrayFallos;
        }
        else{
            return true;
        }


    }

    public function borrar($dni){

        if (isset($dni)){
            try {
                $this->modelo->borrarPersonaPorDNI($dni);
            }catch (PersonaNoEncontradaException $e){

                header("Persona no encontrada", true, 500);
            }


        }
        else{
            $this->modelo->borrarTodasLasPersonas();

        }

    }



    public function modificar($dni){
        parse_str(file_get_contents("php://input"), $put_vars);
        if (isset($dni)){
           // var_dump($put_vars);
            try {
                $persona = $this->modelo->leerPersona($dni);
            }catch (PersonaNoEncontradaException $e){
                header("Persona no encontrada", true, 404);
                die;
            }

            if (isset($put_vars['dni'])){
                if ($this->modelo->existeDNI($put_vars['dni'])){
                    header("DNI existente", true, 204);
                    die;
                }
                else{
                    $persona->setDNI($put_vars['dni']);
                }

            }

        if (isset($put_vars['nombre'])){
            $persona->setNombre($put_vars['nombre']);
        }
        if (isset($put_vars['apellidos'])){
            $persona->setApellidos($put_vars['apellidos']);
        }
        if (isset($put_vars['telefono'])){
            $persona->setTelefono($put_vars['telefono']);
        }
        if (isset($put_vars['contrasenya'])){

            $persona->setContrasenya(password_hash($put_vars['contrasenya'], PASSWORD_DEFAULT));
        }
        if (isset($put_vars['correo'])){
            if ($this->modelo->existeCorreo($put_vars['correo'])){
                header("Correo existente", true, 204);
                die;
            }
            else{
                $persona->setCorreo($put_vars['correo']);
            }
            $this->modelo->modificarPersona($persona);
        }
        }
        else{
            try {
                $this->modelo->modificarTodasLaPersonas($put_vars);
            }catch (actualizarPersonasException $e){
                header($e->getMessage(), true, 204);
            }

        }



    }


}