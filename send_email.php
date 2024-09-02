<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/flyweb/santiagovillaba.flyweb.com.ar/PHPMailer/src/Exception.php';
require '/home/flyweb/santiagovillaba.flyweb.com.ar/PHPMailer/src/PHPMailer.php';
require '/home/flyweb/santiagovillaba.flyweb.com.ar/PHPMailer/src/SMTP.php';


/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Configuraci√≥n de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuraciones del servidor
        $mail->isSMTP();
        $mail->Host       = 'mail.flyweb.com.ar';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@flyweb.com.ar';
        $mail->Password   = 'saAr@@2023_!';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Remitente y destinatarios
        $mail->setFrom('info@flyweb.com.ar', 'Fly Web');
        $mail->addAddress('santiago.flyweb@gmail.com'); //correo de destino

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body    = "Nombre: $fname $lname<br>Email: $email<br>Tel√©fono: $phone<br>Servicio: $service<br>Mensaje: $message";

        // Enviar el correo
        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
    }
}*/
if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['service']) || empty($_POST['message'])) {
    echo "Por favor, completa todos los campos antes de enviar.";
    exit;
}

$first_name = strip_tags(htmlspecialchars($_POST['fname']));
$last_name = strip_tags(htmlspecialchars($_POST['lname']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$service = strip_tags(htmlspecialchars($_POST['service']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'mail.flyweb.com.ar';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@flyweb.com.ar';
    $mail->Password   = 'saAr@@2023_!';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('info@flyweb.com.ar', 'Fly Web');
    $mail->addAddress('santiago.flyweb@gmail.com', 'Fly Web');

    $mail->isHTML(true);
    $mail->Subject = 'Nuevo formulario de contacto portfolio';
    $mail->Body    = "Has recibido un nuevo mensaje desde tu formulario de contacto.<br><br>"
                   . "Aqui estan los detalles:<br><br>"
                   . "Nombre: $first_name $last_name<br>"
                   . "Correo: $email_address<br>"
                   . "Telefono: $phone<br>"
                   . "Servicio interesado: $service<br><br>"
                   . "Mensaje:<br>$message";
    $mail->AltBody = "Has recibido un nuevo mensaje desde tu formulario de contacto.\n\n"
                   . "Aqui est®¢n los detalles:\n\n"
                   . "Nombre: $first_name $last_name\n"
                   . "Correo: $email_address\n"
                   . "Telefono: $phone\n"
                   . "Servicio interesado: $service\n\n"
                   . "Mensaje:\n$message";

    $mail->send();
    echo "success"; // Este mensaje ser®¢ capturado por AJAX
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
?>
