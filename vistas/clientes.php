<!-- aquest php es un include -->

<script src="js/clientes.js" ></script>

<?php 
    $permiso = buscarPermiso('Clientes');

    
    $nombre = "";
    $nif = "";
    $direccion = "";
    $poblacion = "";
    $provincia = "";
    $codigopostal = "";
    $telefono = "";
    $fax = "";
    $email = "";
    $web = "";
    if ( $id != "" ) {
      /* Recoger los datos del usuario del json enviado */

     	$info = json_decode($datosjson);
      	$infoCliente = $info->data;
      	$infoContactos = $info->otros1;

      /* Asignar los valores a los campos */
      
      $nombre = $infoCliente->Nombre;
      $direccion = $infoCliente->Direccion;
      $nif = $infocliente->NIF
      $poblacion = $infoCliente->Poblacion;
      $provincia = $infoCliente->Provincia;
      $codigopostal = $infoCliente->Codigopostal;
      $telefono = $infoCliente->Telefono;
      $fax = $infoClienteFax;
      $email = $infoCliente->Email;
      $web = $infoCliente->Web;


    }

?>

	<div id="clien" class="m-2">
		<h2 class="border border-primary text-primary rounded p-3">Dades del Client</h2>
		<form action="" method="POST" id="formularioCliente" class="needs-validation" novalidate>
			<?php 
		        if ( $id != "") {
		      ?>  
		        <input type="text" id="Id_cliente" name="Id_cliente"  value="<?php echo $id; ?>" hidden>
		      <?php
		        }
		      ?>
			<div class="border p-3">
        		<div class=" form row pt-2"> 
					<div class="form-group col-md-8 mb-2">
						<label for="validationCustom01" class="font-weight-bold">Nom</label>
						<input type="text" class="form-control" id="validationCustom01" placeholder="Nom del client" name="Nombre" required value="<?php echo $nombre; ?>">
						<div class="invalid-feedback">
							Es obligatori el Nom del client.
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="validationCustom02" class="font-weight-bold">NIF:</label>
						<input type="text" class="form-control" id="validationCustom02" placeholder="NIF" name="NIF" required value="<?php echo $nif; ?>">
						<div class="invalid-feedback">
							Es obligatori el NIF del client.
						</div>
					</div>
				</div>
				<div class="form row pt-2">
					<div class="form-grou col">
						<label for="validationCustom01" class="font-weight-bold">Adreça</label>
						<input type="text" class="form-control" id="validationCustom03" placeholder="Direcció" name="Direccion" required value="<?php echo $direccion; ?>">
						<div class="invalid-feedback">
							Es obligatori l'Adreça del client.
						</div>
					</div>
				</div>
				<div class="form row pt-2">
				   	<div class="form-group col-md-5">
			    		<label for="Poblacion" <label for="validationCustom01" class="font-weight-bold">Població</label>
			      		<input type="text" class="form-control" placeholder="Població" name="Poblacion" id="validationCustom04" required>
			      		<div class="invalid-feedback" value="<?php echo $poblacion; ?>">
			        	Es obligatori la Població del client.
			    		</div>
					</div>
			        <div class="form-group col-md-5">
			    		<label for="Provincia" class="font-weight-bold">Provincia</label>
			      		<input type="text" class="form-control" placeholder="Provincia" name="Provincia" id="validationCustom05" required value="<?php echo $provincia; ?>">
			     		<div class="invalid-feedback">
			        	Es obligatori la Provincia del client.
			    		</div> 
					</div>
			        <div class="form-group col-md-2">
			    		<label for="CodigoPostal" class="font-weight-bold">Codi Postal</label>
			      		<input type="text" class="form-control" placeholder="Codi Postal" name="CodigoPostal" id="validationCustom06" required  value="<?php echo $codigopostal; ?>">
			      		<div class="invalid-feedback">
			       		 Es obligatori el Codi Postal del client.
			      		</div>
			    	</div>	
					<div class="form-group col-md-5">
						<label for="validationCustom07" class="font-weight-bold">Email</label>
						<input type="email" class="form-control" placeholder="Email" name="Email" id="validationCustom07" requiredvalue="<?php echo $email; ?>">
						<div class="invalid-feedback">
							Es obligatori l'Email del client.
						</div>
					</div>
				</div>
				<div class="form row pt-2">
					<div class="form-group col-md-8">
						<label for="wEB" class="font-weight-bold">Web</label>
						<input type="email" class="form-control" id="Web" placeholder="Web" name="Web" value="<?php echo $web; ?>">
					</div>
					<div class="form-group col-md-2">
						<label for="validationCustom08"class="font-weight-bold">Teléfon</label>
						<input type="email" class="form-control" placeholder="Teléfon" name="Telefono" required value="<?php echo $telefono; ?>">
						<div class="invalid-feedback" id="validationCustom08" required>
						Es obligatori el Telèfon del client.
						</div>
					</div>
					<div class="form-group col-md-2">
						<label for="Fax">Fax:</label>
						<input type="email" class="form-control" id="Fax" placeholder="Fax" name="Fax" value="<?php echo $fax; ?>">
					</div>
				</div>
				<div class="boder fondo p-3">
					<div class="form row pt-2">
        				<div class="col-9">
							<h5 class="text-primary rounded text-uppercase">Persones de contacte</h5>
						</div>
						<div class="form col-3 pt-2">
						<div class="form-group col-md-12">
							<button class="btn btn-primary btn-sm" type="button" id="newContacto">Nou Contacte</button>
						</div>
					</div>
					<div class="form row p-2" id="contactos">
						<div class="form-group col-md-4 mb-2">
							<label for="Nombre">Nom</label>
				    		
						</div>
						<div class="form-group col-md-2 mb-2">
							<label for="Cargo">Càrrec</label>
				    		
						</div>
						<div class="form-group col-md-2 mb-2">
							<label for="Telefono">Telèfon</label>
				    		
						</div>
						<div class="form-group col-md-4 mb-2">
							<label for="Email">Email</label>
				    	
						</div>	
					        

        <?php 
          /* Mostrar el listado de los contactos */
          
          if ( !empty($infoContactos) ) {
            
            
            foreach ($infoContactos as $value) {
                $nombreContacto = $value->Nombre;
                $cargoContacto = $value->Cargo;
                $telefonoContacto = $value->Telefono;
                $emailContacto = $value->Email;
            
        ?>
        
        <div class="col-md-4 mb-2">
            
            <input type="text" class="form-control" id="validationCustom11" name="Nombre" placeholder="Nom..."  value="<?php echo $nombreContacto; ?>">
          </div>
          <div class="col-md-2 mb-2">
            
            <input type="text" class="form-control" id="validationCustom12" name="Cargo" placeholder="Càrrec..." value="<?php echo $cargoContacto; ?>">
          </div>
          <div class="col-md-2 mb-2">
           
            <input type="text" class="form-control" id="validationCustom13" name="Telefono" placeholder="Telèfon..." value="<?php echo $telefonoContacto; ?>">
          </div>
          <div class="col-md-4 mb-2">
            
            <input type="text" class="form-control" id="validationCustom14" name="Email" placeholder="E-mail..." value="<?php echo $emailContacto; ?>">
          </div>
        </div>


        <?php 
            }



          }
          else {

        ?>

         
        <div class="col-md-4 mb-2">
            
            <input type="text" class="form-control" id="validationCustom11" name="Nombre" placeholder="Nom..." >
          </div>
          <div class="col-md-2 mb-2">
            
            <input type="text" class="form-control" id="validationCustom12" name="Cargo" placeholder="Càrrec..." >
          </div>
          <div class="col-md-2 mb-2">
           
            <input type="text" class="form-control" id="validationCustom13" name="Telefono" placeholder="Telèfon..." >
          </div>
          <div class="col-md-4 mb-2">
            
            <input type="text" class="form-control" id="validationCustom14" name="Email" placeholder="E-mail..." >
          </div>
        </div>
        <?php
          }
   
        ?>  
         


      </div>
					
			</div>
			<div class="row mt-3 p-3">
				<
				
			
				 <?php 

          if ( $id != "" ) {
            
            if ( $permiso == 2 ) {
            /* Modificación de cliente*/	
        ?>
          <button class="btn btn-primary btn-block" type="submit" id="modifyCliente">Modificar</button>
        <?php 
			}
          }
          else {
            /* Nuevo cliente */
        ?>
          <button class="btn btn-primary btn-block p-3"  type="button" id="newCliente">Registrar</button>
        <?php  
          }

        ?>

			</div>
		</form>
	</div>




