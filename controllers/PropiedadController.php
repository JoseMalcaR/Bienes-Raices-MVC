<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class PropiedadController{

    public static function index(Router $router){

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;

    
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        //Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        //Metodo POST para crear
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedad($_POST['propiedad']);

            //Generar un nombre unico para la imagen
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(new Driver());
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }


            $errores = $propiedad->validar();
 
            //revisar que el arreglo de errores este vacio
            if(empty($errores)) {

                // Subida de Archivos
 
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0755, true);
                }


                //Guarda la imagen en el servidor solo si se subió una
                if(isset($imagen)) {
                    $imagen->save(CARPETA_IMAGENES . "/" . $nombreImagen);
                }

                $resultado = $propiedad->guardar();  
            }
        }
        
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);

        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();

        //Metodo POST para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST') {


        $propiedad->sincronizar($_POST['propiedad']);

        //Validacion
        $errores = $propiedad->validar();

        //Subida de Archivos
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $manager = new ImageManager(new Driver());
            $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        //revisar que el arreglo de errores este vacio
        if(empty($errores)) {
            //Crear carpeta si no existe
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES, 0755, true);
            }
                
            //Almacenar la imagen en el servidor si hay una nueva imagen
            if(isset($imagen)) {
                $imagen->save(CARPETA_IMAGENES . '/' . $nombreImagen);
            }
            
            $propiedad->guardar();
        }

    
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
            ]);
        }

    public static function eliminar() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Validar ID
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
        $tipo = $_POST['tipo'];
        if(validarTipoContenido($tipo)) {
            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();
        }
        }
    }
    }

    }