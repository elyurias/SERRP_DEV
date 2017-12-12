<?php
	class accVista{
		public function getEncabezado($data){
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
		    $med = "";
			$med = "
			<script src='../js/administrador/herramientasAdmin.js'>
			</script>
			<div class='grid-container'>
					<div class='row'>
						<div class='col xl12 l12 m12 s12'>
								<div class='grid-container'>
									<div class='center-align row'>
									<div class='col xl3 l3 m6 s12'>
											<center>
												<a href='index.html'>
													<img id='logo' class='responsive-img center-align' src='../img/teschalogo.jpg'>
												</a>
											</center>
										</div>
										<div class='col xl7 l5 m6 s12 center-align'>
											<h3 class='flow-text blue-text lighten-1'>Panel principal: ".$cadena."</h3>
										</div>
										<div class='col xl2 l4 m12 s12 center-align'>
											<a href='#' data-position='left' data-delay='50' data-tooltip='Menu de usuario' data-activates='slide-out' id='menu' class='button-collapse tooltipped waves-effect waves-light btn btn-floating green'><i class='material-icons'>menu</i></a>
											<a href='#' data-position='left' data-delay='50' data-tooltip='Salir del sistema' onclick='closeSession();' class='rm_dataSalir waves-effect tooltipped waves-light btn btn-floating red'><i class='material-icons'>exit_to_app</i></a>
   				  							<script>
                    							$(document).ready(function(){
                        							$('#menu').tooltip({delay: 50});
                        						});
                    						</script>
   				  							<script>
                    							$(document).ready(function(){
                        							$('.rm_dataSalir').tooltip({delay: 50});
                        						});
                    						</script>
                                        </div>
									</div>
								</div>
						</div>
					</div>
					<div class='row'>
						<div class='col s12 blue lighten-3'><br></div>
					</div>
					<script>
						 $('.button-collapse').sideNav();
						 
						 setTimeout(function(){
						    $('.tap-target').tapTarget('open');
						 },3000);
					</script>
  				</div>
	
				</div>
				 ";
				 switch($data[0]['Itipo_usuario']){
				case 1:
					$med.= "<ul id='slide-out' class='side-nav'>
								<li>
									<div class='user-view'>
										<div class='background'>
											<img src='../img/fondo.jpg'>
										</div>
										<a><spaw class='white-text name'>Nombre: ".$data[0]['Vnombre_usuario'].' '.$data[0]['Vpaterno_usuario'].' '.$data[0]['Vmaterno_usuario'].' '."</spaw></a>
										<a><spaw class='white-text email'>Correo: ".$data[0]['Vcorreo_usuario']."</spaw></a>
									</div>
								</li>
								<li>
									<a href='#' onclick='getgeneracion(1,3);'>Registro de administradores</a>
								</li>
								<li>
									<a href='#' onclick='getgeneracion(1,1);'>Registro de asesores</a>
								</li>
								<li>
									<a href='#' onclick='getgeneracion(1,2);'>Registro de alumnos</a>
								</li>
								<li>
									<a>Estadisticas</a>
								</li>
								<li>
									<a>Configuracion</a>
								</li>
								<li>
									<div class='divider'></div>
								</li>
								<li>
									<a href='#' onclick='closeSession();'>Salir</a>
								</li>
							</ul>";
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
	
		}
	}
?>
