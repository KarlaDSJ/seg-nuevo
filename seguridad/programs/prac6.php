<?php
	//cifrado simétrico
	$cl2=1;
	if(isset($_POST['enviar'])){
		$pb=$_POST['pb'];
		$llv=$_POST['llv'];
		$num=strlen($pb)-1;
		$cl2=$num<$llv?1:2;
	}
			echo "<!DOCTYPE html>
						<html lang='es'>
							<head>
								<title>Simple</title>
								<meta charset='UTF-8'/>
								<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
							</head>
							<body>
								<h1>Cifrado simétrico</h1>
								<div>";
								if($cl2==1)
									echo"<form method='POST' action='prac6.php'>
											<label>Palabra a cifrar:</label>
											<input type='text' name='pb'>
											<br/>
											<label>Llave:</label>
											<input type='number' name='llv' min=1>
											<br/>
											<input type='submit' name='enviar'/>
										</form>";
								else{
									$pb=strrev($pb);
									$pb=str_split($pb);
									$a=$pb[$llv-1];
									$b=$pb[$num];
									$pb[$llv-1]=$b;
									$pb[$num]=$a;
									$pb=implode($pb);
									echo "<h1>Palabra cifrada: ".$pb."</h1>";
									$pb=str_split($pb);
									$pb[$llv-1]=$a;
									$pb[$num]=$b;
									$pb=implode($pb);
									$pb=strrev($pb);
									echo "<h1>La palabra era: ".$pb."<h1/><button><a href='../templates/inicio.html'>Inicio</a></button>";;
								}							
				echo		"</div>
							</body>
						</html>";
?>
