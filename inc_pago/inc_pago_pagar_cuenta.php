<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idcuenta=$_GET['idcuenta'];

$cliente="SELECT * FROM cuenta WHERE idcuenta=$idcuenta";

$q_cliente=mysql_query($cliente);
$row_cliente= mysql_fetch_array($q_cliente);

?>

<table class='table table-bordered table-striped'>
<form action="pagar_cuenta_ok.php" method="POST">


<tr>
	<td><div align='right'>Monto </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" placeholder="Ingresar Monto" type="text" name="monto" required="required" value=""></div></td>

</tr>

<tr>
	<td><div align='right'>Descripcion Pago </div></td>
	<td><div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" id="cuentacorriente" name="cuentacorriente" value="Cuenta Corriente"  ></div></td>
</tr>


<tr>
	<td><div align='right'>ID Cuenta </div></td>
	<td><div class="col-xs-12 col-sm-8 col-md-12 col-lg-12"><input class="form-control" type="text" name="idcuenta" size="25" value="<?php echo $row_cliente['idcuenta'] ?>"  ></div></td>
</tr>

<input type="hidden" name="fechaventa" id="inputFechaventa" class="form-control" value="<?php echo date("Y-m-d h:i:s");?>" required="required" readonly>

<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Pagar"></td>
</tr>

</form>

</table>
