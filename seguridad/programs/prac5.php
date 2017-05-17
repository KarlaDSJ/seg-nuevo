<?php
 //xor
 $n=0;
  function strToBin($input)
  {
    if (!is_string($input))
      return false;
    $value = unpack('H*', $input);
    return bindec(base_convert($value[1], 16, 2));
  }
	if(isset($_POST['enviar'])){
		$cm=$_POST['cm'];
		$cd=strToBin($cm);
		$n=1;
	}
		echo "<!DOCTYPE html>
					<html lang='es'>
						<head>
							<title>XOR</title>
							<meta charset='UTF-8'/>
							<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
						</head>
						<body>
							<h1>XOR</h1>
							<div>";
							if($n==1){
								echo "<h1>Codificación: ".$cd."<br/>Inversa: ".chr($cd)."<h1/><button><a href='../templates/inicio.html'>Inicio</a></button>";;
							}
							else
								echo"<form method='POST' action='prac5.php'>
										<label>Número o letra a codificar:</label>
										<input type='text' name='cm' maxlength='1'>
										<input type='submit' name='enviar'/>
									</form>";
			echo			"</div>
						</body>
					</html>";
?>