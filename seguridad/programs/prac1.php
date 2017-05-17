<?php
//modulo "bien" implementado xD
	$n=0;
	include("funciones.php");
	if(isset($_POST['enviar'])){
		$md=$_POST['md'];
		$de=$_POST['de'];
		$res=mod($md,$de);
		$n=1;
	}
		echo "<!DOCTYPE html>
					<html lang='es'>
						<head>
							<title>Modulo</title>
							<meta charset='UTF-8'/>
							<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
						</head>
						<body>
							<h1>Modulo</h1>
							<div>";
							if($n==1)
								echo "<h1>Respuesta: ".$res."</h1><br/><button><a href='../templates/inicio.html'>Inicio</a></button>";
							else
								echo"<form method='POST' action='prac1.php'>
									<input type='number' name='md' >
									<label>%</label>
									<input type='number' name='de' >
									<input type='submit' name='enviar'/>
									</form>";
				echo		"</div>
						</body>
					</html>";
?>