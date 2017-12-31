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
        }
      	static function sqlGetAdminData(){
          return "SELECT * FROM getdataadmin;";
        }
      	static function sqlSetGeneracionN(){
          return "SELECT * isperiodo_acc;";
        }
      	static function sqlSetDataUsuarioMod(){
          return "SELECT mod_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?) as statusActualiza;";
        } 
        static function sqlGetPeriodoActivo(){
	  return "SELECT get_periodo_actual() as periodoActivo;";
        }
	}
?>
