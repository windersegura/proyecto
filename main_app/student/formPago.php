<?php
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] != "Alumno")
		{
			header('Location: ../salir.php');
		}

	}
	else
	{
		header('Location: ../../');
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario de Pagos</title>
  </head>
  <body>

    <div class="pos-f-t">
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-danger p-4">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Consultar Horario</a>
                      <a class="dropdown-item" href="#">Consultar Curso</a>
                      <a class="dropdown-item" href="#">Consultar Maestro</a>
                      <a class="dropdown-item" href="#">Realizar Pago</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="../salir.php">Salir</a>
                  </li>
              </ul>
          </div>
        </nav>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-danger">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </div>


    <center>

        <h3>Ingrese los Datos Requeridos</h3>
        <div class="form-group" width="700">

            <form action="socket.php" method="post">
              <div class="col-md-4">
                
              </div>

            </form>




        </div>



    </center>

  </body>
</html>
