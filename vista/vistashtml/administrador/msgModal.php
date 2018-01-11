<?php
	class msgModal{
		static function getErrorMsg($msg){
			return "
			
			<div id='modal1' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>Mensaje del Sistema</h4>
							<p>Error: ".$msg."</p>
						</div>
					</div>
					<script>
						res_url();
					</script>
					";
		}
		static function getModalMsg($msg,$comm){
			return "
			
			<div id='modal1' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer'>
							<a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a>
						</div>
					</div>";
		}
		
		static function getModalMsgStatusRegistro($msg,$comm){
			return "
			
			<div id='modal1DosStatusRegistro' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer'>
							<a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a>
						</div>
					</div>
			<script>
			    $(document).ready(function(){
				$('#modal1DosStatusRegistro').modal();
				$('#modal1DosStatusRegistro').modal('open');
			    });
			  </script>		
			";
		}
		
		static function getModalMsgActualiza($msg,$comm){
			return "
			
			<div id='modal1ModalActualizaLimite' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer'>
							<a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a>
						</div>
					</div>
							    <script>
		    $(document).ready(function(){
		    $('#modal1ModalActualizaLimite').modal();
		    $('#modal1ModalActualizaLimite').modal('open');
		    });
		    </script>";
		}
		static function getModalMsgUPD($msg,$comm){
			return "
			
			<div id='modalREGRES1' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer'>
							<a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a>
						</div>
					</div>
			 <script>
		    $(document).ready(function(){
		    $('#modalREGRES1').modal();
		    $('#modalREGRES1').modal('open');
		    });
		    </script>		
			";
		}
		
		static function getModalMsg11D($msg,$comm){
			return "
			
			<div id='modal232' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer' id='jamanajamanajamana'>
							<a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a>
						</div>
					</div>";
		}
		static function getModalMsg11DD($msg,$comm,$boton){
			return "
			
			<div id='modal232' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer' id='jamanajamanajamana'>
							".$boton."
						</div>
					</div>";
		}
		static function getModalMsg11DD2($msg,$comm){
			return "
			
			<div id='modal1JAMON' class='modal modal-fix-footer'>
						<div class='modal-content'>
							<h4>".$msg."</h4>
							<p>".$comm."</p>
						</div>
						<div class='modal-footer' id='jamanajamanajamana'>
							<a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a>
						</div>
					</div>";
		}
	}
?>
