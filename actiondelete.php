<?php
include_once 'dbconfig.php';

@$idSec = $_POST['idUsuario'];

	$sql = "DELETE FROM sucursales WHERE id = $idSec";
	$stmt = $db_con->query($sql);
	echo '<script type="text/javascript">
window.location="http://afdentorthodontics.com/adminBack/home.php";
</script>';




?>