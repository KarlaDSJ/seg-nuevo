<?php
//Práctica 2 codificación propia
$cod=array('a'=>'z','b'=>'y','c'=>'x','d'=>'w','e'=>'v','f'=>'u','g'=>'t','h'=>'s','i'=>'r','j'=>'q','k'=>'p','l'=>'o','m'=>'n','n'=>'m','o'=>'l','p'=>'k','q'=>'j','r'=>'i','s'=>'h','t'=>'g','u'=>'f','v'=>'e','w'=>'d','x'=>'c','y'=>'b','z'=>'a');
$n=0;
if(isset($_POST['enviar'])){
	$cn=$_POST['plbr'];
	$cn1=preg_match('/^[A-z]{1,}$/',$cn);
	$n=$cn1==0?0:1;
	$cd=str_split($cn);
	$num=count($cd);
}
	echo "<!DOCTYPE html>
				<html lang='es'>
					<head>
						<title>MyCode</title>
						<meta charset='UTF-8'/>
						<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
					</head>
					<body>
						<h1>MyCode</h1>
						<div>";
						if($n==1){
							//codificar
							for($i=0;$i<$num;$i++)
								$res[$i]=$cod[$cd[$i]];
							$code=implode($res);
							echo "<h1>Palabra codificada:".$code."</h1>";
							//inversa
							for($i=0;$i<$num;$i++)
								$r[$i]=$cod[$res[$i]];
							$icode=implode($r);
							echo "<h1>Tu palabra era:".$icode."</h1><button><a href='../templates/inicio.html'>Inicio</a></button>";
						}
						else
							echo"<form method='POST' action='prac2.php'>
								<label>Palabra a codificar:</label>
								<input type='text' name='plbr'  maxlength='10'>
								<input type='submit' name='enviar'/>
							</form>";
echo					"</div>
					</body>
				</html>";
?>