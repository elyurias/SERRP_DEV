<?php
  class getContenidoAdmin{
    public function getAsesorD($regs){
	  $menuSrtm = 1;
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
          <th>Periodos</th>
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
                  <td>".$row['periodos_regs']."</td>
                  <td>".$row['id_usuario']."</td>
                  <td>".$row['Vnombre_usuario']." ".$row['Vpaterno_usuario']." ".$row['Vmaterno_usuario']."</td>
                  <td>".$row['VtelefonoC_usuario']."</td>
                  <td>".$row['VtelefonoH_usuario']."</td>
                  <td>".$row['Vcorreo_usuario']."</td>
                  <td>".$row['Csexo_usuario']."</td>
                  <td>
					<a href='#' class='btn waves-effect waves-teal' onclick='qrData(".$row['id_usuario'].");'>Crear QR</a>
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
					<a href='#' class='btn waves-effect waves-teal' onclick='qrData(".$row['id_usuario'].");'>Crear QR</a>
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
?>