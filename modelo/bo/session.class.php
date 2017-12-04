<?php
	class session{
		public $dni;
		public $tipo;
		function __construct(){
			session_start();	
		}
		function setDNI($dni_us){
			$_SESSION['id'] = $dni_us;
		}
		function setTipo($tip_us){
		    $_SESSION['count'] = 1;
			$_SESSION['tipo'] = $tip_us;
		}
		function getDNI(){
			return $_SESSION['id'];
		}
		function getTipo(){
			return $_SESSION['tipo'];
		}
		function isSession(){
			if(isset($_SESSION['id'])){
				return True;
			}else{
				return False;
			}
		}
		function sessionDef(){
			session_destroy();
		}
		function limit_session_time(){
			return False;
		}
		function setInicio(){
		    $_SESSION['count'] = 2;
		}
	}
?>
