<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://muebleslagos.cl/wp-content/uploads/2018/02/cropped-logo-Horizontal-32x32.png" sizes="32x32"> 

  <title>Muebles transernaga</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- <script src="./resources/js/logear.js"></script> -->
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="./resources/css/login.css">

  <link rel="stylesheet" href="./resources/sweetalert2/dist/sweetalert2.css">
</head>

<body class="text-center">
  <!-- <form class="form-signin" method="post" action="controllers/employeesControllers.php?accion=login"> -->
  <form class="form-signin">
    <img class="mb-4" src="./views/admin/img/logo.jpg" alt="" width="300" height="150">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Correo</label>
    <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" required>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"  required>
    <div class="checkbox mb-3">
      <!-- <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label> -->
    </div>
    <div id="button">
      <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">iniciar sesión</button><!--  -->
    </div>


  </form>

  <script rel="text/javascript" src="./resources/js/login.js"></script>
  <script rel="text/javascript" src="./resources/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>


</html>