<?php
$link = new mysqli('localhost', 'root', 'root', 'news');;
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$sql = 'DELETE FROM noticias WHERE id = ' . $_REQUEST['id'];

$result = $link->query($sql);

header('location: lista.php');