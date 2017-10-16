<?php 

	require "../conexion/conexion.php";
	class consulta{
		var $conn;
		var $conexion;
		function consulta(){		
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
		}	
		//-----------------------------------------------------------------------------------------------------------------------	
		//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfUsuarios(){			
			$html="";
			$sql="select * from tarea INNER JOIN tecnico on tarea.idtecnico=tecnico.idtecnico INNER JOIN rproceso on tarea.id_rproceso=rproceso.Num_reporte INNER JOIN area on area.idarea=rproceso.idarea  WHERE tecnico.tipo='T' ORDER BY id_tarea,id_rproceso,fecha_asignacion_tarea ASC";
			$rs=mysql_query($sql);
			$i=0;

			$html=$html.'<div align="center">
			REPORTE  DE TAREAS FINALIZADAS 2015
			<br /><br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#0B3861">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Nº Tarea</font></td><td><font color="#FFFFFF">Fecha  de asignacion</font></td><td><font color="#FFFFFF">Nº de proceso</font></td><td><font color="#FFFFFF">Tecnico encargado</font></td><td><font color="#FFFFFF">Estado</font></td><td><font color="#FFFFFF">Nombre de la oficina</font></td><td><font color="#FFFFFF">Detalle del problema</font></td></tr>';
			while ($row = mysql_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["id_tarea"];
				$html = $html.'</td><td>';
				$html = $html. $row["fecha_asignacion_tarea"];
				$html = $html.'</td><td>';
				$html = $html. $row["id_rproceso"];
				$html = $html.'</td><td>';
				$html = $html. $row["nombre"];
				$html = $html.'</td><td>';
				$html = $html. $row["Estado"];
				$html = $html.'</td><td>';
				$html = $html. $row["nom_area"];
				$html = $html.'</td><td>';
				$html = $html. $row["Detalle"];
				$html = $html.'</td>';
				$html = $html.'</tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

