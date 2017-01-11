<?php

include_once 'dbconfig.php';

$sql = 'SELECT * FROM sucursales';
$salid = $db_con->query($sql);


$list2 = array();
foreach ($salid as $s){
  
  $s->cuotas_iniciales;
  
//  var_dump($s);
  array_push($list2, $s);
}


echo json_encode($list2 );
// die();
 
         ?>




