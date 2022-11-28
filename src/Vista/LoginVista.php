<?php

namespace Vista;

use Vista\plantilla\Plantilla;

class LoginVista
{

    private Plantilla $html;

    public function __construct()
    {
        $this->html= new Plantilla('Login de usuarios');

    }

    public function generarFormularioLogin():string{
        $salida = "
            </br>
            </br>
            <form action='/logear' method='post'>
            <label for='inputCorreo'>Introduce tu correo: </label>
            <input type='email' name='correo' id='inputCorreo'>
             <label for='inputContrasenya'>Introduce tu contraseña: </label>
            <input type='password' name='contrasenya' id='inputContrasenya'>
            <button type='submit'>Enviar</button>
            </form>
        
        ";
        return $salida;

    }

    public function generarFormularioRegistro():string{
        $salida = "
            <form action='/api/persona' method='post'>
            <label for='inputDNI'>Introduce tu DNI: </label>
            <input type='text' name='dni' id='inputDNI'>
             <label for='inputNombre'>Introduce tu nombre: </label>
            <input type='text' name='nombre' id='inputNombre'>
             <label for='inputApellidos'>Introduce tu apellido: </label>
            <input type='text' name='apellidos' id='inputApellidos'>
            <label for='inputTelefono'>Introduce tu teléfono: </label>
            <input type='tel' name='telefono' id='inputTelefono'>
            <label for='inputCorreo'>Introduce tu correo: </label>
            <input type='email' name='correo' id='inputCorreo'>
             <label for='inputContrasenya'>Introduce tu contraseña: </label>
            <input type='password' name='contrasenya' id='inputContrasenya'>
            <button type='submit'>Registro</button>
            </form>
        
        ";
        return $salida;

    }


    public function mostrarLogin():void{
        echo $this->html->generarEncabezado("Login usuarios", 1);
        echo $this->html->generarBarraDeNavegacion(1);
        echo $this->generarFormularioLogin();
        echo $this->generarFormularioRegistro();
        echo $this->html->generarFooter(1);





    }


}