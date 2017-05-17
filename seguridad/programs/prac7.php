<?php
//Hash
$n=0;
if(isset($_POST['enviar'])){
	$hsh=$_POST['hash'];
	$hsh=strrev($hsh);
	$ct=strlen($hsh)-1;
	$hsh=substr($hsh,1,$ct);
	$n=1;
	
}
	echo "<!DOCTYPE html>
				<html lang='es'>
					<head>
						<title>MyCode</title>
						<meta charset='UTF-8'/>
						<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
					</head>
					<body>
						<h1>Hash</h1>
						<div>";
						if($n==1)
							echo "<h1>Hash: ".$hsh."<h1/><button><a href='../templates/inicio.html'>Inicio</a></button>";
						else
							echo"<form method='POST' action='prac7.php'>
								<label>Palabra:</label>
								<input type='text' name='hash'>
								<input type='submit' name='enviar'/>
							</form>";
		echo        "</div>
					</body>
				</html>";
?>