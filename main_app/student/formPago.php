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
    <meta name="viewport" content="width=device-width, user-scalable=no">
  	<link rel="stylesheet" href="../../css/bootstrap.css">
		<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <title>Formulario de Pagos</title>
  </head>
  <body>
		<?php include 'menu.html' ?><br><br><br>
    <center>

        <h3>Ingrese los Datos Requeridos</h3>
        <div class="form-group" width="700">

            <form action="socket_cliente.php" method="post">





         <div class="col-md-3">
            <label>Identificacion<span><em>(requerido)</em></span></label><br>
            <input type="text" pattern="[0-9]{1,45}" name="Id" class="form-input form-control" placeholder="Ingrese su ID" value="<?php echo $idAlumno=$_SESSION['usuario']['idAlumno']; ?>" required/>
          </div>

              <div class="col-md-4">

                <label>Numero de Tarjeta <span><em>(requerido)</em></span></label><br>
            <input type="text" pattern="[0-9]{13}" name="Tarjeta" class="form-input form-control" placeholder="Ingrese su Numero de Tarjeta" required/>

              </div>

          <div class="col-md-5">
            <label>Codigo de Seguridad<span><em>(requerido)</em></span></label><br>
            <input type="text" pattern="[0-9]{3}" name="Seguridad" class="form-input form-control" placeholder="Ingrese su Codigo de Seguridad" required/>
          </div>


          <div class="col-md-2">
            <label>Monto a Pagar<span><em>(requerido)</em></span></label><br>
            <input type="text" pattern="[0-9]{1,}" name="Monto" class="form-input form-control" placeholder="Ingrese su Monto a Pagar" required/>
          </div>

          <div class="form-group">
            <label for="Tipo" class="col-sm-2 control-label">Tipo Transaccion</label>
            <div class="col-sm-1">

            <select class="form-control" id="trx" name="codigo">

                <option> 00 </option>
                <option> 01 </option>
                <option> 02 </option>

            </select>

            </div>
          </div>


          <div>
          <input class="btn__submit btn btn-dark col-md-3" type="submit" value="Pagar">
          <a href="index.php" class="btn btn-success col-md-3">REGRESAR</a>
          </div>

            </form>




        </div>



    </center><br><br>
		<?php include 'footer.php' ?>
  </body>
</html>
