<?php
    $link = new mysqli('localhost', 'root', 'root', 'news');;
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $titulo = $_GET['titulo'];
    $id = $_GET['id'];
    $sql = "UPDATE noticias SET titulo = '$titulo' WHERE id = $id";
    $link->query($sql);
    echo "Titulo atualizado com sucesso";
?>