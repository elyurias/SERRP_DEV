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
        $msg.="<tr>
                  <td>".$row['id_usuario']."</td>
                  <td>".$row['Vnombre_usuario']." ".$row['Vpaterno_usuario']." ".$row['Vmaterno_usuario']."</td>
                  <td>".$row['VtelefonoC_usuario']."</td>
                  <td>".$row['VtelefonoH_usuario']."</td>
                  <td>".$row['Vcorreo_usuario']."</td>
                  <td>".$row['Csexo_usuario']."</td>
                  <td>
                  	<a href='#' id='tol".$menuSrtm."ss' class='btn-floating tooltipped btn-large waves-effect waves-light' onclick='qrData(".$row['id_usuario'].");' data-position='left' data-delay='50' data-tooltip='Crear codigo QR de acceso'>QR</a>
   				  	<script>
                    	$(document).ready(function(){
                        	$('#tol".$menuSrtm."ss').tooltip({delay: 50});
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
   				  	<script>
                    	$(document).ready(function(){
                        	$('#tol".$menuSrtm."ss').tooltip({delay: 50});
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
   				  	<script>
                    	$(document).ready(function(){
                        	$('#tol".$menuSrtm."ss').tooltip({delay: 50});
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
  }
/*

set global event_scheduler=ON;
Documentacion

						<div style='position: relative;'>
                        <div class='fixed-action-btn horizontal' style='display: inline-block; right: 19px;'>
                          <a class='btn-floating btn-large'>
                            <i class='mdi-social-notifications-none'></i>
                          </a>
                          <ul>
                          <li><a class='btn-floating red'><i class='large mdi-editor-insert-chart'></i></a>
                          </li>
                          <li><a class='btn-floating yellow darken-1'><i class='large mdi-editor-format-quote'></i></a>
                          </li>
                          <li><a class='btn-floating green'><i class='large mdi-editor-publish'></i></a>
                          </li>
                          <li><a class='btn-floating blue'><i class='large mdi-editor-attach-file'></i></a>
                          </li>
                          </ul>
                        </div>*/
?>