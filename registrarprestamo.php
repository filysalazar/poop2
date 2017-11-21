<?php

	/*Datos de persona recolectados por POST*/
	$nom1 = $_POST['nom1'];
	$ape1 = $_POST['ape1'];
	$ape2 = $_POST['ape2'];
	$ide = $_POST['id'];
	$tel1 = $_POST['tel1'];
	$tel2 = $_POST['tel2'];

	/*Datos de prestamo recolectados por POST*/
	$np = $_POST['nump'];
	$ct = $_POST['cant'];
	$fe = $_POST['fecha'];
	$cuo = $_POST['cuo'];
	$tp = $_POST['tipop'];

	//echo "nombre: ".$nom1;

	include 'registros.php';
	 $id_cliente_existente;	

	class consulta extends registro{
	function getidcliente($ide){
		$query = "SELECT idclientes FROM clientes WHERE identidad='$ide'";
		$result = $this->con->query($query); 

		$id="";
		if ($result) {

			$row = mysqli_fetch_array($result);
			$id=$row[0];
			//echo $id;
			$this->id_cliente_existente=$id;
			//echo $this->id_cliente_existente;
		
		}
		

		return $id;
	}

	function getidmax(){
		$query = "SELECT MAX(idclientes) as id FROM clientes";
		$result = $this->con->query($query); 
		$id="";
		while ($row = mysqli_fetch_array($result)) {
			$id=$row['id'];
		}
		return $id;
	}

	}

	$reg = new consulta();
	$reg->conectar();	
	if($reg->getidcliente($ide)!=""){
		//echo "llego aqui 1";
		$reg->registrarprestamo($np,$ct,$cuo,$tp,$reg->getidcliente($ide));
	}
	else{
	  //  echo "<br>llego aqui 2";
	  //  echo $ide;
	    	    $reg->registrarpersona($nom1,$ape2,$ape1,$ide,$tel1,$tel2);
	    	   // echo $reg->getidmax();
		$reg->registrarprestamo($np,$ct,$cuo,$tp,$reg->getidmax());
	}
		
	//$reg->registrarprestamo($np,$ct,$fe,$cuo);*/
	//$reg->registrarpersona($nom1,$ape1,$ape2,$ide,$tel1,$tel2);
?>