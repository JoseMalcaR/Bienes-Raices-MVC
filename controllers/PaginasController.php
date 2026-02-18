<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {

    public static function index(Router $router) {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
       
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros');
       
    }

    public static function anuncios(Router $router) {

        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios', [
        'propiedades' => $propiedades
       ]);
    }

    public static function propiedad(Router $router) {

        $id = validarORedireccionar('/anuncios');

        //Obtener los datos de la propiedad
        $propiedad = Propiedad::find($_GET['id']);

        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
 
       
    }

    public static function blog(Router $router) {
         $router->render('paginas/blog');
    }

    public static function entrada(Router $router) {
       $router->render('paginas/entrada');
    }

    public static function contacto(Router $router) {

    }

}