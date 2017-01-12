<?php
include_once 'dbconfig.php';
@$idSec = $_POST['idSec'];
@$oficina = $_POST['oficina'];
@$metal_precio = $_POST['metal_precio'];
@$clear_precio = $_POST['clear_precio'];
@$invasaling_precio = $_POST['invasaling_precio'];
@$acceledent_precio = $_POST['acceledent_precio'];
@$isAcceledent = $_POST['isAcceledent'];
@$fase1_precio = $_POST['fase1_precio'];
@$acelerante = $_POST['acelerante'];
@$min_con_seguro = $_POST['min_con_seguro'];
@$min_sin_seguro = $_POST['min_sin_seguro'];
@$min_mensual = $_POST['min_mensual'];
@$mail = $_POST['mail'];
@$pie = $_POST['pie'];
@$metalBraces = $_POST['metalBraces'];
@$clearBrace = $_POST['clearBrace'];
@$Invasalig = $_POST['Invasalig'];
@$phase1 = $_POST['phase1'];
if (empty($oficina) || empty($metal_precio) || empty($clear_precio) || empty($invasaling_precio) || empty($acceledent_precio) || empty($isAcceledent) || empty($fase1_precio) || empty($acelerante) || empty($min_con_seguro) || empty($min_sin_seguro) || empty($min_mensual) || empty($mail) || empty($pie) || empty($metalBraces) || empty($clearBrace) || empty($Invasalig) || empty($phase1))
{
	echo 'all the field is requeride';
}
else{
	$cuotasIniciales = '{
						"Metal braces_cs":"'.$metalBraces.'",
						"Metal braces_ss":"'.$metalBraces.'",
						"Clear braces_cs":"'.$clearBrace.'",
						"Clear braces_ss":"'.$clearBrace.'",
						"Invisalign_cs":"'.$Invasalig.'",
						"Invisalign_ss":"'.$Invasalig.'",
						"Phase 1_cs":"'.$phase1.'",
						"Phase 1_ss":"'.$phase1.'"
						}
							';
							$sql = "INSERT INTO sucursales (oficina, metal_precio, clear_precio, invasaling_precio, acceledent_precio, is_acceledent, fase1_precio, acelerante, min_con_seguro, min_sin_seguro, min_mensual, mail, cuotas_iniciales, pie  ) VALUES ('$oficina', '$metal_precio', '$clear_precio', '$invasaling_precio', '$acceledent_precio','$isAcceledent', '$fase1_precio', '$acelerante', '$min_con_seguro', '$min_sin_seguro', 'min_mensual', '$mail', '$cuotasIniciales', '$pie' )";
	$stmt = $db_con->query($sql);

	echo 'insert '.'<br />'.$cuotasIniciales.'<br </>';
	$var = '<br />';
	echo $oficina.$var.$metal_precio.$var.$clear_precio.$var.$invasaling_precio.$var.$acceledent_precio.$var.$isAcceledent.$var.$fase1_precio.$var.$acelerante.$var.$min_con_seguro.$var.$min_sin_seguro.$var.$min_mensual.$var.$mail.$var.$pie.$var;
	echo 'metal '.$metalBraces.$var;
	echo 'clear '.$clearBrace.$var;
	echo 'inva '.$Invasalig.$var;
	echo 'phase '.$phase1.$var;
		echo '<script type="text/javascript">
window.location="http://afdentorthodontics.com/adminBack/home.php";
</script>';
 
}

?>