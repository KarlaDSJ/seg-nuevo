<?php
$n=0;
$eqv=array('0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15,'G'=>16,'H'=>17,'I'=>18,'J'=>19,'K'=>20,'L'=>21,'M'=>22,'Ñ'=>23,'N'=>24,'O'=>25,'P'=>26,'Q'=>27,'R'=>28,'S'=>29,'T'=>30,'U'=>31,'V'=>32,'W'=>33,'X'=>34,'Y'=>35,'Z'=>36);
	include("funciones.php");
	$a=0;
	$m=0;
	if(isset($_POST['enviar'])){
	//obtener curp
		$curp=array();
		$nom=$_POST['nom'];
		$fechnac=$_POST['fechnac'];
		$sexo=$_POST['sexo'];
		$ln=$_POST['ln'];
		$seg=explode(' ',$nom);
		$prap=$seg[0];
		$sgap=$seg[1];
		$prnom=$seg[2];
		$prap=str_split($prap);
		$sgap=str_split($sgap);
		$prnom=str_split($prnom);
		$curp[0]=extrae($seg[0],0,2);
		$curp[1]=extrae($seg[1],0,1);
		$curp[2]=extrae($seg[2],0,1);
		$curp[3]=extrae($fechnac,2,2);
		$curp[4]=extrae($fechnac,5,2);
		$curp[5]=extrae($fechnac,8,2);
		$curp[6]=extrae($sexo,0,1);
		$curp[7]=$ln;
		$apll=conso($prap);
		$curp[8]=$apll;
		$apll1=conso($sgap);
		$curp[9]=$apll1;
		$apll2=conso($prnom);
		$curp[10]=$apll2;
		$año=extrae($fechnac,0,4);
		$curp[11]=$año<2000?0:"A";
		$curp1=implode($curp);
		$curp1=strtoupper($curp1);
		$curp1=str_split($curp1);
		//clave unica
		for($i=18;$i>=3;$i--){
			$a=$a+$i*$eqv[$curp1[$m]];
			$m++;
		}
		if($curp[11]=="A"){
			$r=mod($a,10);
			$curp1[17]=mod(10-$r,10);
		}
		else{
			$r=mod(10-$a,10);
			$curp1[17]=mod(10-$r,10);
		}
		$curp1=implode($curp1);
		$n=1;
	}
		$estados=array('as'=>'AGUASCALIENTES','bc'=>'BAJA CALIFORNIA','bs'=>'BAJA CALIFORNIA SUR','cc'=>'CAMPECHE','cl'=>'COAHUILA','cm'=>'COLIMA','cs'=>'CHIAPAS','ch'=>'CHIHUAHUA','df'=>'DISTRITO FEDERAL','dg'=>'DURANGO','gt'=>'GUANAJUATO','gr'=>'GUERRERO','hg'=>'HIDALGO','jc'=>'JALISCO','mc'=>'MÉXICO','mn'=>'MICHOACÁN','ms'=>'MORELOS','nt'=>'NAYARIT','nl'=>'NUEVO LEÓN','oc'=>'OAXACA','pl'=>'PUEBLA','qt'=>'QUERÉTARO','qr'=>'QUINTANA ROO','sp'=>'SAN LUIS POTOSÍ','sl'=>'SINALOA','sr'=>'SONORA','tc'=>'TABASCO','ts'=>'TAMAULIPAS','tl'=>'TLAXCALA','vz'=>'VERACRUZ','yn'=>'YUCATÁN','zs'=>'ZACATECAS');
		echo "<!DOCTYPE html>
				<html lang='es'>
					<head>
						<title>CURP</title>
						<meta charset='UTF-8'/>
						<link rel='stylesheet' type='text/css' href='../styles/stilo.css'/>
					</head>
				<body>
					<h1>CURP con clave unica</h1>
					<div>";
					if($n==1)
						echo "<h1>".$curp1."</h1><br/><button><a href='../templates/inicio.html'>Inicio</a></button>";
					else{
						echo"	<form method='POST' action='valcurp.php'>
							<fieldset>
								<legend>Datos personales</legend>
								<label>Nombre:</label>
								<input type='text' name='nom' size='40' maxlength='40' placeholder='Apellido Paterno, Apellido Materno y Nombre(s)'/>
								<br/><label>Fecha de nacimiento:</label>
								<input type='date' name='fechnac'/>
								<br/><label>Sexo:</label>
								<label class='diferente'>Hombre</label>
								<input type='radio' name='sexo' class='diferente' value='hombre'/>
								<label class='diferente' >Mujer</label>
								<input type='radio' name='sexo'  class='diferente' value='mujer'/><br/>
								<label>Lugar de Nacimiento:</label>
									<select name='ln'>";
									foreach($estados as $es=>$es1)
										echo "<option value='".$es."'>".$es1."</option>";			
									echo "</select>
								<br/><input type='submit' class='diferente' name='enviar'/>
								<input type='submit' class='diferente' value='Borrar datos'/>
							</fieldset>
							</form>";
					}
echo			"</div>
				</body>
			</html>";
?>