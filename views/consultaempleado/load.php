
<?php
define('URL', 'http://localhost/Proyecto_DAW/');


require 'config.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_empleado', 'nombres', 'apellidos', 'area_trabajo', 'usuario', 'contrasena'];

/* Nombre de la tabla */
$table = "empleado";

$id = 'id_empleado';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE estado = 1 AND (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }

    $where = substr_replace($where, "", -3);
    $where .= ")";
}
else {
    $where = " WHERE estado = 1";
}

/* Limit */
$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

/**
 * Ordenamiento
 */

 $sOrder = "";
 if(isset($_POST['orderCol'])){
    $orderCol = $_POST['orderCol'];
    $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';
    
    $sOrder = "ORDER BY ". $columns[intval($orderCol)] . ' ' . $oderType;
 }


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Consulta para total de registro filtrados */
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados */
$sqlTotal = "SELECT count($id) FROM $table WHERE estado = 1";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

/* Mostrado resultados */
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr id = "fila-'.$row['id_empleado'].'">';
        $output['data'] .= '<td>' . $row['id_empleado'] . '</td>';
        $output['data'] .= '<td>' . $row['nombres'] . '</td>';
        $output['data'] .= '<td>' . $row['apellidos'] . '</td>';
        $output['data'] .= '<td>' . $row['area_trabajo'] . '</td>';
        $output['data'] .= '<td>' . $row['usuario'] . '</td>';
        $output['data'] .= '<td>' . $row['contrasena'] . '</td>';
        $output['data'] .= '<td><a class="btn btn-warning" href=" '. constant("URL") . 'consultaempleado/verEmpleado/' . $row['id_empleado'].'"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i> Actualizar</a>
        <a class="btn btn-danger bEliminar" href=" '. constant("URL") . 'consultaempleado/eliminarEmpleado/' . $row['id_empleado'].'"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i> Eliminar</a></td>';
        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="7">Sin resultados</td>';
    $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = 1;

    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
