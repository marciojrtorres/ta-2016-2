<?php
session_start();
if (isset($_SESSION['id'])) {
  header("location: /home.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $db = new mysqli('localhost', 'root', 'root', 'glitter');
  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

  $nome = $_POST['nome'];
  $senha = $_POST['senha'];
  $sql = "SELECT * FROM usuarios WHERE nome = '${nome}' AND senha = '${senha}'";
  $rs  = $db->query($sql);
  $row = $rs->fetch_assoc();

  if ($row) {
    $_SESSION['nome'] = $nome;
    $_SESSION['id'] = $row['id'];
    header("location: /home.php");
  } else {
    die('login invalido');
  }
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>GLITTER &lt;3 &lt;3 &lt;3</title>
</head>
<body>

    <h1>GLITTER</h1>

    <h2>Login</h2>

    <form method="post">
        <input type="text" id="nome" name=" nome" placeholder="Nome de usuário">
        <input type="text" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

</body>
</html>
