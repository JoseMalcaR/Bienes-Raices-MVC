<?php 

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas(){

        session_start();
        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar','/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];


        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else if($metodo === 'POST'){
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas

        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
            return;
        }

        if($fn){
            // La url existe y hay una función asociada
            call_user_func($fn, $this);
        } else {
            echo "Pagina no encontrada";
        }
    }
    //Muestra una vista
    public function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value; // Crea una variable con el nombre de la clave y le asigna el valor
        }

        ob_start(); // Almacena en memoria lo que se imprime
        extract($datos);
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Obtiene el contenido almacenado en memoria y lo limpia
        
        include __DIR__ . "/views/layout.php";
    }
}