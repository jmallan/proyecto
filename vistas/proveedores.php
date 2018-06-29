<!-- aquest php es un include -->


<script src="js/proveedores.js" ></script>

<?php 
    
    
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
      $infoProveedor = $info->data;
      $infoContactos = $info->otros1;

      /* Asignar los valores a los campos */
      
      $nombre = $infoProveedor->Nombre;
      $nif = $infoProveedor->NIF;
      $direccion = $infoProveedor->Direccion_p;
      $poblacion = $infoProveedor->Poblacion_p;
      $provincia = $infoProveedor->Provincia_p;
      $codigopostal = $infoProveedor->Codigopostal_p;
      $telefono = $infoProveedor->Telefono_p;
      $fax = $infoProveedor->Fax;
      $email = $infoProveedor->Email_p;
      $web = $infoProveedor->Web;

      

    }

?>


<div id="prov" class="m-2">
  <h2 class="border border-primary text-primary rounded p-3 text-uppercase">Dades del proveïdor</h2>
     <form action="" method="POST" id="formularioProveedor" class="needs-validation" novalidate>
      <!-- dades de la empresa -->
      <?php 
        if ( $id != "") {
      ?>  
        <input type="text" id="Id_proveedor" name="Id_proveedor"  value="<?php echo $id; ?>" hidden>
      <?php
        }
      ?>
      <div class="border p-3">
        <div class=" form row"> 
          <div class="col-md-8 mb-3">
            <label for="validationCustom01" class="font-weight-bold">Nom</label>
            <input type="text" class="form-control" id="validationCustom01" name="Nombre" placeholder="Nom..."  required value="<?php echo $nombre; ?>">
            <div class="valid-feedback">Correcte!</div>
            <div class="invalid-feedback">Completa el camp!</div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom06" class="font-weight-bold">NIF</label>
            <input type="text" class="form-control" id="validationCustom06" name="NIF" placeholder="NIF..." required value="<?php echo $nif; ?>">
            <div class="valid-feedback">Correcte!</div>
            <div class="invalid-feedback">Completa el camp!</div>
          </div>      
        </div>
        <div class="form row" id="dir">      
            <div class="col mb-2">
              <label for="validationCustom05" class="font-weight-bold">Adreça</label>
              <input type="text" class="form-control" id="validationCustom05" name="Direccion" placeholder="Adreça" required value="<?php echo $direccion; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>
        </div>
        <div class="form row" id="dir1">      
            <div class="col-md-5 mb-2">
              <label for="validationCustom07" class="font-weight-bold">Població</label>
              <input type="text" class="form-control" id="validationCustom07" name="Poblacion" placeholder="Població..." required value="<?php echo $poblacion; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>
            <div class="col-md-5 mb-2">
              <label for="validationCustom07" class="font-weight-bold">Provincia</label>
              <input type="text" class="form-control" id="validationCustom07" name="Provincia" placeholder="Provincia..." required value="<?php echo $provincia; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>
            <div class="col-md-2 mb-2">
              <label for="validationCustom08" class="font-weight-bold">Cod Postal</label>
              <input type="text" class="form-control" id="validationCustom08" name="Codigopostal" placeholder="Codi Postal..." required value="<?php echo $codigopostal; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>
        </div>
        <div class="form row" id="tel">
            <div class="col-md-2 mb-2">
              <label for="validationCustom03" class="font-weight-bold">Telèfon</label>
              <input type="text" class="form-control" id="validationCustom03" name="Telefono" placeholder="Telèfon..." required value="<?php echo $telefono; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>   
            
            <div class="col-md-2 mb-2">
              <label for="validationCustom09" class="font-weight-bold">FAX</label>
              <input type="text" class="form-control" id="validationCustom09"name="Fax" placeholder="Fax..." required value="<?php echo $fax; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>
            <div class="col-md-4 mb-2">
              <label for="validationCustom04" class="font-weight-bold">E-mail</label>
              <input type="email" class="form-control" id="validationCustom04" name="Email" placeholder="E-mail..." required value="<?php echo $email; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback"> Completa el camp!</div>
            </div>
            <div class="col-md-4 mb-2">
              <label for="validationCustom10" class="font-weight-bold">Web</label>
              <input type="text" class="form-control" id="validationCustom10" name="Web" placeholder="Web..." required value="<?php echo $web; ?>">
              <div class="valid-feedback">Correcte!</div>
              <div class="invalid-feedback">Completa el camp!</div>
            </div>
        </div>
      </div>
      <div class="border fondo p-3">
        <div class="from row pt-2">
          <div class="col-9">
            <h5 class="text-primary rounded text-uppercase">Persona de contacte</h5>
          </div>
          <div class="col-3">
            <button class="btn btn-primary btn-sm" type="button" id="newContacto">Nou Contacte</button>
          </div>
        </div>
        <div class="form row" id="contactos">
         <div class="col-md-4 mb-2">
            <label for="validationCustom11">Nom</label>
            
          </div>
          <div class="col-md-2 mb-2">
            <label for="validationCustom12">Càrrec</label>
            
          </div>
          <div class="col-md-2 mb-2">
            <label for="validationCustom13">Telèfon</label>
            
          </div>
          <div class="col-md-4 mb-2">
            <label for="validationCustom14">E-mail</label>
            
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
      
      <div class="row mt-3 p-3">  

        <?php 

          if ( $id != "" ) {
            /* Modificación de proveedor */

        ?>
          <button class="btn btn-primary btn-block" type="submit" id="modifyProveedor">Modificar</button> 
        <?php 

          }
          else {
            /* Nuevo proveedor */
        ?>
          <button class="btn btn-primary btn-block p-3 text-uppercase" type="submit" id="newProveedor">Registrar</button>
        <?php  
          }

        ?>
        

        
          
          
      </div>       
    </form>
  </div>
</div>

<script>
// script para la validacio del formulari para llençar el div de verificacio
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
