<?php
	$n=0;
	$val=0;
	$cont=0;
	$us='';
	$op='';
	$i=0;
	if(isset($_POST['enviar'])){
		if(isset($_POST['op']))
			$op=$_POST['op'];
		else
			echo "<h1>NO seleccionaste una opción</h1>";
		$us=$_POST['us'];
		$pb=$_POST['pb'];
		$conn=mysqli_connect("localhost","root","","usuarios");
		$us=mysqli_real_escape_string($conn,$us);
		$pb=mysqli_real_escape_string($conn,$pb);
		if($conn)
		{
			if($op=='in'){
				$query='SELECT * FROM datos where nom like"'.$us.'"';
				$res=mysqli_query($conn,$query);
				$fila=mysqli_fetch_assoc($res);
				$pb=strrev($pb);
				$ct=strlen($pb)-1;
				$pb=substr($pb,1,$ct);
				if($fila["nom"]==$us && $fila["ctr"]==$pb){
					$val=1;
					echo "Click para continuar en la imagen<br/>
							<a href='../templates/inicio.html'><img src='../resources/continuar.jpg'/></a>";
				}
				else 
					echo"NO te has registrado o algun dato no es correcto";
			}
			else{
				if($op=='rg'){
					$pass=preg_match('/^(?=.*[A-ZÑ]{1}).*(?=.*[a-zñ]{1}).*(?=.*\W{1}).*(?=.*\d{1}).{8,}$/',$pb);
					$val1=$pass==0?0:1;
					$query='SELECT * FROM datos where nom like"'.$us.'"';
					$res=mysqli_query($conn,$query);
					$fila=mysqli_fetch_assoc($res);
					$val2=$fila["nom"]==$us?0:1;
					$val=($val1+$val2)/2;
					if($val==1){
						$pb=strrev($pb);
						$ct=strlen($pb)-1;
						$pb=substr($pb,1,$ct);
						$query='insert into datos values("'.$us.'","'.$pb.'")';
						mysqli_query($conn,$query);
						echo "<br/><h1>Registro exitoso</h1><button><a href='../programs/resgistro.php'>Inicio</a></button>";
					}
					else
						echo "La contraseña debe tener 8 caracteres min. que incluyan una mayúscula,minúscula,dígito y carácter especial o el nombre de usuario ya esta ocupado";
				}
			}						
		}
		$n=1;
		$i=1;
	}
	echo "<!DOCTYPE html>
					<html lang='es'>
						<head>
							<title>Ingresar</title>
							<meta charset='UTF-8'/>
							<link rel='stylesheet' type='text/css' href='../styles/registro.css'/>
						</head>
						<body>
							<form method='POST' action='resgistro.php'>";
							if($val!=1)
								echo "<div class='dta'>
								<h2>Selecciona una opcion de abajo</h2>
								<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUsuario:</label>
								<textarea name='us' rows='1' cols='20' maxlength='9'/>".$us."</textarea>
								<label>Contraseña:</label>
								<input type='password' name='pb' maxlength='16'>
								<input type='submit' name='enviar'/>
								</div>";
							if($val!=1)
								echo"<table>
										<tr>
											<td><input type='radio' name='op' value='in'>Ingresar</td>
											<td><input type='radio' name='op' value='rg'>Registrar</td>
										</tr>
										<tr>
											<td class='im'><img src='../resources/ingresa.png'/></td>
											<td class='im'><img src='../resources/registrar.png'/></td>
										</tr>
									</table>";
		echo				"</form>
						</body>
					</html>";
?>