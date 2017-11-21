<?php
	class consulta{
	private $con;

	function conectar(){
			$this->con = new mysqli("localhost","root","root2017","basedatos");
				if($con->connect_errno)
					die("Fallo la conexión: ".$this->con->connect_errno);				
	
	}

	function getidcliente($nom1){
	$query = "SELECT idcliente FROM clientes WHERE identidad='$nom1'";
		$result = $this->con->query($query); 
		
		$id="";
		if ($result) {

			while ($row = mysqli_fetch_array($result)) {
			$id=$row['idcliente'];
			$this->id_cliente_existente+$id;
		}
		}
		

		return $id;	

	}

	$reg = new consulta();
	$reg->conectar();	
	if($reg->getidcliente("Crack787") == ""){
		echo "Cliente no registrado";
	} 
	else
		echo "Cliente Registrado";
?>