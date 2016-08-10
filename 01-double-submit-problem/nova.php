<?php
$msg = "";
if (@$_REQUEST['acao'] == 'salva') {
  $db = new mysqli('localhost', 'root', 'root', 'todo');
  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
  $descricao = $_REQUEST["descricao"];
  $db->query("INSERT INTO tarefas VALUES ('${descricao}')");
  $msg = "Salvo com sucesso!";
  include("lista.php");
  die;
}

?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <title>Nova</title>
</head>
<body>

  <h1>Nova Tarefa</h1>

  <nav>
    <a href="nova.php">Nova Tarefa</a>
    <a href="lista.php">Lista de Tarefas</a>
  </nav>
  
  <br>

  <form>
    <input type="hidden" name="acao" value="salva">
    <input type="text" id="descricao" name="descricao" placeholder="Descrição">
    <input type="submit" value="Criar">
  </form>

</body>
</html>
