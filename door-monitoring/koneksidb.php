<?php

$server       = "localhost";
$user         = "root";
$password     = "";
$database     = "sensor"; //Silakan ganti dengan nama database anda

$koneksi      = mysqli_connect($server, $user, $password, $database);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query );
    $box = [];
    while( $siswa = mysqli_fetch_assoc($result) ){
             $box[] = $siswa;
    }
    return $box;
}

function tambahPenerima ($post) {
    global $koneksi;
    $email  = htmlspecialchars($post ["email"]);
    $nama   = htmlspecialchars($post ["nama"]);

    $query  = "INSERT INTO penerima_notif (email, nama) VALUES ('$email', '$nama')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);       
}

function ubahPenerima ($post) {
    global $koneksi;
    $id     =  htmlspecialchars($post ["id"]);
    $email  =  htmlspecialchars($post ["email"]);
    $nama   =  htmlspecialchars($post ["nama"]);
                
    $query = "UPDATE penerima_notif SET email = '$email', nama = '$nama' WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
                  
}

function hapusPenerima ($id) {
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM penerima_notif WHERE id = '$id'");
  return mysqli_affected_rows($koneksi);
} 

function sendemail ($emailto, $text) {
    global $koneksi;
    $mail = new PHPMailer(true);  // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = "yourgmailaddress@gmail.com";     // SMTP username
        $mail->Password = 'yourpasswordgmail';              // SMTP password
        $mail->SMTPSecure = 'ssl';                       // Enable TLS encryption, `ssl`
        $mail->Port = 465;                                // TCP port to connect                  
        //Recipients
        $mail->setFrom("smarthome@gmail.com", "Smarthome"); //email pengirim
        $mail->addAddress($emailto); // Email penerima
        $mail->addReplyTo("no-reply@gmail.com");
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Door Monitoring";
        $mail->Body    = $text ;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send(); //send email
        echo 'Pesan berhasil dikirimkan ke email.';
    } 
    catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    return;
}


?>          

 