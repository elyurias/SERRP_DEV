<?php
	class vistadocente{
		function getMenuDocenteFinal($periodo,$solicitudes){
			$msg = "<ul>";
        	foreach ($periodo as $row) {
        		$msg.="<li><a href=#>".$row['Vnombre_cg']."</a></li>";
        	}					
      		$msg.="</ul>";
      		return $msg;
		}
	}
	/*
			<li><a href=#>First</a></li>
        						<li><a href=#>Second</a></li>
        						<li><a href=#>Third</a></li>
        						<li><a href=#>Fourth</a></li>
	*/
?>