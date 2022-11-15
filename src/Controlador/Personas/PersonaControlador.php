<?php

namespace Controlador\Personas;

use App\Personas\Persona;
use Modelo\Personas\PersonaDAO;
use Modelo\Personas\PersonaDAOMySql;
use Vista\Personas\personaVista;

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

    public function comprobarUsuarioWeb($correo, $contrasenya){
        $persona = $this->modelo->leerPersonaPorCorreo($correo);
        if (password_verify($contrasenya, $persona->getContrasenya())){
            echo "de locos";
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




}