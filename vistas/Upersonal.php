

    <script src="js/user.js"></script>

<?php  
  
  /* Recoger los datos del usuario de la variable $_SESSION['user'] */

  $id = $_SESSION['Id_usuario'];
  $username = $_SESSION['User'];
  $nombre = $_SESSION['Nombre'];
  $apellidos = $_SESSION['Apellidos'];
  $telefono = $_SESSION['Telefono'];
  $email = $_SESSION['Email'];
  $direccion = $_SESSION['Direccion'];


?>    

<div id="usu" class="m-2">
  <h2 class="border border-primary text-primary rounded p-3 text-uppercase">Dades del Usuari</h2>
  <form action="" method="POST" class="needs-validation" id="formularioUser" novalidate>
    <input type="text" name="Id_usuario" id="Id_usuario" value="<?php echo $id; ?>" hidden>
    <div class="border p-3">
      <div class="form row pt-2"> 
        <div class="col-md-6 mb-2">
          <label for="validationCustomUsername" class="font-weight-bold">Usuari</label>
          <input type="text" class="form-control" id="validationCustomUsername" name="user" placeholder="Nom d'Usuari..." aria-describedby="inputGroupPrepend" required readonly value="<?php echo $username; ?>">
          <div class="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>
        <div class="col-md-6 mb-2">
          <label for="validationCustom02" class="font-weight-bold">Passsword</label>
          <input type="text" class="form-control" id="validationCustom02"  name="Password"  placeholder="Contrasenya"  required>
          <div class="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>
      </div>
      <div class="form row pt-2">
        <div class="col-md-6 mb-2">
          <label for="validationCustom01" class="font-weight-bold">Nom</label>
          <input type="text" class="form-control" id="validationCustom01" name="Nombre"  placeholder="Nom..."   value="<?php echo $nombre; ?>" required readonly>
          <div cvalue="<?php echo $id; ?>" lass="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>
        <div class="col-md-6 mb-2">
          <label for="validationCustom02" class="font-weight-bold">Cognoms</label>
          <input type="text" class="form-control" id="validationCustom02"  name="Apellidos"  placeholder="Cognoms..." value="<?php echo $apellidos; ?>" required readonly>
          <div class="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>
      </div>    
      <div class="form row pt-2"> 
        <div class="col-md-12 mb-2">
          <label for="validationCustom05" class="font-weight-bold">Adreça</label>
          <input type="text" class="form-control" id="validationCustom05"  name="Direccion" placeholder="Adreça..." value="<?php echo $direccion; ?>" required>
          <div class="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>
      </div>
      <div class="form row pt-2">
        <div class="col-md-9 mb-2">
          <label for="validationCustom04" class="font-weight-bold">E-mail</label>
          <input type="email" class="form-control" id="validationCustom04"  name="Email" placeholder="E-mail..." value="<?php echo $email; ?>" required>
          <div class="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>
        <div class="col-md-3 mb-2">
          <label for="validationCustom03" class="font-weight-bold">Telèfon</label>
          <input type="text" class="form-control" id="validationCustom03"  name="Telefono" placeholder="Telèfon..." value="<?php echo $telefono; ?>" required>
          <div class="valid-feedback">Correcte!</div>
          <div class="invalid-feedback">Completa el camp!</div>
        </div>   
      </div>
    </div> 
    <div class="row mt-3 p-3">   
      <button class="btn btn-primary btn-block" type="button" id="modifyUser">Modificar</button>
    </div>
  </form>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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