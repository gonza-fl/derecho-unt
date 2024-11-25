<?php
  var_dump(ini_get('upload_max_filesize'));
  var_dump(phpversion());
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';
    die();
    // Verificamos si se ha subido un archivo
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0) {
        $archivo_temporal = $_FILES["archivo"]["tmp_name"];
        $directorio_destino = "storage/"; // Ajusta la ruta según tu necesidad

        // Mover el archivo subido al directorio de destino
        move_uploaded_file($archivo_temporal, $directorio_destino . basename($_FILES["archivo"]["name"]));
        echo "Archivo subido correctamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Concatenador de archivos</title>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="archivo" />
    <input type="submit" value="Concatenar" />
  </form>
</body>

</html>