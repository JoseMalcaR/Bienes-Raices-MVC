<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

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

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuesta = $_POST['contacto'];
            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '7f3c7fc0a4b1d5';
            $mail->Password = '732789944c3817';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar el contenido del correo
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido del correo
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';

            //Enviar de forma condicional el telefono
            if($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por telefono</p>';
                    $contenido .= '<p>Telefono: ' . ($respuesta['telefono'] ?? 'No proporcionado') . '</p>';
                    $contenido .= '<p>Fecha contacto: ' . ($respuesta['fecha'] ?? 'No proporcionada') . '</p>';
                    $contenido .= '<p>Hora contacto: ' . ($respuesta['hora'] ?? 'No proporcionada') . '</p>';
                } else {
                    $contenido .= '<p>Eligio ser contactado por email</p>';
                    $contenido .= '<p>E-mail: ' . ($respuesta['email'] ?? 'No proporcionado') . '</p>';
                }

            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $' . $respuesta['precio'] . '</p>';
            $contenido .= '<p>Contacto preferido: ' . $respuesta['contacto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Tienes un nuevo mensaje';

            //Enviar el email
            if($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "Error al enviar el mensaje";
            }



        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);

    }

}