<?php
	class vistadocente{
		function getMenuDocenteFinal($periodo,$solicitudes){
			$msg = "<ul>";
        	foreach ($periodo as $row) {
        		$msg.="<li><a href=# onclick='getasesorados(".$row['id_asesor'].")'>".$row['Vnombre_cg']."</a></li>";
        	}					
      		$msg.="</ul>";
      		return $msg;
		}
		function getAsesoradosFinal($regs){
		       $menuSrtm = 120;
      $msg = "
          
         <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/datatables.min.css'/>
         <script type='text/javascript' src='../js/datatable/aoi/datatables.min.js'></script>
          
          <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/Responsive-2.2.0/css/responsive.dataTables.css'/>
         <script type='text/javascript' src='../js/datatable/aoi/Responsive-2.2.0/js/dataTables.responsive.js'></script>
         
         <h3>Alumnos en periodo</h3>
      <div id='componentes'></div>
      <div class='nulds'>
      <table id='regs' class='responsive-table'>
      <thead>
        <tr>
          <th>Matricula</th>
          <th>Nombre</th>
          <th>Telefono Celular</th>
          <th>Telefono Hogar</th>
          <th>Email</th>
          <th>Genero</th>
	  <th>ver</th>
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
		     <a href='#' id='tol".$menuSrtm."ss' class='btn waves-effect waves-light indigo tooltipped' onclick='ver_avances_alumno(".$row['id_alumno'].");' data-position='left' data-delay='50' data-tooltip='Ver data el usuario'>Ver</a> </td>
                 <script>
                    	$(document).ready(function(){
			    
			    $('#tol".$menuSrtm."ss').tooltip({delay: 50});
                        });
                  </script>
                  <script>
                  $('.dropdown".$menuSrtm."').dropdown();
                  </script>
              </tr>";
        $menuSrtm = $menuSrtm + 1;
      }
      $msg.='</tbody><table></div>
      <script>
       $(document).ready(function() {
          $("#regs").DataTable({
    responsive: true
});
        });
      </script>
      ';
      return $msg;
    }
    function getAsesoradosDocumentoFinal($regs){
      return var_dump($regs);
    }
    function getSolicitudes($arrData){
      		       $menuSrtm = 120;
      $msg = "
          
         <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/datatables.min.css'/>
         <script type='text/javascript' src='../js/datatable/aoi/datatables.min.js'></script>
          
          <link rel='stylesheet' type='text/css' href='../js/datatable/aoi/Responsive-2.2.0/css/responsive.dataTables.css'/>
         <script type='text/javascript' src='../js/datatable/aoi/Responsive-2.2.0/js/dataTables.responsive.js'></script>
         
         <h3>Solicitud en Periodo Actual</h3>
      <div id='componentes'></div>
      <div class='nulds'>
      <table id='regs' class='responsive-table'>
      <thead>
        <tr>
          <th>Matricula</th>
          <th>Nombre</th>
          <th>Telefono Celular</th>
          <th>Telefono Hogar</th>
          <th>Email</th>
          <th>Genero</th>
	  <th>Acciones</th>
        </tr>
      </thead><tbody>";
      foreach($arrData as $row){
        $msg.="<tr>
                  <td>".$row['VidentiQR_usuario']."</td>
                  <td>".$row['Vnombre_usuario']." ".$row['Vpaterno_usuario']." ".$row['Vmaterno_usuario']."</td>
                  <td>".$row['VtelefonoC_usuario']."</td>
                  <td>".$row['VtelefonoH_usuario']."</td>
                  <td>".$row['Vcorreo_usuario']."</td>
                  <td>".$row['Csexo_usuario']."</td>
                  <td>
		     <a href='#' id='tol".$menuSrtm."ss' class='btn waves-effect waves-light indigo tooltipped' onclick='eventosol(".$row['id_pa'].",1);' data-position='left' data-delay='50' data-tooltip='Aceptar al usuario en el periodo activo'>Aceptar</a>
		     <a href='#' id='tol".$menuSrtm."ss1' class='btn waves-effect waves-light indigo tooltipped' onclick='eventosol(".$row['id_pa'].",1);' data-position='left' data-delay='50' data-tooltip='Rechazar al usuario en el periodo activo'>Rechazar</a> </td>
		 <script>
                    	$(document).ready(function(){
			    
			    $('#tol".$menuSrtm."ss').tooltip({delay: 50});
			    $('#tol".$menuSrtm."ss1').tooltip({delay: 50});
                        });
                  </script>
                  <script>
                  $('.dropdown".$menuSrtm."').dropdown();
                  </script>
              </tr>";
        $menuSrtm = $menuSrtm + 1;
      }
      $msg.='</tbody><table></div>
      <script>
       $(document).ready(function() {
          $("#regs").DataTable({
    responsive: true
});
        });
      </script>
      ';
      return $msg;
    }
	}
?>