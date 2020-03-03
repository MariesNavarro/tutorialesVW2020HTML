<?php
  date_default_timezone_set('America/Mexico_City');
  require_once('conexion.php');

  /* Listado de sucursales */
function get_secciones($username){
  $salida   ="";
  $link     = connect();
  $consulta ="SELECT tutorial FROM vw_tutorial WHERE username  = '".$username."'";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         $salida = $fila["tutorial"];
    }

    if (mysqli_num_rows($resultado) == 0 && $username != "") {
      $query ="INSERT INTO vw_tutorial (username,tutorial)  VALUES ('".$username."','')";
      if (!mysqli_query($link, $query)) {
         $salida=$error;
      }
      mysqli_commit($link);
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

function update_seccion($id,$sec) {
  $salida = "Ok";
  $link=connect();

  if ($id != "" ) {
    $query ="UPDATE vw_tutorial";
    $query .=" SET tutorial= CONCAT(tutorial,'".$sec.",')";
    $query .=" WHERE username = '".$id."' and tutorial not like '%".$sec."%'";

    if (!mysqli_query($link, $query)) {
       $salida=$error;
    }

    mysqli_commit($link);
    Close($link);
  }
  return $salida;

}
?>
