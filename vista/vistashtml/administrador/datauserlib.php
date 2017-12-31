<?php
  class getContenidoAdmin{
    public function getAsesorD($regs){
      $menuSrtm = 120;
      $msg = "
          <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/datatables.min.css'/>
          <script type='text/javascript' src='../js/datatable/aoi/datatables.min.js'></script>
          <script src='../js/jqueryqrcode.js'></script>
      <h3>Docentes</h3>
      
	    <a href='#' onclick='getFormularioRegistro(2);' class='btn waves-effect waves-teal blue'>Nuevo usuario</a>

      
      <div id='componentes'></div>
      <table id='regs' class='mdl-data-table responsive-table' cellspacing='0'>
      <thead>
        <tr>
          <th>QR Identificador</th>
          <th>Nombre</th>
          <th>Telefono Celular</th>
          <th>Telefono Hogar</th>
          <th>Email</th>
          <th>Genero</th>
          <th>Acciones</th>
        </tr>
      </thead><tbody>";
      foreach($regs as $row){
	if($row['Iestado_usuario']==1){
	  $valueDim = '<a href="#" id="tol'.$menuSrtm.'ssUpds" class="btn-floating tooltipped btn-large waves-effect waves-light red" onclick="actualizaEstado('.$row[0]['VidentiQR_usuario'].')"  data-position="left" data-delay="50" data-tooltip="Modificar acceso">Denegar acceso</a>';
	}else{
	  $valueDim = '<a href="#" id="tol'.$menuSrtm.'ssUpds" class="btn-floating tooltipped btn-large waves-effect waves-light green" onclick="actualizaEstado('.$row[0]['VidentiQR_usuario'].')"  data-position="left" data-delay="50" data-tooltip="Modificar acceso">Permitir acceso</a>';
	}
        $msg.="<tr>
                  <td>".$row['id_usuario']."</td>
                  <td>".$row['Vnombre_usuario']." ".$row['Vpaterno_usuario']." ".$row['Vmaterno_usuario']."</td>
                  <td>".$row['VtelefonoC_usuario']."</td>
                  <td>".$row['VtelefonoH_usuario']."</td>
                  <td>".$row['Vcorreo_usuario']."</td>
                  <td>".$row['Csexo_usuario']."</td>
                  <td>
                  	<a href='#' id='tol".$menuSrtm."ss' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='qrData(".$row['id_usuario'].");' data-position='left' data-delay='50' data-tooltip='Crear codigo QR de acceso'>QR</a>
   				  	<a href='#' id='tol".$menuSrtm."ssUpd' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='getformModUser(".$row['VidentiQR_usuario'].",2)'  data-position='left' data-delay='50' data-tooltip='Modificar registro'>
                    	Modificar
                    </a>
                    ".$valueDim."
                    <script>
                    	$(document).ready(function(){
                        	$('#tol".$menuSrtm."ss').tooltip({delay: 50});
                            $('#tol".$menuSrtm."ssUpd').tooltip({delay: 50});
                            $('#tol".$menuSrtm."ssUpds').tooltip({delay: 50});
                        });
                    </script>
                  </td>
                  <script>
                  $('.dropdown".$menuSrtm."').dropdown();
                  </script>
              </tr>";
        $menuSrtm = $menuSrtm + 1;
      }
      $msg.='</tbody><table>
      <script>
        $(document).ready(function() {
          $("#regs").DataTable();
        });
      </script>
      ';
      return $msg;
    }
    public function getAlumnoD($regs){
      	  $menuSrtm = 1;
      $msg = "
          <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/datatables.min.css'/>
          <script type='text/javascript' src='../js/datatable/aoi/datatables.min.js'></script>
          <script src='../js/jqueryqrcode.js'></script>
      <h3>Alumnos</h3>
      <a href='#' onclick='getFormularioRegistro(3);' class='btn waves-effect waves-teal blue'>Nuevo usuario</a>
      <div id='componentes'></div>
      <table id='regs' class='mdl-data-table responsive-table' cellspacing='0'>
      <thead>
        <tr>
          <th>QR Identificador</th>
          <th>Nombre</th>
          <th>Telefono Celular</th>
          <th>Telefono Hogar</th>
          <th>Email</th>
          <th>Genero</th>
          <th>Acciones</th>
        </tr>
      </thead><tbody>";
      foreach($regs as $row){
        $msg.="<tr>
                  <td>".$row['id_usuario']."</td>
                  <td>".$row['Vnombre_usuario']." ".$row['Vpaterno_usuario']." ".$row['Vmaterno_usuario']."</td>
                  <td>".$row['VtelefonoC_usuario']."</td>
                  <td>".$row['VtelefonoH_usuario']."</td>
                  <td>".$row['Vcorreo_usuario']."</td>
                  <td>".$row['Csexo_usuario']."</td>
                  <td>
                  	<a href='#' id='tol".$menuSrtm."ss' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='qrData(".$row['id_usuario'].");' data-position='left' data-delay='50' data-tooltip='Crear codigo QR de acceso'>QR</a>
   				  	<a href='#' id='tol".$menuSrtm."ssUpd' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='getformModUser(".$row['VidentiQR_usuario'].",3)'  data-position='left' data-delay='50' data-tooltip='Modificar registro'>
                    	Modificar
                    </a>
                    <script>
                    	$(document).ready(function(){
                        	$('#tol".$menuSrtm."ss').tooltip({delay: 50});
                            $('#tol".$menuSrtm."ssUpd').tooltip({delay: 50});
                        });
                    </script>
                  </td>
              </tr>";$menuSrtm = $menuSrtm + 1;
      }
      $msg.='</tbody><table>
      <script>
        $(document).ready(function() {
          $("#regs").DataTable();
        });
      </script>
      ';
      return $msg;
    }
    public function getAdminD($regs){
      $menuSrtm = 1;
      $msg = "
          <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/datatables.min.css'/>
          <script type='text/javascript' src='../js/datatable/aoi/datatables.min.js'></script>
          <script src='../js/jqueryqrcode.js'></script>
      <h3>Administradores</h3>
      <a href='#' onclick='getFormularioRegistro(1);' class='btn waves-effect waves-teal blue'>Nuevo usuario</a>
      <div id='componentes'></div>
      <table id='regs' class='mdl-data-table responsive-table' cellspacing='0'>
      <thead>
        <tr>
          <th>QR Identificador</th>
          <th>Nombre</th>
          <th>Telefono Celular</th>
          <th>Telefono Hogar</th>
          <th>Email</th>
          <th>Genero</th>
          <th>Acciones</th>
        </tr>
      </thead><tbody>";
      foreach($regs as $row){
        $msg.="<tr>
                  <td>".$row['VidentiQR_usuario']."</td>
                  <td>".$row['Vnombre_usuario']." ".$row['Vpaterno_usuario']." ".$row['Vmaterno_usuario']."</td>
                  <td>".$row['VtelefonoC_usuario']."</td>
                  <td>".$row['VtelefonoH_usuario']."</td>
                  <td>".$row['Vcorreo_usuario']."</td>
                  <td>".$row['Csexo_usuario']."</td>
                  <td>
                  	<a href='#' id='tol".$menuSrtm."ss' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='qrData(".$row['id_usuario'].");' data-position='left' data-delay='50' data-tooltip='Crear codigo QR de acceso'>QR</a>
                    <a href='#' id='tol".$menuSrtm."ssUpd' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='getformModUser(".$row['VidentiQR_usuario'].",1)'  data-position='left' data-delay='50' data-tooltip='Modificar registro'>
                    	Modificar
                    </a>
                    <script>
                    	$(document).ready(function(){
                        	$('#tol".$menuSrtm."ss').tooltip({delay: 50});
                            $('#tol".$menuSrtm."ssUpd').tooltip({delay: 50});
                        });
                    </script>
                  </td>
              </tr>";$menuSrtm = $menuSrtm + 1;
      }
      $msg.='</tbody><table>
      <script>
        $(document).ready(function() {
          $("#regs").DataTable();
        });
      </script>
      ';
      return $msg;
    }
    public function getFormParamEstadistica(){    
$data = <<<EOT
    <form onsubmit='return false;' id='dataEstadistica'>
	<div class='row'>
	  <div class='col s12 m3'>
	  <select name='genero' id='gennero'>
	    <option value="1">General</option>
	    <option value="2">Femenino</option>
	    <option value="3">Masculino</option>
	  </select>
	  <label>Genero</label>
	</div>
	<div class='col s12 m9'>
	<select name='campo' id='datacampo'>
	    <option value="1">Alumnos [Finalizaron residencias profesionales 4 meses]</option>
	    <option value="2">Alumnos [Finalizaron residencias profesionales mas de 4 meses]</option>
	    <option value="3">Alumnos [No finalizaron residencias profesionales]</option>
	    <option value="4">Docentes [Mas solicitados]</option>
	    <option value="5">Docentes [Mas alumnos que finalizaron residencias]</option>
	  </select>
	  <label>Caracteristica</label>
	  </div>
      <script>
	$(document).ready(function(){
	  $('#gennero').material_select();
	  $('#datacampo').material_select();
	});
      </script>
      </div>
    </form>
EOT;
return $data;
    }
    public function getInfoIntro(){
      $dataS = <<<EOT
      <h5>Residencia Profesional</h5>
      <p>Es una estrategia educativa con valor curricular que permite al estudiante, a&uacute;n estando en proceso de formación, incorporarse profesionalmente en el sector productivo de bienes y/o servicios, a través de la aplicación práctica de un modelo o el desarrollo de un proyecto definido de trabajo profesional, que le permitan convertir teorías en prácticas y le proporcionen experiencia real, asesorado tanto por profesores del Tecnológico como por el personal de la Empresa o Institución donde se desarrolle la Residencia.</p>
      <p>Beneficios que obtienen los alumnos con las Residencias Profesionales:</p>
      <p>
<li>Retroalimentar y desarrollar conocimientos al participar en un proceso de aprendizaje/trabajo en que se aplican los conocimientos a la vez que se adquieren experiencias</li>
<li>Interactuar con profesionistas experimentados de los que se va a aprender más.</li>
<li>Conocer y manejar tecnología, métodos, sistemas y procedimientos de trabajos actualizados y acordes con su profesión.</li>
<li>Ser un profesionista competitivo, identificado con la realidad y la problemática a la que se tendrá que enfrentar.</li>
<li>Disponer de una alternativa más para obtener el título profesional.</li>
      </p>
      <p>
      Requisitos para realizar las Residencias Profesionales:
<li>Haber aprobado el 80% de los créditos de su carrera.</li>
<li>Estar inscrito actualmente en el Instituto Haber seleccionado su tema de proyecto y que éste debidamente avalado por la academia.</li>
<li>Disponer de constancia de su situación académica emitida por el Departamento de Control Escolar.</li>
<legend>Nota: Es indispensable que la Academia autorice el Anteproyecto de lo contrario no podrán iniciar las Residencias Profesionales.</legend>
      </p>
EOT;
      return $dataS;
    }
  }
?>