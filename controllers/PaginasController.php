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
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USERNAME'];
            $mail->Password = $_ENV['SMTP_PASSWORD'];
            $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
            $mail->Port = $_ENV['SMTP_PORT'];

            //Configurar el contenido del correo
            $mail->setFrom($_ENV['SMTP_FROM_EMAIL']);
            $mail->addAddress($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
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