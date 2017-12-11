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
          	$cadenaConfDNI = "";
          	$cadenaConfEsp = "";
          	$cadenaConfSex = "";
            $cadenaConfEst = "";
		  $DNIF = "";
          $nombreF = "";
          $paternoF = "";
          $maternoF = "";
          $emailF = "";
          $tel1F = "";
          $tel2F = "";
          $especialidadF = "";
          $sexoF = "";
          $maxminF = "";
		    switch($nivel){
		        case 1:
		            // registrar
              		$Accion = "<button id='reg' class='btn waves-effect waves-light right submit' type='submit' onclick='registroUsuario()' name='action'>Registrar</button><br>":
		            $herrmatico = "registro";
              		$cadenaConfDNI = "<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
							<label for='id'>Id o Matricula</label>
                            <input id='id' name='id' type='number' data-error='.errorTxt22'  required>
                            <div class='errorTxt22'></div>
						</div>
					</div>";
          			$cadenaConfSex = "<div class='col s12 m6 l6 xl6' required>
                        <label for='sexo'>Sexo *</label>
                            <select class='error browser-default' id='sexo' name='sexo' data-error='.errorTxt63' required>
                            	<option value='F'>Femenino</option>
                                <option value='M'>Masculino</option>
                            </select>
                            <div class='input-field'>
                               <div class='errorTxt63'></div>
                            </div>
                    </div>";
           	 		$cadenaConfEst = "<div class='col s12 m6 l3 xl3'>
                        <label for='estado'>Estado inicial del usuario</label>
                            <select class='error browser-default' id='estado' name='estado' data-error='.errorTxt7' required>
                                <option value='1'>Activo</option>
                                <option value='0'>Inactivo</option>
                            </select>
                            <div class='input-field'>
                                <div class='errorTxt7'></div>
                            </div>
                    </div>";
              		$rmb = "";
              		$cadenaConfEsp = "<div class='col s12 m6 l6 xl6' required>
                        <label for='idesp'>Especialidad</label>
                            <select class='error browser-default' id='idesp' name='idesp' data-error='.errorTxt8' required>
                          ";
            				foreach($especialidad as $row){
                				$rmb.="
                     					<option value='".$row['id_especialidad']."'>".$row['Vnombre_especialidad']."</option>
                				";
            				}
            		$rmb.="
                        </select>
                         <div class='input-field'>
                                <div class='errorTxt8'></div>
                         </div>
                    </div>";
              		$cadenaConfEsp.=$rmb;
		        break;
		        case 2:
		            // actualizar
              		$DNIF = $data[0]['VidentiQR_usuario'];
          			$nombreF = $data[0]['Vnombre_usuario'];
          			$paternoF = $data[0]['Vpaterno_usuario'];
          			$maternoF = $data[0]['Vmaterno_usuario'];
          			$emailF = $data[0]['Vcorreo_usuario'];
          			$tel1F = $data[0]['VtelefonoC_usuario'];
          			$tel2F = $data[0]['VtelefonoH_usuario'];
          			$especialidadF = $data[0]['id_especialidad'];
          			$sexoF = $data[0]['Csexo_usuario'];
		            $herrmatico = "actualizar";
              		if($tipo == 2){
		                $maxminF = $data[0]['Ilimite_asesor'];
		            }
             		 $cadenaConfDNI = "<div class='col s12 m3 l3 xl3'>
						<div class='card-panel hoverable'>
							<label>ID: ".$DNIF."</label> 
                            <input type='hidden' name='id_usuario'>
						</div>
					</div>";
              		$req_d = '';
              		$req_f = '';
              		if($sexoF == 'M'){
                      $req_d ="selected";
                    }else{
                      $req_f ="selected";
                    }
              		$cadenaConfSex = "<div class='col s12 m6 l6 xl6' required>
                        <label for='sexo'>Sexo *</label>
                            <select class='error browser-default' id='sexo' name='sexo' data-error='.errorTxt63' required>
                            <option value='M' ".$req_d.">Masculino</option>
                            <option value='F' ".$req_f.">Femenino</option>
                            </select>
                            <div class='input-field'>
                               <div class='errorTxt63'></div>
                            </div>
                    </div>";
              	
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
							    <input type='number' id='maxmi' name='maxmi' value=".$maxminF." class='validate' required>
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
					".$cadenaConfDNI."
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
							<label for='nombre'>Nombre</label>
                            <input id='nombre' name='nombre' type='text' value='".$nombreF."' data-error='.errorTxt1'  required>
                            <div class='errorTxt1'></div>
						</div>
					</div>
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
							<label for='paterno'>Apellido paterno</label>
                            <input id='paterno' name='paterno' type='text' value='".$paternoF."' data-error='.errorTxt2' required>
                            <div class='errorTxt2'></div>
						</div>
					</div>
					<div class='col s12 m3 l3 xl3'>
						<div class='input-field'>
						    <label for='materno'>Apellido materno</label>
                            <input id='materno' name='materno' type='text' value='".$maternoF."' data-error='.errorTxt3' required>
                            <div class='errorTxt3'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='email'>Correo electronico</label>
                            <input id='email' name='email' type='text' value='".$emailF."' data-error='.errorTxt4' required>
                            <div class='errorTxt4'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='telc'>Telefono celular</label>
                            <input id='telc' name='telc' type='text' value='".$tel1F."' data-error='.errorTxt5' required>
                            <div class='errorTxt5'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='telh'>Telefono casa</label>
                            <input id='telh' name='telh' type='text' value='".$tel2F."' data-error='.errorTxt6' required>
                            <div class='errorTxt6'></div>
						</div>
					</div>
					".$cadenaConfEst."
                    <script>
                        $('#estado').material_select();
			        </script>
			        ".$cadenaConfEsp."
                    <script>
                        $('#idesp').material_select();
			        </script>
			        ".$cadenaConfSex."
			        ".$herramientaE."
			</div></div>
			 ".$Accion."
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
