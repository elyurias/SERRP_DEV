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
		    $med = "";
			$med = "
			<script src='../js/administrador/herramientasAdmin.js' charset='UTF-8'>
			</script>
			<header>
			<div class='grid-container'>
					<div class='row'>
						<div class='col xl12 l12 m12 s12'>
								<div class='grid-container'>
									<div class='row'>
										<div class='col xl3 l3 m5 s12'>
											<center>
												<img id='logo' class='center-align' width='80%' height='80%' src='../img/teschalogo.jpg' onclick='getdataintro();'>
											</center>
										</div>
										<div class='col xl7 l9 m7 s12'>
											<h7 class='flow-text blue-text lighten-1'>Sistema de Entrega y Revision de Avances de Residencias Profesionales.</h7>
											<h7 class='flow-text blue-text lighten-1'>Panel principal: ".$cadena."</h7><br>
											<h6 class='blue-text lighten-1'>".$periodo[0]['periodoActivo']."</h6>
										</div>
										<div class='col xl2 l12 m12 s12 center-align'>
											<a href='#' data-position='left' data-delay='50' data-tooltip='Men&uacute; de usuario' data-activates='slide-out' id='menu' class='button-collapse tooltipped valign-wrapper waves-effect waves-light btn btn-floating green'><i class='material-icons'>menu</i></a>
											<a href='#' data-position='left' data-delay='50' data-tooltip='Salir del sistema' onclick='closeSession();' class='rm_dataSalir waves-effect tooltipped waves-light valign-wrapper btn btn-floating red'><i class='material-icons'>exit_to_app</i></a>
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
						<div class='col s12 blue lighten-3'><div class='divider'></div></div>
					</div>
					<script>
						 $('.button-collapse').sideNav();
						 
						 setTimeout(function(){
						    $('.tap-target').tapTarget('open');
						 },3000);
					</script>
  				</div>
	
				</div></header>
				 ";
				 switch($data[0]['Itipo_usuario']){
				case 1:
					$med.='';
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
                                <li class='no-padding'>
          							<ul class='collapsible collapsible-accordion'>
            							<li class='bold'><a class='collapsible-header  waves-effect waves-teal'>Registro de usuarios</a>
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
									  <a class='collapsible-header  waves-effect waves-teal'>Base de datos</a>
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
								      <a href='#' id='modgeneracion' onclick='dataClassDocente.getgeneraciondata();'>Periodo de RP</a>
								</li>
								<li>
									<a href='#' onclick='getformularioData();'>Estadística</a>
								</li>
								<li>
									<div class='divider'></div>
								</li>
								<li>
									<a href='#' onclick='closeSession();'>Salir</a>
								</li>
							</ul>
                            <script>
            					$(document).ready(function(){
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
  <footer class="page-footer blue lighten-4">
    <div class="footer-copyright">
      <div class="container">
        <span class="black-text text-lighten-4">TESCHA 2018 <a class="black-text text-lighten-4" href="http://www.tescha.com" target="_blank"> Tescha</a> SERARP</span>
        <span class="right black-text text-lighten-4"> Dise&ntilde;ado y desarrollado por <a class="black-text text-lighten-4" href="#">Tescha Ingenier&iacute;a en Sistemas Computacionales, Grupo 4851</a></span>
        </div>
    </div>
  </footer>
EOT;
return $dataMog;
}
	}
?>
