
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
			$sql="select * from rproceso INNER JOIN area on rproceso.idarea=area.idarea ORDER BY Num_reporte ASC";
			$rs=mysql_query($sql);
			$i=0;

			$html=$html.'<div align="center">
			REPORTE  DE PROBLEMA 2015
			<br /><br />			
			<table border="0" bordercolor="#808080" bordercolordark="#808080">';	
			$html=$html.'<tr bgcolor="#808080"><td><font color="#ffffff">Nº reporte</font></td><td><font color="#ffffff">Estado del problema</font></td><td><font color="#FFFFFF">Area</font></td><td><font color="#FFFFFF">Fecha</font></td></tr>';
			while ($row = mysql_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["Num_reporte"];
				$html = $html.'</td><td>';
				$html = $html. $row["Estado"];
				$html = $html.'</td>';
	
				$html = $html.'<td>';
				$html = $html. $row["nom_area"];
				$html = $html.'</td><td>';
				$html = $html. $row["fecha"];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

