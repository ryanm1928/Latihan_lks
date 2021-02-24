<html>
<head>
	<title>Tutorial Dasar Cara Membuat Captcha Dengan PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Cara Mudah Membuat Captcha di PHP -  Tutorial</h2>	
	<div class="kotak">		
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "salah"){
				echo "<p>Captcha tidak sesuai ...!</p>";
			}
		}
		?>
		<p>Silahkan Isi Captcha Dengan Benar!</p>		
		<form action="cek-captcha.php" method="post">
			<table align="center">						
				<tr>
					<td>Captcha</td>				
					<td><img src="captcha.php" alt="gambar" /> </td>
				</tr>
				<tr>
					<td>Input Captcha </td>
					<td><input name="nilaiCaptcha" size="23"/></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type ="submit" value="Cek Captcha"/></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>