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
    echo 'Yes';
  }
  else{
    echo 'No';
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin aftdent </title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link href="style.css" rel="stylesheet" media="screen">

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
<td style="text-align: right;"  colspan="13">
  <div style="height: 20px;"><a href="add.php"> + Add new office </a></div>
</td>
</tr>
<tr>
<td style="text-align: center;"  colspan="13">
  <div style="height: 20px;">Offices Aftdent</div>
</td>
</tr>
<tr> 
  <th>Office </th> 
  <th>Metal price </th> 
  <th>Clear price </th> 
  <th>Invasalig price </th> 
  <th>Acceledent Price </th> 
  <th>Is Acceledent </th> 
  <th>child </th> 
  <th>Acelerante </th> 
  <th>Min with </th> 
  <th>Min whitout</th> 
  <th>Min mensual</th> 
</tr>
<?php
$sql = 'SELECT * FROM sucursales';
$stmt = $db_con->query($sql);

foreach ($stmt as $office) {
?>

<tr>
  <td> <?php echo $office['oficina'] ?> </td>
  <td> <?php echo $office['metal_precio']  ?> </td>
  <td> <?php echo $office['clear_precio'] ?> </td>
  <td> <?php echo $office['invasaling_precio'] ?> </td>
  <td> <?php echo $office['acceledent_precio'] ?> </td>
  <td> <?php yes($office['is_acceledent']) ?> </td>
  <td> <?php echo $office['fase1_precio'] ?> </td>
  <td> <?php echo $office['acelerante'] ?> </td>
  <td> <?php echo $office['min_con_seguro'] ?> </td>
  <td> <?php echo $office['min_sin_seguro'] ?> </td>
  <td> <?php echo $office['min_mensual'] ?> </td>
  <td>
      <form method="post" action="edit.php"> 
        <input type="hidden" name="idOffice" value="edit">
        <input type="hidden" name="idUsuario" value="<?php echo $office['id'] ?>">
        <input type="submit" value="Edit">
      </form>
  </td>
  <td>
      <form method="get" action="delete.php"> 
        <input type="hidden" name="idOffice" value="delete">
        <input type="hidden" name="idUsuario" value="<?php echo $office['id'] ?>">
        <input type="submit" value="Delete">
      </form>
  </td>

</tr>
<?php
}
?>
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