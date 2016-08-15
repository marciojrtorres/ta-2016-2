<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new mysqli('localhost', 'root', 'root', 'acad');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $rs = $db->query("SELECT * FROM usuarios WHERE nome = '${nome}' AND senha = '${senha}'");
    if ($rs->num_rows > 0) {
        session_start();
        $_SESSION['usuario'] = $nome;
        header("location: /");
    }
}

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>ACAD:login</title>
</head>
<body>

    <a href="/">Home</a>

    <h1>ACAD:login</h1>

    <form method="post">
        <input type="text" id="nome" name=" nome" placeholder="Nome de usuário">
        <input type="text" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

</body>
</html>
