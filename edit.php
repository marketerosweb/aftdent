<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
function yes($val){
  if ($val == 1){
    echo '<option value="1">Yes</option><option value="0">No</option>';
  }
  else{
    echo '<option value="1">No</option> <option value="1">Yes</option>';
  }
}
@$idUsuario = $_POST['idUsuario'];
if(!isset($idUsuario)){
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin aftdent Edit Form </title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link href="style.css" rel="stylesheet" media="screen">
<style type="text/css">
  
  #tabla_cuotas_paginate, #tabla_cuotas_filter, #tabla_cuotas_info, #tabla_cuotas_length{
    display: none;
  }
</style>

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"></li>
            <li></li>
            <li></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $row['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
               
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    
<div class="body-container">

<div class="container">
    <div class='alert alert-success'>
		<button class='close' data-dismiss='alert'>&times;</button>
			<strong>Hello '<?php echo $row['user_name']; ?></strong>  Welcome to the admin page.
    </div>
</div>

<div class="container">



<table class="table">
<tr>
<td style="text-align: center;"  colspan="5">
  <div style="height: 20px;">Offices Aftdent</div>
</td>
</tr>
<tr>
<td style="text-align: right;"  colspan="5">
  <div style="height: 20px;"><a href="http://afdentorthodontics.com/adminBack/">Back</a></div>
</td>
</tr>

<form method="post" action="actionEdit.php">
<input type="hidden" name="idSec" id="idSec" value="<?php echo $idUsuario ?>">
<?php
$sql = 'SELECT * FROM sucursales where id = '.$idUsuario;
$stmt = $db_con->query($sql);

foreach ($stmt as $office) {
?>

<tr>
<tr> 
  <th>Office </th> 
  <th>Metal price </th> 
  <th>Clear price </th> 
  <th>Invasalig price </th> 
  <th>Acceledent Price </th> 
<tr>
  <td><input type="text" name="oficina"  value="<?php echo $office['oficina'] ?>"> </td>
  <td><input type="text" name="metal_precio" value=" <?php echo $office['metal_precio']  ?>"> </td>
  <td><input type="text" name="clear_precio" value=" <?php echo $office['clear_precio'] ?>"> </td>
  <td><input type="text" name="invasaling_precio" value=" <?php echo $office['invasaling_precio'] ?>"> </td>
  <td><input type="text" name="acceledent_precio" value=" <?php echo $office['acceledent_precio'] ?>"> </td>
  

</tr>
</tr>
  <th>Is Acceledent </th> 
  <th>child </th> 
  <th>Acelerante </th> 
  <th>Min with </th> 
  <th>Min whitout</th> 
  
</tr>
<tr>
<td>
<select>
  <?php 
    yes($office['is_acceledent']);
  ?>
</select>
</td>
  <td><input type="text" name="fase1_precio" value="<?php echo $office['fase1_precio'] ?>"> </td>
  <td><input type="text" name="acelerante" value="<?php echo $office['acelerante'] ?>"> </td>
  <td><input type="text" name="min_con_seguro" value="<?php echo $office['min_con_seguro'] ?>"> </td>
  <td><input type="text" name="min_sin_seguro" value="<?php echo $office['min_sin_seguro'] ?>"> </td>
  
</tr>
<tr>
<th>Min mensual</th> 
  <th>Mail</th> 
  <th colspan="3">Footer</th> 

</tr>
<tr>
<td><input type="text" name="min_mensual" value=" <?php echo $office['min_mensual'] ?>"> </td>
  <td><input type="text" name="mail" value=" <?php echo $office['mail'] ?>"> </td>
  <td colspan="3"> <input type="textarea" style="width:100%" name="pie" value="<?php echo $office['pie'] ?>"> </td>
</tr>
<tr>   <th>Cuote</th> </tr>
<tr> 
<td colspan="4">
   <table class="grilla" id="tabla_cuotas" width="100%">
      <thead>
        <th width="25%">Metal Braces</th>
        <th  width="25%">Clear Braces</th>
        <th  width="25%">Invisalign</th>
        <th  width="25%">Phase 1</th> 
            <tr>
          <td><input type="text" name="metalBraces" required="required"></td>
          <td><input type="text" name="clearBrace"  required="required"></td>
          <td><input type="text" name="Invasalig"  required="required"></td>
          <td><input type="text" name="phase1"  required="required"></td>
          </tr> 
      </thead>
  
      <tbody>
      </tbody>
    </table>
  </td>
</tr>
<?php
}
?>

<tr> <td colspan="5"><input type="submit" value="Editar"></td></tr>
</form>
</table>

    </div>
</div>

</div>
</div>


</div>

</div>
<script src="js/jquery-1.12.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.js"></script>
  <!--botones DataTables--> 
  <script src="js/dataTables.buttons.min.js"></script>
  <script src="js/buttons.bootstrap.min.js"></script>
  <!--Libreria para exportar Excel-->
  <script src="js/jszip.min.js"></script>
  <!--Librerias para exportar PDF-->
  <script src="js/pdfmake.min.js"></script>
  <script src="js/vfs_fonts.js"></script>
  <!--Librerias para botones de exportación-->
  <script src="js/buttons.html5.min.js"></script>
<script type="text/javascript">

      $(document).on("ready", function(){
      listar();
      });

      var listar = function(){

        var idSec = $('#idSec').attr('idSec');
        var tablita = $("#tabla_cuotas").DataTable({
         "ajax":{
          "type":"post", 
          "url":"cuotas.php" , 
          "data": {"idSec": <?php echo $idUsuario ?>}
         }, 
         "columns":[
            {"data":"Metal braces_cs"},
            {"data":"Clear braces_cs"},
            {"data":"Invisalign_cs"},
            {"data":"Phase 1_cs"}

         ]
        });
      }

      </script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>