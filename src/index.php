<?php



  //  use \App\Persona;
    namespace App;

    use App\Intervalo;
    use App\Modelo\Personas\PersonaDAOMongoDB;
    use App\Personas\Persona;
    use App\Controlador\Personas;
    use App\Personas\Jugador;
    use App\LadoPreferido;
    use App\Controlador\Personas\PersonaControlador;
    use App\Modelo\Personas\PersonaDAOMySql;
    use App\Vista\Personas\personaVista;
    use App\Vista\plantilla\Plantilla;
    use App\Vista\LoginVista;


    //include_once "App/Personas/Persona.php";

    include __DIR__."/vendor/autoload.php";

    $mongodb = new PersonaDAOMongoDB();
    $persona = new Persona('44121212A', 'Juan', 'Perez Gomez', 'Juan@gmail.com', '12234', '12345678');

    //$mongodb->insertarPersona($persona);

    $mongodb->modificarPersona($persona);

    var_dump($mongodb->leerTodasLasPersonas());



//    spl_autoload_register(function ($class){
//
//        $ruta=__DIR__."/".$class;
//        //echo "<p/>";
//        $ruta.=".php";
//        $ruta= str_replace("\\", "/", $ruta);
//        //echo $ruta;
//        include_once($ruta);
//
//
//
//    });




//    include_once("App/Personas/Persona.php");
//    include_once("App/Personas/Jugador.php");
//    include_once("App/LadoPreferido.php");
//    include_once ("App/Intervalo.php");



//
//    $persona = new Persona(dni: '123456', nombre: 'Juan', apellidos: 'Gonzalez',correo: 'si',contrasenya: 'si',telefono: '1234');
//
//    var_dump($persona);
//    echo "<p/>";
//    /*$jugador = new Jugador(dni: '1222344',
//    nombre: 'Sara', apellidos: 'Lupe',
//    nivelJuego: 1, manoHabil: LadoPreferido::Izquierdo,
//    ladoPreferido: LadoPreferido::Indistinto,indiceDeIrresponsabilidad: "si",
//    numFederacion: 1233,horarioMensualPreferido: "Horario",renovacionAutomaticaHorario: "si",
//    fisioAsociado: 123345,entrenadorPersonal: "Juan",mixtas: "si",socio: "33345");
//
//    var_dump($jugador);
//    */
//
//
//    $intervalo = new Intervalo(hora_ini: 8.00, hora_fin: 9.00);
//    $intervalo2 = new Intervalo(hora_ini: 10.00, hora_fin: 12.00);
//
//
//    var_dump($intervalo);
//
//    echo "<p/>";
//
//    var_dump($intervalo2);
//
//    echo "<p/>";
//
//    $array = [$intervalo, $intervalo2];
//    echo "<p/>";
//    print_r($array);
//    echo "<p/>";
//    foreach ($array as $intervalo){
//
//
//
//
//    }
//
//    $personaDAO = new PersonaDAOMySql();
//
//    $personaModificar = new Persona('44111222A', 'Javier', 'Perez', 'javi@gmail.com', '12234', '12345678');
//
//    $resultado = $personaDAO->modificarPersona($personaModificar);
//
//    var_dump($resultado);
//
//    $personaLeida = $personaDAO->leerPersona('12345678');
//
//    var_dump($personaLeida);
//
//    $personaInsertar = new Persona('44112111A', 'Juan', 'Perez', 'javi@gmail.com', '12234', '12345678');
//
//  // $resultado2 = $personaDAO->insertarPersona($personaInsertar);
//
//  //  var_dump($resultado2);
//
//
//
//    var_dump($personaDAO->leerTodasLasPersonas());
//
//
//    var_dump($personaDAO->obtenerRangoPersonas(0));
//
//
//    var_dump($personaDAO->obtenerPersonasPorNombre('Javier'));
//
//    var_dump($personaDAO->obtenerPersonasPorApellidos('Lopez Izquierdo'));
//
//
//    if ($personaDAO->getConexion()){
//        echo "Perfe";
//    }
//    else{
//        echo "f";
//    }
//
//
//   echo "Ejemplo para ver si funciona";
//
//
//    $vista = new personaVista("Home");
//    $vista->getHtml()->generarBarraDeNavegacion();
//
//    echo $vista;

    //$controlador = new PersonaControlador();
    //$controlador->crear();

    //$controlador->comprobarUsuarioWeb("javi@gmail.com", "1234");

//   $plantilla = new Plantilla("NuevaPlantilla");
//    echo "</br>";
//    echo $plantilla->generarTodaLaPagina();



   // echo "<pre>";
     //   var_dump($_SERVER);
    //echo  "</pre>";


    $router = new router();
    $router->guardarRutas('get','/', function (){
        $plantilla = new Plantilla("NuevaPlantilla");

        echo $plantilla->generarIndice();


    });
    $router->guardarRutas('get','/api/personas', [PersonaControlador::class, "mostrar"]);
    $router->guardarRutas('get', '/login', [LoginVista::class, "mostrarLogin"]);
    $router->guardarRutas('post', '/logear', [PersonaControlador::class, "recibirDatosLogin"]);
    $router->guardarRutas('post','/api/personas', [PersonaControlador::class, "guardar"]);
    $router->guardarRutas('delete','/api/personas', [PersonaControlador::class, "borrar"]);
    $router->guardarRutas('put','/api/personas', [PersonaControlador::class, "modificar"]);


    //  echo $_SERVER["REQUEST_URI"];
   // echo '</br>';
   // echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    //$router->resolverRuta($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);

    if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == "persona"){
        $persona = new PersonaControlador();
        $persona->crear();
    }

