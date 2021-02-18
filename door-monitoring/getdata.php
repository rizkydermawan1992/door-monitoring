<?php 
require "koneksidb.php";



if (isset($_GET["door"])) {
   $door    = mysqli_escape_string($koneksi, $_GET["door"]);
   $data    = query("SELECT * FROM penerima_notif");
   $sensor  = query("SELECT * FROM tabel_door WHERE id  = 1")[0];


    // Door 0 = closed || 1 = open
   if ($door == 0 AND $sensor["msg_state"] == 1) {
   	  $msg_state = 0;
        $text = "Door has been closed!!!";
         foreach ($data as $email) {
         sendemail($email["email"], $text);
        }
   }
   else if ($door == 1 AND $sensor["msg_state"] == 0) {
   	  $msg_state = 1;
   	  $text = "Door has been opened!!!";
         foreach ($data as $email) {
         sendemail($email["email"], $text);
        }

   }
   else{
   	  $msg_state = $sensor["msg_state"];
   }


   $sql = "UPDATE tabel_door SET door_state = '$door', msg_state = $msg_state WHERE id = 1";
   mysqli_query($koneksi, $sql);
   
}



 ?>