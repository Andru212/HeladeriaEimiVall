<?php
if (isset($_POST['calificacion'])) {
    $calificacion = intval($_POST['calificacion']);
    $fecha = date("Y-m-d H:i:s");
    $archivo = 'calificaciones.csv';

    // Si el archivo no existe, agregar encabezado
    if (!file_exists($archivo)) {
        $cabecera = ["Fecha", "Calificación"];
        $f = fopen($archivo, 'w');
        fputcsv($f, $cabecera);
    } else {
        $f = fopen($archivo, 'a');
    }

    // Guardar calificación
    fputcsv($f, [$fecha, $calificacion]);
    fclose($f);

    echo "Calificación guardada";
} else {
    echo "No se recibió la calificación";
}
?>
