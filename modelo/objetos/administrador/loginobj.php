<?php
	class admdata{
		var $DNI;
		var $tipo;
		var $nombre;
		var $paterno;
		var $materno;
		var $tel1;
		var $tel2;
		var $especialidad;
		var $sexo;
		var $estado;
		var $limite;
		var $email;
		private $data;
		public function __set($name, $value){
			$this->data[$name]=$value;
		}
		public function __get($name){
			if(array_key_exists($name, $this->data)){
				return $this->data[$name];
				return null;
			}
		}
	}
?>
