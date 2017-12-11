<?php
	class sqlPartDoc{
		static function SqlGetPeriodos(){
			return 'SELECT * FROM getperiododocenteis WHERE VidentiQR_usuario = ?';
		}
		static function SqlGetSolicitudes(){
			return 'Enrique va a hacer esta parte';
		}
	}
?>