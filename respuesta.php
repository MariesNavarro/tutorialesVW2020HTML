<?php
  require_once('backend/lib/db.php');

  if(isset($_POST["acc"])) {

  	 /* Obtener acción */
 	 $acc   = $_POST['acc'];

	 switch ($acc) {
		case 1:  /* registro secciín vista */
	      /* Obtener parametros */
        $id   	= $_POST['id'];
        $sec   	= $_POST['sec'];
	      echo update_seccion($id,$sec);
		    break;
	  default:
		    echo "Parámetro incorrecto";
        break;
	 }
  }
?>
