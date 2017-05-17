<?php
	//Tabla de Vigenere 
	$n=0;
	$res=array();
	$letra=array('a'=>0,'b'=>1,'c'=>2,'d'=>3,'e'=>4,'f'=>5,'g'=>6,'h'=>7,'i'=>8,'j'=>9,'k'=>10,'l'=>11,'m'=>12,'n'=>13,'o'=>14,'p'=>15,'q'=>16,'r'=>17,'s'=>18,'t'=>19,'u'=>20,'v'=>21,'w'=>22,'x'=>23,'y'=>24,'z'=>25,'a'=>26);
	$nu=array('a','b','c','d','e','f','g','h','i','j','k','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	if(isset($_POST['enviar'])){
		$pb=$_POST['pb'];
		$cn1=preg_match('/^[a-z]{1,}$/',$pb);
		$n=$cn1==0?0:1;
	}
	else
		echo "<!DOCTYPE html>
					<html lang='es'>
						<head>
							<title>Vigenere</title>
							<meta charset='UTF-8'/>
							<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
						</head>
						<body>
							<h1>Tabla de Vigenere</h1>
							<div>";
							if($n==1){
								$pb=str_split($pb);
								//cifrado
								$num=count($pb);
								for($i=0;$i<$num;$i++){
									$r=($letra[$pb[$i]]+$letra[$nu[$i]])%26;
									$res[$i]=$nu[$r];
								}
								$res1=implode($res);
								for($i=0;$i<$num;$i++){
									$val=$letra[$res[$i]]-$letra[$nu[$i]];
									if($val>=0)
										$r=$val%26;
									else
										$r=($val+26)%26;
									$res[$i]=$nu[$r];
								}
								$res2=implode($res);
								echo "<h1>Cifrado: ".$res1."<br/> Inversa:".$res2."</h1><button><a href='../templates/inicio.html'>Inicio</a></button>";
							}
							else
								echo"<form method='POST' action='vigenere.php'>
									<label>Palabra:</label>
									<input type='text' name='pb'>
									<input type='submit' name='enviar'/>
								</form>";
			echo        "</div>
						</body>
					</html>";
?>