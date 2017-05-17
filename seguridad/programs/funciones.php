<?php
	function mod($a,$b){
			if($a<0){
				if($b<0)
					$b=abs($b);
				$c=$a%$b;
				$d=$c+$b;
			}
			else
				$d=$a%$b;
			return $d;
		}
	 function extrae ($nom,$in,$fin)
	{
		$ex=substr($nom,$in,$fin);
		return $ex;
	}
	function conso ($ver=array())
	{
		$i=1;
		while($ver[$i]=='a' || $ver[$i]=='e' || $ver[$i]=='i' || $ver[$i]=='o' || $ver[$i]=='u')
			$i++;
		return $ver[$i];																												
	}
?>