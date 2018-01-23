<?php
	class accVista{
		public function getEncabezado($data,$periodo){
		    $cadena = "NULL";
		    switch($data[0]['Itipo_usuario']){
		        case 1:
		            $cadena = "Administrador";
		        break;
		        case 2:
		            $cadena = "Docente";
		        break;
		        case 3:
		            $cadena = "Alumno";
		        break;
		    }
			$med = "
			<script src='../js/administrador/herramientasAdmin.js' charset='UTF-8'>
			</script>
			<style>
			  header {
			    padding-left: 300px;
			  }
			    main {
			      padding-left: 300px;
			  }
			  
			  @media only screen and (max-width : 1366px) {
			    #regs {
			      width: 1366px;
			    }
			  }
			  
			  @media only screen and (max-width : 992px) {
			    header, main, footer {
			      padding-left: 0;
			    }
			    #regs {
			      width: 992px;
			    }
			  }
			  
			  @media only screen and (max-width : 600px) {
			    #logoimagen{
			      hight:80%;
			      width:80%;
			    }
			  }
			  
			  nav a {
			    color: black;
			  }
			  			  
			  //.navdir:hover{
			  //  background-color: red;
			  //}
			</style>
			";
			
			$med.="
			<header>
			  <nav>
			     <div class='nav-wrapper white'>
			     <a href='#' data-activates='slide-out' class='button-collapse hide-on-large-only'><i class='material-icons'>menu</i></a>
				<a href=# class='brand-logo right'><img id='logoimagen' src='../img/teschalogo.ico' hight='85%' width='85%' onclick='getdataintro();'></a>
			    </div>
			  </nav>
			</header>
				 ";
				 switch($data[0]['Itipo_usuario']){
				  case 1:
					$med.= "
    <ul id='slide-out' class='side-nav fixed'>
    <li>
									<div class='user-view'>
										<div class='background  light-green darken-1
										z-depth-3
										'>
										  
										</div>
										  <a><img class='circle responsive-img valign profile-image' src='../img/fondo.jpg'></a>
										  <a><spaw class='white-text user-roal'>".$cadena."</spaw></a>
										  <a><spaw class='white-text name'>".$data[0]['Vnombre_usuario'].' '.$data[0]['Vpaterno_usuario'].' '.$data[0]['Vmaterno_usuario'].' '."</spaw></a>
										  <a><spaw class='white-text email'>".$data[0]['Vcorreo_usuario']."</spaw></a>
										
									  </div>
								</li>
								<li>
								      <a href='#' id='modgeneracion' onclick='dataClassDocente.getgeneraciondata();'>Periodo</a>
								</li>
	<li class='no-padding'>
          							<ul class='collapsible collapsible-accordion'>
            							<li class='bold'><a class='collapsible-header  waves-effect waves-teal'><i class='material-icons'>arrow_drop_down</i>Registro de usuarios</a>
              								<div class='collapsible-body'>
                                            	<ul>
                                                	<li>
														<a href='#' onclick='getgeneracion(1,3);'>Registro de administradores</a>
													</li>
													<li>
														<a href='#' onclick='getgeneracion(1,1);'>Registro de asesores</a>
													</li>
													<li>
														<a href='#' onclick='getgeneracion(1,2);'>Registro de alumnos</a>
													</li>
                                                </ul>
              								</div>
           					 			</li>
           					 		</ul>
								</li>
								
								<li class='no-padding'>
								      <ul class='collapsibleDatabase collapsible-accordion'>
									<li class='bold'>
									  <a class='collapsible-header  waves-effect waves-teal'><i class='material-icons'>arrow_drop_down</i>Base de datos</a>
									    <div class='collapsible-body'>
									     <ul>
										<li>
										    <a  href='#' onclick='get_data_base(1);'>Respaldo</a>
										</li>
										<li>
										    <a  href='#' onclick='get_data_base(2);'>Logs</a>
										</li>
									    </ul>
									  </div>
           					 			</li>
								      </ul>
								</li>
								<li>
									<a href='#' onclick='getformularioData();'>Estad&iacute;stica</a>
								</li>
								<li>
									<div class='divider'></div>
								</li>
								<li><a href=# onclick='formMessage();'>Contactar al administrador</a></li>
								<li>
									<a href='#' onclick='closeSession();'>Salir</a>
								</li>
    </ul>     
  <script>
    $(document).ready(function(){
       $('.button-collapse').sideNav(
	  {
	      closeOnClick: true, 
	      draggable: true, 
	      onOpen: function(el) {
		      
	      }, 
	      onClose: function(el) {
	      
	      }
	  }
       );
       $('.collapsibleDatabase').collapsible();
       $('.collapsible').collapsible();
    });
  </script>
  ";
				break;
				case 2:
				    $med.= "<ul id='slide-out' class='side-nav'>
				     <script src='../js/docente/herramientasDocente.js'>
			                         </script>
								<li>
									<div class='user-view'>
										<div class='background'>
											<img src='../img/fondo.jpg'>
										</div>
										<a><spaw class='white-text name'>Nombre: ".$data[0]['Vnombre_usuario'].' '.$data[0]['Vpaterno_usuario'].' '.$data[0]['Vmaterno_usuario'].' '."</spaw></a>
										<a><spaw class='white-text email'>Correo: ".$data[0]['Vcorreo_usuario']."</spaw></a>
									</div>
								</li>
								<li class='no-padding'>
          							<ul class='collapsible collapsible-accordion'>
            							<li class='bold'><a class='collapsible-header  waves-effect waves-teal'>Periodos</a>
              								<div class='collapsible-body midata'>
              								</div>
           					 			</li>
           					 		</ul>
           					 	</li>
           					 	<li>
           					 		<a href='#' onclick='getsoldata(\"".$data[0]['VidentiQR_usuario']."\")'>Solicitudes</a>
           					 	</li>
           					 	<li>
           					 		<a onclick='nowdata(123)'>Cosas cosas y mas cosas</a>
           					 	</li>
            <script>
            getconfigMenu();
            	$(document).ready(function(){
            		$('.collapsible').collapsible();
            	});
            </script>
								<li>
									<div class='divider'></div>
								</li>
								<li>
									<a href='#' onclick='closeSession();'>Salir</a>
								</li>
							</ul>";
				
				break;
				case 3: 
				break;
				default:
					$med.= 'error';
				break;
			}
			return $med;
		}
public function getPiePagina($modo,$detalle){
$dataMog = <<<EOT
  <footer class="page-footer  light-green">
     <span class="white-text text-lighten-4"> Dise&ntilde;ado y desarrollado por Tescha Ingenier&iacute;a en Sistemas Computacionales, Grupo 4851</span>
  </footer>
EOT;
return $dataMog;
}
	}
?>
