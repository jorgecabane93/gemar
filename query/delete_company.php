<?php

/*
 * @param {string/array} : $idEvento -> {userid, start, end}
 * @param {bool} : $param
 * @return {bit}  Funcion recibe el id de un evento para eliminarlo de la base de datos, retorna
 * 1 si success o 0 si fail
 */
require_once dirname(__FILE__) . '/conexion.php';

function deleteEmpresa($id) {
	global $con;
    $query = "DELETE FROM company WHERE company_id = '$id'";

    if ($result = $con->query($query)) {
        $result->close();
        return 1;   
     } 
    else {
        $result->close();
        return $query;
    }
}

echo deleteEmpresa($_REQUEST['id']);

?>