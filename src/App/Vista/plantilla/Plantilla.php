<?php

namespace App\Vista\plantilla;

class Plantilla
{
    private string $encabezado;
    private string $nav;
    private string $footer;


    public function __construct($titulo){

        $this->generarEncabezado($titulo);
        $this->generarBarraDeNavegacion();
        $this->generarFooter();

    }


    public function generarEncabezado($titulo , int $num = 0){

        //require 'elementos/encabezado_view.php';
        $this->encabezado = "<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <title>$titulo</title>

    <!-- CSS -->
    <link rel='stylesheet' href='App/Vista/plantilla/assets/css/reset.css'>
    <link rel='stylesheet' href='App/Vista/plantilla/assets/css/simplegrid.css'>
    <link rel='stylesheet' href='App/Vista/plantilla/assets/css/icomoon.css'>
    <link rel='stylesheet' href='App/Vista/plantilla/assets/css/lightcase.css'>
    <link rel='stylesheet' href='App/Vista/plantilla/assets/js/owl-carousel/owl.carousel.css' />
    <link rel='stylesheet' href='App/Vista/plantilla/assets/js/owl-carousel/owl.theme.css' />
    <link rel='stylesheet' href='App/Vista/plantilla/assets/js/owl-carousel/owl.transitions.css' />
    <link rel='stylesheet' href='App/Vista/plantilla/assets/style.css'>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
 
</head>";
        if ($num != 0){
            return $this->encabezado;
        }

    }

    public function generarBarraDeNavegacion(int $num = 0 ){

        $this->nav = "<body id='home'>
            <!-- Header -->
            <header id='top-header' class='header-home'>
                <div class='grid'>
                    <div class='col-1-1'>
                        <div class='content'>
                            <div class='logo-wrap'>
                                <a href='#0' class='logo'>The7</a>
        </div>
                            <nav class='navigation'>
                                <input type='checkbox' id='nav-button'>
                                <label for='nav-button' onclick></label>
                                <ul class='nav-container'>
                                    <li><a href='#home' class='current'>Home</a></li>
                                    <li><a href='#services'>Services</a></li>
                                    <li><a href='#work'>Work</a></li>
                                    <li><a href='#blog'>Blog</a></li>
                                    <li><a href='#pricing'>Pricing</a></li>
                                    <li><a href='#team'>Team</a></li>
                                    <li><a href='#contact'>Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>";
        if ($num != 0){
            return $this->nav;
        }
    }

    public function generarFooter(int $num = 0){
        $this->footer = "<footer class='wrap'>
                    <div class='grid grid-pad' >
                        <div class='col-1-4'>
                            <div class='content'>
                                <div class='footer-widget'>
                                    <h3>About</h3>
                                    <div class='textwidget'>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore.</p><br>
                                        <p>Et dolore magna aliquyam erat sed diam voluptua.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-1-4' >
                            <div class='content'>
                                <div class='footer-widget'>
                                    <h3>Recent Posts</h3>
                                    <div class='fwidget'>
                                        <ul>
                                            <li><a href='#0'>Suspendisse nec lectus non</a></li>
        <li><a href='#0'>Phasellus euismod pulvinar</a></li>
                                            <li><a href='#0'>Aliquam erat volutpat</a></li>
                                            <li><a href='#0'>Phasellus euismod pulvinar</a></li>
                                            <li><a href='#0'>Aliquam erat volutpat</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-1-4' >
                            <div class='content'>
                                <div class='footer-widget'>
                                    <h3>More info</h3>
                                    <div class='textwidget'>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                                        <br>
                                        <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-1-4' >
                            <div class='content'>
                                <div class='footer-widget'>
                                    <h3>Flickr Feed</h3>
                                    <div class='flickr-widget'>
                                        <ul class='flickr-list'>
                                            <li><a href='#0'><img src='Vista/plantilla/assets/images/flickr-widget/flickr1.jpg' alt=''></a></li>
                                            <li><a href='#0'><img src='Vista/plantilla/assets/images/flickr-widget/flickr2.jpg' alt=''></a></li>
                                            <li><a href='#0'><img src='Vista/plantilla/assets/images/flickr-widget/flickr3.jpg' alt=''></a></li>
                                            <li><a href='#0'><img src='Vista/plantilla/assets/images/flickr-widget/flickr4.jpg' alt=''></a></li>
                                            <li><a href='#0'><img src='Vista/plantilla/assets/images/flickr-widget/flickr5.jpg' alt=''></a></li>
                                            <li><a href='#0'><img src='Vista/plantilla/assets/images/flickr-widget/flickr6.jpg' alt=''></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='social-footer'>
                        <div class='grid grid-pad'>
                            <div class='col-1-1' >
                                <div class='content'>
                                    <div class='social-set'>
                                        <a  href='#0'><i class='icon-facebook'></i></a>
                                        <a  href='#0'><i class='icon-twitter'></i></a>
                                        <a  href='#0'><i class='icon-linkedin2'></i></a>
                                        <a  href='#0'><i class='icon-dribbble4'></i></a>
                                        <a  href='#0'><i class='icon-instagram'></i></a>
                                    </div>
                                    <p class='source-org copyright'>© 2016 | All Rights Reserved Created By <a href='http://templatestock.co'>Template Stock</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->";
        if ($num != 0){
            return $this->footer;
        }
    }


    public function generarIndice():string{

        $page = "";
        $page .= $this->generarEncabezado("indice", 1);
        $page .= $this->generarBarraDeNavegacion(1);
        $page .="<div class='parallax-section parallax1'>
                <div class='grid grid-pad'>
                    <div class='col-1-1'>
                         <div class='content content-header' >
                            <h2>Página principal del Club de pádel</h2>
                            <p>Apuntate a la mejor web de padel.</p>
        </div>
                    </div>
                </div>
            </div>";
        $page .="<div class='wrap services-wrap' id='services'>
                <section class='grid grid-pad services'>
                    <h2>Nuestros servicios</h2>
                    <div class='col-1-4 service-box service-1' >
                        <div class='content'>
                            <div class='service-icon'>
                                <i class='circle-icon icon-heart4'></i>
                            </div>
                            <div class='service-entry'>
                                <h3>Alquila Pistas</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat tellus eget libero pretium, sollicitudin feugiat libero.</p>
                                <a class='btn read-more' href='#0'>Read More</a>
        </div>
                        </div>
                    </div>
                    <div class='col-1-4 service-box service-2' >
                        <div class='content'>
                            <div class='service-icon'>
                                <i class='circle-icon icon-star4'></i>
                            </div>
                            <div class='service-entry'>
                                <h3>Entrenadores y Quiropracticos</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat tellus eget libero pretium, sollicitudin feugiat libero.</p>
                                <a class='btn read-more' href='#0'>Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-1-4 service-box service-3'>
                        <div class='content'>
                            <div class='service-icon'>
                                <i class='circle-icon icon-display'></i>
                            </div>
                            <div class='service-entry'>
                                <h3>Torneos diarios</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat tellus eget libero pretium, sollicitudin feugiat libero.</p>
                                <a class='btn read-more' href='#0'>Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-1-4 service-box service-4' >
                        <div class='content'>
                            <div class='service-icon'>
                                <i class='circle-icon icon-user6'></i>
                            </div>
                            <div class='service-entry'>
                                <h3>User Friendly</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat tellus eget libero pretium, sollicitudin feugiat libero.</p>
                                <a class='btn read-more' href='#0'>Read More</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>";
        $page .= $this->generarFooter(1);
        return $page;




    }

    public function generarTodaLaPagina():string{

        $salida=$this->encabezado;
        $salida.=$this->nav;
        $salida.=$this->footer;


        return $salida;


    }







}