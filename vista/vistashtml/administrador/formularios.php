<?php
	class accFormularios{
	    public function getMsgEstadoRegistro($datareg){
            $t = "";
                         switch($datareg['statusreg']){
                case 1:
                    $t.="Asesor registrado<script>getTablaDataJS(1);</script>";
                break;
                case 2:
                    $t.="Alumno registrado<script>getTablaDataJS(2);</script>";
                break;
                case 3:
                    $t.="Este ID para QR esta registrado";
                break;
                case 4:
                    $t.="Administrador registrado<script>getTablaDataJS(3);</script>";
                break;
                case 10:
                    $t.="Semestre activo requerido para registrar nuevos usuarios";
                break;
            }
            $msg = '<div id="modalmer" class="modal">
    <div class="modal-content">
      <h4>Estado del registro</h4>
      <p>'.$t.'</p>
    </div>
    <div class="modal-footer">
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
    </div>
  </div>
  <script>
    $("#modalmer").modal();
    $("#modalmer").modal("open");
    $("#modal3").modal("close");
  </script>
  ';
            return $msg;
        }
		public function getRegistroUsuarioAdmn($nivel, $especialidad, $tipo, $data){
		    $mmo = "";
		    $herramientaE = "";
		    $herrmatico = "";
		    
		    switch($nivel){
		        case 1:
		            // registrar
		            $herrmatico = "registro";
		        break;
		        case 2:
		            // actualizar
		            $herrmatico = "actualizar";
		            if($tipo == 2){
		                
		            }
		        break;
		    }
		    switch($tipo){
		        case 1:
		            $mmo = "Administrador";
		            break;
		        case 2:
		            $mmo = "Docente";
		            $herramientaE = "
		                <div class='col s12 m12 l12 xl12' required>
						    <div class='input-field'>
							    <input type='number' id='maxmi' name='maxmi' class='validate' required>
							    <label for='maxmi' data-error='Se require un numero valido' data-success='Numero valido'>Limite de asesorados</label>
						    </div>
					    </div>
		            ";
		            break;
		        case 3:
		            $mmo = "Alumno";
		            break;
		    }
		    $msg = "
		    <div id='modal3' class='modal'>
    <div class='modal-content'>
      <h4>Registrar nuevo ".$mmo."</h4>
      <h5>El registro de nuevos usuarios solo afecta al periodo actual activo, el registro es automatico</h5>
		    <form action='#' method='POST' id='formValidate' onsubmit='return false;'>
			<div class='grid-container'>
				<input type='hidden' name='accion' value='".$herrmatico."' required>
				<input type='hidden' name='tipo' value='".$tipo."' required>
				<div class='row'>
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
							<label for='id'>Id o Matricula</label>
                            <input id='id' name='id' type='number' data-error='.errorTxt22'  required>
                            <div class='errorTxt22'></div>
						</div>
					</div>
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
							<label for='nombre'>Nombre</label>
                            <input id='nombre' name='nombre' type='text' data-error='.errorTxt1'  required>
                            <div class='errorTxt1'></div>
						</div>
					</div>
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
							<label for='paterno'>Apellido paterno</label>
                            <input id='paterno' name='paterno' type='text' data-error='.errorTxt2' required>
                            <div class='errorTxt2'></div>
						</div>
					</div>
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
						    <label for='materno'>Apellido materno</label>
                            <input id='materno' name='materno' type='text' data-error='.errorTxt3' required>
                            <div class='errorTxt3'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='email'>Correo electronico</label>
                            <input id='email' name='email' type='text' data-error='.errorTxt4' required>
                            <div class='errorTxt4'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='telc'>Telefono celular</label>
                            <input id='telc' name='telc' type='text' data-error='.errorTxt5' required>
                            <div class='errorTxt5'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='telh'>Telefono casa</label>
                            <input id='telh' name='telh' type='text' data-error='.errorTxt6' required>
                            <div class='errorTxt6'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
                        <label for='estado'>Estado inicial del usuario</label>
                            <select class='error browser-default' id='estado' name='estado' data-error='.errorTxt7' required>
                                <option value='1'>Activo</option>
                                <option value='0'>Inactivo</option>
                            </select>
                            <div class='input-field'>
                                <div class='errorTxt7'></div>
                            </div>
                    </div>
                    <script>
                        $('#estado').material_select();
			        </script>
			        <div class='col s12 m6 l6 xl6' required>
                        <label for='idesp'>Especialidad</label>
                            <select class='error browser-default' id='idesp' name='idesp' data-error='.errorTxt8' required>
                          ";
            foreach($especialidad as $row){
                $msg.="
                     <option value='".$row['id_especialidad']."'>".$row['Vnombre_especialidad']."</option>
                ";
            }
            $msg.="
                        </select>
                         <div class='input-field'>
                                <div class='errorTxt8'></div>
                         </div>
                    </div>
                    <script>
                        $('#idesp').material_select();
			        </script>
			        <div class='col s12 m6 l6 xl6' required>
                        <label for='sexo'>Sexo *</label>
                            <select class='error browser-default' id='sexo' name='sexo' data-error='.errorTxt63' required>
                            	<option value='F'>Femenino</option>
                                <option value='M'>Masculino</option>
                            </select>
                            <div class='input-field'>
                               <div class='errorTxt63'></div>
                            </div>
                    </div>
			        ".$herramientaE."
			</div></div>
			 <button id='reg' class='btn waves-effect waves-light right submit' type='submit' onclick='registroUsuario()' name='action'>Registrar</button><br>
    </div>
  </div>
		    </form>
		    <script src='../js/administrador/validform.js'></script>
		    <script>
		    $('#modal3').modal();
		    $('#modal3').modal('open');
		    </script>
		    ";
		    return $msg;
		}
		public function getSelectGenData($arrayData){
		    $msg = "<h5>Lista de generacion</h5><select id=idgen onchange='getTablaDataJS(datav,3);'>
                    ";
                 foreach($arrayData as $row){
                    $mojon = "";
                    if($row['Iestado_cg']==1){
                         $mojon = "selected";
                    }
         $msg.="<option value=".$row['id_cg']." ".$mojon.">".$row['Vnombre_cg']."</option>";
      }
      $msg.="
      </select>
      <script>
        $('#idgen').material_select();
      </script>";
      return $msg;
		}
	}
?>
