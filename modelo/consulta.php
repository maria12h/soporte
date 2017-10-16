
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
			$sql="select * from tecnico WHERE tipo='T'";
			$rs=mysql_query($sql);
			$i=0;

			$html=$html.'<div align="center">
			REPORTE  DE TRABAJADORES 2015
			<br /><br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#0B3861">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">C&oacute;digo</font></td><td><font color="#FFFFFF">DNI</font></td><td><font color="#FFFFFF">NOMBRE</font></td><td><font color="#FFFFFF">APELLIDO</font></td><td><font color="#FFFFFF">ESPECIALIDAD</font></td></tr>';
			while ($row = mysql_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["idtecnico"];
				$html = $html.'</td><td>';
				$html = $html. $row["dni"];
				$html = $html.'</td><td>';
				$html = $html. $row["nombre"];
				$html = $html.'</td><td>';
				$html = $html. $row["apellido"];
				$html = $html.'</td><td>';
				$html = $html. $row["especialidad"];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

