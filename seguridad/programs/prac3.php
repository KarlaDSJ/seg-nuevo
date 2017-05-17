<?php
//Playfair
$n=0;
function inversa ($resul,$cum,$num){
	echo "<h1>Tu frase sin espacios es:<h1/>";
	for($f=0;$f<$num;$f++){
		for($c=0;$c<$cum;$c++){
			if($resul[$c][$f]!='*'){
				echo $resul[$c][$f];
			}
		}
	}
	echo "<br/><button><a href='../templates/inicio.html'>Inicio</a></button>";
}
function playfair($fr,$cum){
	$arre=str_split($fr,$cum);
	$num=count($arre);
	$ivs=array();
	for($i=0;$i<$num;$i++)
		$arre[$i]=str_split($arre[$i]);
	for($c=0;$c<$num;$c++)
		for($f=0;$f<$cum;$f++){
			if(isset($arre[$c][$f]))
				$resul[$f][$c]=$arre[$c][$f];
			else
				$resul[$f][$c]='*';
		}
	echo "<h1>Playfair #".$cum.":<h1/>";
	for($f=0;$f<$cum;$f++){
		for($c=0;$c<$num;$c++){
			if($resul[$f][$c]!='*'){
				echo $resul[$f][$c];
			}
		}
		echo " ";
	}
	inversa($resul,$cum,$num);
}
if(isset($_POST['enviar'])){
	$fr=$_POST['frase'];
	$num=$_POST['num'];
	$fr=str_replace(" ","",$fr);
	$n=1;
}
	echo "<!DOCTYPE html>
				<html lang='es'>
					<head>
						<title>Playfair</title>
						<meta charset='UTF-8'/>
						<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
					</head>
					<body>
						<h1>Playfair</h1>
						<div>";
							if($n==1){
								playfair($fr,$num);
							}
							else
								echo"<form method='POST' action='prac3.php'>
										<label>Frase:</label>
										<input type='text' name='frase'>
										<br/>
										<label>Playfair:</label>
										<input type='number' name='num' min=1>
										<br/>
										<input type='submit' name='enviar'/>
								</form>";
echo					"</div>
					</body>
				</html>";
?>