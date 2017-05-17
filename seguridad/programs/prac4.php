<?php
//codificaicon simple #cuenta
$cl2=1;
if(isset($_POST['enviar'])){
	$cta=$_POST['cta'];
	$cl2=preg_match('/^\d{9}$/',$cta)==0?1:2;
}
		echo "<!DOCTYPE html>
					<html lang='es'>
						<head>
							<title>Simple</title>
							<meta charset='UTF-8'/>
							<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
						</head>
						<body>
							<h1>Cifrado Simple</h1>
							<div>";
							if($cl2==1)
								echo"<form method='POST' action='prac4.php'>
									<label>Número de cuenta:</label>
									<input type='text' name='cta' maxlength='9'>
									<input type='submit' name='enviar'/>
								</form>";
							else{
								$res=strrev($cta);
								echo "<h1>Número de cuenta cifrado: ".$res."<br/>Número de cuenta: ".strrev($res)."</h1><button><a href='../templates/inicio.html'>Inicio</a></button>";;
							}							
			echo		"</div>
						</body>
					</html>";
?>
