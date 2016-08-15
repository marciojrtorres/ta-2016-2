<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>ACAD</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "Logado como ${usuario}";
}
?>

    <h1>ACAD</h1>

    <a href="login.php">Login</a>
    <a href="logout.php">Deslogar</a>
    <a href="notas.php">Cadastrar notas</a>

</body>
</html>