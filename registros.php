<?php
	class registro{
		public $con;

		/*Metodo conectar*/
		function conectar(){
			$this->con = new mysqli("localhost","root","root2017","basedatos");
				if($con->connect_errno)  {
					echo "error base de datos";                        
					die("Fallo la conexión: ".$this->con->connect_errno);				
					}
		}

		/*Metodo registrarpersona*/
		function registrarpersona($nombre1,$apellido1,$apellido2,$identidad,$telefono1,$telefono2){
			//echo $nombre1;
			$query = "INSERT INTO CLIENTES(primernombre, primerapellido, segundoapellido, identidad, telefono1, telefono2) 
					  VALUES('$nombre1', '$apellido1', '$apellido2', '$identidad', '$telefono1','$telefono2')";
			$insertar = $this->con->query($query);
				
			if ($insertar) {
				   // echo "New record created successfully";
				} else {
				    echo "Error: "  ;
				}
		}

		function registrarprestamo($numeroprestamo, $cantidad, $cuota,$tipoprestamo,$idcliente){
						//echo $numeroprestamo;

			$query = "INSERT INTO PRESTAMOS(numeroprestamo, cantidadprestamo, cuota, tipoprestamo, idcliente, fecha_autorizacion, fecha_desembolso) 
					  VALUES('$numeroprestamo','$cantidad', '$cuota','$tipoprestamo','$idcliente','','')";
			$insertar = $this->con->query($query);	

			if ($insertar) {
				   // echo "New record created successfully";
				} else {
				    echo "Error: "  ;
				}
		}
	}
?>