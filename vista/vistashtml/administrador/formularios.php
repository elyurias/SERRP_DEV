<?php
	class accFormularios{
	    public function getMsgEstadoRegistro($datareg){
            $t = "";
            switch($datareg['statusreg']){
                case 1:
                    $t.="Asesor registrado<script>
                    
                    getTablaDataJS(1);</script>";
                break;
                case 2:
                    $t.="Alumno registrado<script>
                    
getTablaDataJS(2);</script>";
                break;
                case 3:
                    $t.="Este ID para QR ya esta registrado";
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
          	$tituloT = "";
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
		    switch($nivel){
		        case 1:
		            // registrar
              		$Accion = "<button id='reg' class='btn waves-effect waves-light right submit' type='submit' name='action'>Registrar</button><br>";
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
              		$tituloDesc = "<h4>Registrar nuevo ".$mmo."</h4><h5>El registro de nuevos usuarios solo afecta al periodo actual activo, el registro es automatico</h5>";
		        break;
		        case 2:
		            // actualizar
              		$Accion = "<button id='reg' class='btn waves-effect waves-light right submit' type='submit' name='action'>Actualizar</button><br>";
              		$DNIF = $data[0]['VidentiQR_usuario'];
          			$nombreF = $data[0]['Vnombre_usuario'];
          			$paternoF = $data[0]['Vpaterno_usuario'];
          			$maternoF = $data[0]['Vmaterno_usuario'];
          			$emailF = $data[0]['Vcorreo_usuario'];
          			$tel1F = $data[0]['VtelefonoC_usuario'];
          			$tel2F = $data[0]['VtelefonoH_usuario'];
          			$especialidadF = $data[0]['id_especialidad'];
          			$sexoF = $data[0]['Csexo_usuario'];
          			$estadoF = $data[0]['Iestado_usuario'];
				$herrmatico = "actualizar";
				$cadenaConfDNI = "<div class='col s12 m3 l3 xl3'>
						<div class='card-panel hoverable'>
							<label>ID: ".$DNIF."</label> 
							<input type='hidden' name='id' value='".$DNIF."' required>
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
              		$cadenaConfSex = "
                    	<script>
                        	$(document).ready(function() {
    							Materialize.updateTextFields();
  							});
                        </script>
                    	<div class='col s12 m6 l6 xl6' required>
                        <label for='sexo'>Sexo *</label>
                            <select class='error browser-default' id='sexo' name='sexo' data-error='.errorTxt63' required>
                            <option value='M' ".$req_d.">Masculino</option>
                            <option value='F' ".$req_f.">Femenino</option>
                            </select>
                            <div class='input-field'>
                               <div class='errorTxt63'></div>
                            </div>
                    </div>";
                $herramientaE = '';
              	$tituloDesc = "<h4>Actualizar usuario: ".$mmo."</h4><h5></h5>";
		$req_d = '';
              	$req_f = '';
              	if($estadoF == 1){
                      $req_d ="selected";
                }else{
                      $req_f ="selected";
                }
              	$cadenaConfEst = "<div class='col s12 m12 l12 xl12'>
                        <label for='estado'>Estado del usuario</label>
                            <select class='error browser-default' id='estado' name='estado' data-error='.errorTxt7' required>
                                <option value='1' $req_d >Activo</option>
                                <option value='0' $req_f >Inactivo</option>
                            </select>
                            <div class='input-field'>
                                <div class='errorTxt7'></div>
                            </div>
                    </div>";
                if($tipo==1)
                {
		  $cadenaConfEst = "";
                }    
		break;
		    }
          $rmb = "";
              		$cadenaConfEsp = "<div class='col s12 m6 l6 xl6' required>
                        <label for='idesp'>Especialidad</label>
                            <select class='error browser-default' id='idesp' name='idesp' data-error='.errorTxt8' required>
                          ";
            				foreach($especialidad as $row){
                              	$mensajeDir = '';
                              	if(sizeof($data) > 0){
                                  if($data['id_especialidad'] == $row['id_especialidad']){
                                    $mensajeDir = 'selected';
                                  }
                                }
                				$rmb.="
                     					<option value='".$row['id_especialidad']."' ".$mensajeDir.">".$row['Vnombre_especialidad']."</option>
                				";
            				}
            		$rmb.="
                        </select>
                         <div class='input-field'>
                                <div class='errorTxt8'></div>
                         </div>
                    </div>";
              		$cadenaConfEsp.=$rmb;
		    $msg = "
		    <div id='modal3".$nivel."' class='modal'>
    <div class='modal-content'>
			".$tituloDesc."
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
                            <input id='telc' name='telc' type='number' value='".$tel1F."' data-error='.errorTxt5' required>
                            <div class='errorTxt5'></div>
						</div>
					</div>
					<div class='col s12 m6 l3 xl3'>
						<div class='input-field'>
							<label for='telh'>Telefono casa</label>
                            <input id='telh' name='telh' type='number' value='".$tel2F."' data-error='.errorTxt6' required>
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
		    var onModalHide = function() {
			limpiarCamposHTML('#forms_d');
		    };
		    $('#modal3".$nivel."').modal({
		      complete : onModalHide
		    });
		    $('#modal3".$nivel."').modal('open');
		    </script>
		    ";
		    return $msg;
		}
		public function getSelectGenData($arrayData){
          	$tituloRMS = '';
		    $msg = "<div class='container'><h5>Lista de generacion</h5><select id=idgen onchange='getTablaDataJS(datav,3);'>
                    ";
                 foreach($arrayData as $row){
                    $mojon = "";
                    if($row['Iestado_cg']==1){
                        $tituloRMS = 'Período activo'; 
                      	$mojon = "selected";
                    }
         $msg.="<option value=".$row['id_cg']." ".$mojon.">".$row['Vnombre_cg']." -- ".$tituloRMS."</option>";
      }
      $msg.="
      </select></div>
      <script>
        $('#idgen').material_select();
      </script>";
      return $msg;
		}
		public function getFormModLimitAsesorados($limitAsesorado,$ID_asesor,$texto){
		$msg = <<<CADENA_CONSTRUCT
		<div id='modal1ModLimit' class='modal modal-fix-footer'>
		  <div class='modal-content'>
		    <h5>
		      Actualizar numero l&iacute;mite de asesorados para el asesor con el ID de registro en el periodo seleccionado: $ID_asesor 
		    </h5>
		    <form id='formMaxLimit'>
		    $texto
		    <p>
			<div>
			  <div class='input-field'>
			    <label for='maxlimit'>Limite de asesorados</label>
			      <input id='maxlimit' name='maxlimit' type='number' value='$limitAsesorado' data-error='.errorTxtLog' required>
			      <div class='errorTxtLog'></div>
			  </div>
			</div>
			<input type='hidden' name='id_asesor' value='$ID_asesor' required>
			<input type='hidden' name='accion' value='actualizarlimite' required>
		       <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar<i class="material-icons right">send</i></button>
		     </form>
		    </p>
		    </div>
		    <script src='../js/administrador/form.js' charset='UTF-8'>
		    </script>
		</div>
CADENA_CONSTRUCT;
		return $msg;
		}
		public function getTablaGeneracion($regs){
		$msg ="
          <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/datatables.min.css'/>
          <script type='text/javascript' src='../js/datatable/aoi/datatables.min.js'></script>
      <h5>Periodos de Residencias Profesionales</h5>
      <button id='regnuevoperiodo' class='btn waves-effect waves-light' onclick='dataClassDocente.getnuevoperiodo();' name='action'>Registrar nuevo periodo</button>
         <table id='regs'  class='display nowrap' width='100%'>
      <thead>
        <tr>
          <th>Periodo</th>
          <th>Fecha de inicio de registro</th>
          <th>Fecha de fin de registro</th>
          <th>Estado del periodo</th>
        </tr>
      </thead><tbody>
";
      foreach($regs as $row){
	$statusreg = $row['Iestado_cg']==1?"blue white-text'>Activo":"green white-text'>Finalizado";
        $msg.="
	      <tr>
                  <td>".$row['Vnombre_cg']."</td>
                  <td>".$row['Dfecha_inicio']."</td>
                  <td>".$row['Dfecha_fin']."</td>
                  <td class='".$statusreg."</td>
              </tr>";
      }
      $msg.="
      </tbody><table>
       <script>
      $(document).ready(function() {
          $('#regs').DataTable(
	    {
	      responsive: true,
	      'language': {
		    'url': '../js/datatable/lang.json'
	      },'order': [[ 0, 'desc' ]]
	    }
          );
        });
      </script>";
      return $msg;
		}
	public function getformregistrarperiodo(){
	$msg = <<<CADENA_CONSTRUCT
		<div id='modaldatalibgenreg' class='modal modal-fix-footer'>
		  <div class='modal-content'>
		    <h5>
		      Registrar nuevo periodo de Residencias Profesionales
		    </h5>
		    <form id='formregperiodo' onsubmit='return false;'>
		    <p>
		      El registro del nuevo periodo de Residencias Profesionales, cerrara el periodo de residencias anterior y actualizara el sistema en funcion al nuevo periodo a registrar
			<div>
			 <div class='input-field'>
			    <label for='nombre_periodo'>Nombre de periodo</label>
			      <input id='nombre_periodo' name='nombre_periodo' type='text' data-error='.errorTxtLog1' required>
			      <div class='errorTxtLog1'></div>
			  </div>
			  <div class=''>
			    <label for='fechauno'>Inicio de registro</label>
			      <input id='fechauno' name='fechauno' type='date' data-error='.errorTxtLog2' required>
			      <div class='errorTxtLog2'></div>
			  </div>
			   <div class=''>
			    <label for='fechados'>Fin de registro de periodo</label>
			      <input id='fechados' name='fechados' type='date' data-error='.errorTxtLog3' required>
			      <div class='errorTxtLog3'></div>
			  </div>
			</div>
			<input type='hidden' name='accion' value='registrarnuevoperiododerepo' required>
		       <button class="btn waves-effect waves-light" type="submit" name="action">Registrar<i class="material-icons right">send</i></button>
		     </form>
		    </p>
		    </div>
		    <script>
                    $(document).ready(function() {
			var d = new Date();
			var n = d.toISOString();
			var s = n.substring(0,5);
			$('#nombre_periodo').val(s);
		    });
                    </script>
		    <script>
		    var onModalHide = function() {
			limpiarCamposHTML('#msgtosTres');
		    };
		    $('#modaldatalibgenreg').modal({
		      complete : onModalHide
		    });
		    $('#modaldatalibgenreg').modal('open');
		    </script>
		    <script src='../js/administrador/formvalid.js' charset='UTF-8'>
		    </script>
		</div>
CADENA_CONSTRUCT;
		return $msg;
	}
}
?>
