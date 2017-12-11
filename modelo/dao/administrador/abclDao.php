<?php
	class adminABC{
		static function sqlGetDataAdmCall(){
			return "SELECT getusuario(?) as tipo;";
		}
		static function sqlGetStatusCall(){
			return "SELECT getusuarioestado(?) as estado;";
		}
		static function sqlGetData(){
			return "SELECT * FROM getdatausuario WHERE VidentiQR_usuario = ?;";
		}
		static function sqlGetAsesorData(){
			return "SELECT * FROM getdocentes WHERE id_cg = ?;";
		}
		static function sqlGetAlumnoData(){
			return "SELECT * FROM getalumno WHERE id_cg = ?;";
		}
		static function sqlGetEspecialidad(){
			return "SELECT * FROM getespecialidad;";
		}
		static function sqlGetGeneracion(){
			return "SELECT * FROM getperiodo;";
		}
		static function sqlSetUsuario(){
		    return 'SELECT addusuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) as statusreg;';
		    // SELECT addusuario('2512STR', 'Eleuterio', 'Mendoza', 'Sandivar', 'sandivar@gmaiol.com', '551240006235', '2563256', 1, 1, 'M', 3, 0);
		}
      	static function sqlGetAdminData(){
          return "SELECT * FROM getdataadmin;";
        }
      	static function sqlSetGeneracionN(){
          return "SELECT * isperiodo_acc;";
        }
	}
?>
