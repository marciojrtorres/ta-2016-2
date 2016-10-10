<?php
session_start();
if (isset($_SESSION['nome'])) {
    header("location: /postar.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = new mysqli('localhost', 'root', 'root', 'glitter');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $sql = "SELECT id, nome FROM usuarios WHERE usuario = '" . $usuario . "' AND senha = '" . $senha . "'";
    echo $sql;
    $result = $link->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['id'] = $row['id'];
        header("location: /cache_test/postar.php");
    } else {
        die('login invalido');
    }

}

 ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>BLOG</title>
</head>
<body>

    <a href="/">Home</a>

    <h1>BLOG</h1>
    <img src="logo.jpg" alt="logo do blog">
    <h2>Login</h2>

    <form method="post">
        <input type="text" id="usuario" name="usuario" placeholder="Nome de usuário">
        <input type="text" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

</body>
</html>
