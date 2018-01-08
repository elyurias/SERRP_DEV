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
			return "SELECT * FROM getperiodo order by(Vnombre_cg);";
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
          return "SELECT mod_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?) as statusActualiza;";
        } 
        static function sqlGetPeriodoActivo(){
	  return "SELECT get_periodo_actual() as periodoActivo;";
        }
        static function sqlGetSolProfesor($opciones){
	  return "SELECT * FROM get_profesores_solicitados ".$opciones.";";
        }
        static function sqlGetFinProfesor($opciones){
	  return "SELECT * FROM get_profesores_alm_finaliza ".$opciones.";";
        }
        
        
        
        static function sqlGetFin4MesProfesor(){
	  return "SELECT * FROM get_alumnos_y_docentes_4_meses_finalizado;";
        }
        static function sqlGetFin6MesProfesor(){
	  return "SELECT * FROM get_alumnos_y_docentes_6_meses_finalizado;";
        }
        
        static function sqlGetFin4MesProfesorMasculino(){
	  return "SELECT * FROM get_alumnos_y_docentes_4_meses_finalizado_Masculino;";
        }
        static function sqlGetFin4MesProfesorFemenino(){
	  return "SELECT * FROM get_alumnos_y_docentes_4_meses_finalizado_Femenino;";
        }
        
        static function sqlGetFin6MesProfesorMasculino(){
	  return "SELECT * FROM get_alumnos_y_docentes_6_meses_finalizado_Masculino;";
        }
        static function sqlGetFin6MesProfesorFemenino(){
	  return "SELECT * FROM get_alumnos_y_docentes_6_meses_finalizado_Femenino;";
        }
        static function sqlGetNoFin(){
	  return "SELECT * FROM get_no_finalizo_data;";
        }
        static function sqlGetNoFinFemenino(){
	  return "SELECT * FROM get_no_finalizo_data_masculino;";
        }
        static function sqlGetNoFinMasculino(){
	  return "SELECT * FROM get_no_finalizo_data_femenino;";
        }
        static function sqlSetLimitUser(){
	  return "SELECT add_upd_periodo_actual_asesor(?, ?, ?, ?) as statusActualiza;";
        }
        static function sqlGetDocentePeriodo(){
	  return "SELECT docente_periodo_actual(?) as statusActualiza;";
        }
        static function sqlGetAlumnoPeriodo(){
	  return "SELECT alumno_periodo_actual(?) as statusActualiza;";
        }
    }
?>
