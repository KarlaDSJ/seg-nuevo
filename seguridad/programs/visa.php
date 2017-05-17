<?php
//Validar visa
include("funciones.php");
$cl2=1;
$r=0;
if(isset($_POST['enviar'])){
	$vs=$_POST['vs'];
	$cl2=preg_match('/^4\d{15}$/',$vs)==0?1:2;
}
		echo "<!DOCTYPE html>
					<html lang='es'>
						<head>
							<title>Visa</title>
							<meta charset='UTF-8'/>
							<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
						</head>
						<body>
							<h1>VISA</h1>
							<div>";
							if($cl2==1)
								echo"<form method='POST' action='visa.php'>
										<label>Número de la visa:</label>
										<input type='text' name='vs' maxlength='16'>
										<input type='submit' name='enviar'/>
									</form>";
							else{
								$visa=str_split($vs);
								for($i=0;$i<15;$i++){
									if($i%2!=0){
										$in=2*$visa[$i];
										$res=$res+$in;
										if($in>=10)
											$r++;
									}
									else{
										if($i==0){
											$res=2*$visa[$i];
											if($res>=10)
												$r++;
										}
										else{
											$par=$visa[$i];
											$res=$res+$par;
											if($par>=10)
												$r++;
										}
									}									
								}
								$res=$res*-1-$r;
								$x=mod($res,10);
								$x16=mod($visa[15],10);
								if($x==$x16)
									echo "<h1>Es visa</h1>";
								else
									echo "<h1>No es visa</h1>";
								echo "<button><a href='../templates/inicio.html'>Inicio</a></button>";
							}
	echo				"</div>
						</body>
					</html>";
?>