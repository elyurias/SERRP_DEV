<?php
	class primervistaholamundo{
		function functionvistafinal($datos){
			$cad="<form name='formularioregistro' id='formularioregistro' onsubmit='return false;'>Nombre:	<input type='text' name='nombre' /><br>Edad:	<input type='text' name='edad' /><br><input type='submit' onclick='registrarformulario();' value='Registrar' /></form>";
			return $cad;
		}
		function functionvistafinaldos($datos){
			$cad="Juan Manuel 12 anos de edad";
			return $cad;
		}
	}
?>