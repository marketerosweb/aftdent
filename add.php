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

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin aftdent add office </title>
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
<script>function formulario(f) 
{ 
    if (f.oficina.value   == '') { alert ('field empty '); f.oficina.focus(); return false; } 
    if (f.metal_precio.value  == '') { alert ('field empty'); f.metal_precio.focus(); return false; } 
    if (f.clear_precio.value  == '') { alert ('field empty'); f.clear_precio.focus(); return false; } 
    if (f.invasaling_precio.value  == '') { alert ('field empty'); f.invasaling_precio.focus(); return false; } 
    if (f.acceledent_precio.value   == '') { alert ('field empty '); f.acceledent_precio.focus(); return false; } 
    if (f.fase1_precio.value  == '') { alert ('field empty'); f.fase1_precio.focus(); return false; } 
    if (f.acelerante.value  == '') { alert ('field empty'); f.acelerante.focus(); return false; } 
    if (f.min_con_seguro.value  == '') { alert ('field empty'); f.min_con_seguro.focus(); return false; } 
    if (f.min_sin_seguro.value   == '') { alert ('field empty '); f.min_sin_seguro.focus(); return false; } 
    if (f.min_mensual.value  == '') { alert ('field empty'); f.min_mensual.focus(); return false; } 
    if (f.mail.value  == '') { alert ('field empty'); f.mail.focus(); return false; } 
    if (f.pie.value  == '') { alert ('field empty'); f.pie.focus(); return false; } 
    if (f.metalBraces.value   == '') { alert ('field empty '); f.metalBraces.focus(); return false; } 
    if (f.clearBrace.value  == '') { alert ('field empty'); f.clearBrace.focus(); return false; } 
    if (f.Invasalig.value  == '') { alert ('field empty'); f.Invasalig.focus(); return false; } 
    if (f.phase1.value  == '') { alert ('field empty'); f.phase1.focus(); return false; } 
    return true; 
} 
</script>
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

<form method="post" action="actionAdd.php" onsubmit="return formulario(this)">

<tr>
<tr> 
  <th>Office </th> 
  <th>Metal price </th> 
  <th>Clear price </th> 
  <th>Invasalig price </th> 
  <th>Acceledent Price </th> 
<tr>
  <td><input type="text" name="oficina" required="required"  > </td>
  <td><input type="text" name="metal_precio" required="required" > </td>
  <td><input type="text" name="clear_precio" required="required" > </td>
  <td><input type="text" name="invasaling_precio"  required="required"> </td>
  <td><input type="text" name="acceledent_precio"  required="required"> </td>
  

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
<select name="isAcceledent" id="isAcceledent">
  <option value="">Select</option>
  <option value="1">Yes</option>
  <option value="0">No</option>
</select>
</td>
  <td><input type="text" name="fase1_precio" required="required" > </td>
  <td><input type="text" name="acelerante" required="required" > </td>
  <td><input type="text" name="min_con_seguro" required="required" > </td>
  <td><input type="text" name="min_sin_seguro" required="required"> </td>
  
</tr>
<tr>
<th>Min mensual</th> 
  <th>Mail</th> 
  <th colspan="3">Footer</th> 

</tr>
<tr>
<td><input type="text" name="min_mensual" required="required" > </td>
  <td><input type="text" name="mail" required="required" > </td>
  <td colspan="3"> <input type="textarea" style="width:100%" name="pie" required="required" > </td>
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


<tr> <td colspan="5"><input type="submit" value="Add"></td></tr>
</form>
</table>

    </div>
</div>

</div>
</div>


</div>

</div>


<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>