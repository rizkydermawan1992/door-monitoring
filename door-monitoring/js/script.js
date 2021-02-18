$(document).ready(function(){

  
		//real time halaman dashboard.php
				setInterval(function() {
            		$('.load-data').load('load-data.php');
          							}, 100);

		
  });