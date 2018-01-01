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
    <script src = '../componentesJs/Chart.min.js'>
    </script>
    <form onsubmit='return false;' id='dataEstadistica'>
	<input type='hidden' name='accion' id='accion' value='Grafico' />
	<div class='row'>
	  <div class='col s12 m3'>
	  <select name='genero' id='genero'>
	    <option value="1">General</option>
	    <option value="2">Femenino</option>
	    <option value="3">Masculino</option>
	  </select>
	  <label>Genero</label>
	</div>
	<div class='col s12 m9'>
	<select name='campo' id='campo'>
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
	  $('#genero').material_select();
	  $('#campo').material_select();
	  graficoData();
	  $('#genero').change(function(){
	    graficoData();
	  });
	  $('#campo').change(function(){
	    graficoData();
	  });
	  
	});
      </script>
      <div id='graficocont'></div>
      </div>
    </form>
EOT;
return $data;
    }
    public function getInfoIntro(){
      $dataS = <<<EOT
      <h5>Residencia Profesional</h5>
      <p>Es una estrategia educativa con valor curricular que permite al estudiante, a&uacute;n 
      estando en proceso de formaci&oacute;n, incorporarse profesionalmente en el sector productivo 
      de bienes y/o servicios, a trav&eacute;s de la aplicaci&oacute;n pr&aacute;ctica de un modelo o el desarrollo de un proyecto
      definido de trabajo profesional, que le permitan convertir teor&iacute;as en pr&aacute;cticas y le proporcionen experiencia real,
      asesorado tanto por profesores del Tecnol&oacute;gico como por el personal de la Empresa o Instituci&oacute;n donde se desarrolle la Residencia.</p>
      <p>Beneficios que obtienen los alumnos con las Residencias Profesionales:</p>
      <p>
<li>Retroalimentar y desarrollar conocimientos al participar en un proceso de aprendizaje/trabajo en que se aplican los conocimientos a la vez que se adquieren experiencias</li>
<li>Interactuar con profesionistas experimentados de los que se va a aprender m&aacute;s.</li>
<li>Conocer y manejar tecnolog&iacute;a, m&eacute;todos, sistemas y procedimientos de trabajos actualizados y acordes con su profesi&oacute;n.</li>
<li>Ser un profesionista competitivo, identificado con la realidad y la problem&aacute;tica a la que se tendr&aacute; que enfrentar.</li>
<li>Disponer de una alternativa m&aacute;s para obtener el t&iacute;tulo profesional.</li>
      </p>
      <p>
      Requisitos para realizar las Residencias Profesionales:
<li>Haber aprobado el 80% de los cr&eacute;ditos de su carrera.</li>
<li>Estar inscrito actualmente en el Instituto Haber seleccionado su tema de proyecto y que &eacute;ste debidamente avalado por la academia.</li>
<li>Disponer de constancia de su situaci&oacute;n acad&eacute;mica emitida por el Departamento de Control Escolar.</li>
<legend>Nota: Es indispensable que la Academia autorice el Anteproyecto de lo contrario no podr&aacute;n iniciar las Residencias Profesionales.</legend>
      </p>
EOT;
      return $dataS;
    }
    public function getGraficoPSolicitud($modulo,$titulo){
      //return var_dump($modulo);
      
      $label = "[";
      $data = "[";
      for($i=0;$i<SIZEOF($modulo)-1;$i++) {
      	$label.= "'ID: ".$modulo[$i]['VidentiQR_usuario']." Nombre: ".$modulo[$i]['Vnombre_usuario']." ".$modulo[$i]['Vpaterno_usuario']."',";
	$data.= "'".$modulo[$i]['numSolicitud']."',";
      }
      $label.= "'".$modulo[$i]['Vnombre_usuario']." ".$modulo[$i]['Vpaterno_usuario']." ".$modulo[$i]['Vmaterno_usuario']."']";
      $data.= "'".$modulo[SIZEOF($modulo)-1]['numSolicitud']."']";
      $cadenalid = <<<EOT
<canvas id="ChartData" width="undefined" height="undefined"></canvas>
<script>
var ctx = document.getElementById("ChartData");
var ChartData = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: $label,
        datasets: [{
            label: '$titulo',
            data: $data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
EOT;
      return $cadenalid;
    }
  }
?>