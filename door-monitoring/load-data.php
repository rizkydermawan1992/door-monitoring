<?php 

require "koneksidb.php";

 $data = query("SELECT * FROM tabel_door WHERE id = 1")[0];

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<?php 
 		if ($data["door_state"] == 1) {
 		  echo'<img src="img/door-open.png" style="height: 400px; width: 200px;">';
 		}
 		else{
 		   echo'<img src="img/door-close.png" style="height: 400px; width: 200px;">';
 		}
 	?> 
 	 <div class="alert alert-secondary mt-1" role="alert" style="width: 300px; 
 	 font-style: italic;">
        <p>Log Data = <?= $data["waktu"];?></p>
     </div>
 </body>
 </html>