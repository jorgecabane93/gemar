<?php

/**
 * @param {int} : $userid [mandatory]
 * @param {int} : $centroid [mandatory]
 * @param {string} : $start [mandatory] ('YYYY-MM-DDTHH:mm:ss')
 * @param {string} : $end [mandatory] ('YYYY-MM-DDTHH:mm:ss')
 * @return {int} : numero del evento ingresado
 * Funcion recibe los datos de un evento para ingresarlo en la base de datos, retorna
 * 1 si success o 0 si fail
 */
require_once dirname(__FILE__) . '/conexion.php';

function insertEvento($userid, $centroid, $start, $end, $nombreproyecto, $ordencompra, $contacto, $descripcion, $visitasagendadas, $criticidad, $color) {
    global $con;

    $newStart = explode('T', $start);
    $newEnd = explode('T', $end);
    $explodestart = explode('-', $newStart[1]);
    $explodeend = explode('-', $newEnd[1]);
//    $newStart = $newStart[0] . ' ' . $explodestart[0];
//    $newEnd = $newEnd[0] . ' ' . $explodeend[0];
    $newStart = $newStart[0] . ' 08:00:00';
    $newEnd = $newEnd[0] . ' 21:00:00';

    $query = "INSERT INTO `gemar`.`evento` (`evento_id`, `users_user_id`, `centro_centro_id`, `contacto_contacto_id`, `HoraInicio`, `HoraTermino`, `Lastmodified`, `nombre_proyecto`, `descripcion`, `orden_compra`, `visitas_agendadas`, `criticidad`, `color`, `status`) VALUES (NULL, '$userid', '$centroid', '$contacto', '$newStart', '$newEnd', NOW(), '$nombreproyecto', '$descripcion', '$ordencompra', '$visitasagendadas', '$criticidad', '$color', 0)";

  
    if ($result = $con->query($query)) {
        $result->close();
        return $con->insert_id;
     } 
     else {
        $result->close();
        return $query;
    }
}

echo insertEvento($_REQUEST['userid'], $_REQUEST['centroid'], $_REQUEST['start'], $_REQUEST['end'], $_REQUEST['nombreproyecto'], $_REQUEST['ordencompra'] , $_REQUEST['contactoproyecto'], $_REQUEST['descripcionproyecto'], $_REQUEST['visitasagendadas'], $_REQUEST['criticidad'], $_REQUEST['color'] );
?>
