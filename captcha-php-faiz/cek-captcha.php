<html>
<head>
	<title>Tutorial Dasar Cara Membuat Captcha Dengan PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Cara Mudah Membuat Captcha di PHP -  Tutorial</h2>	
	<div class="kotak">	
		<?php
			session_start();
			if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
				header("location:index.php?pesan=salah");
			}
			else{		
				echo "<p>Captcha Anda Benar!</p>";
				echo "<p><a href='./'>Back</a></p>";
			}
		?>
	</div>
</body>
</html>