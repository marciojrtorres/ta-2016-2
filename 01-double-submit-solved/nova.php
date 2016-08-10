<?php
session_start();
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (@$_REQUEST['acao'] == 'salva') {
    // procurar o token submetido na sessão
    $form_token = array_search($_POST['token'], $_SESSION['tokens']);
    // o token foi encontrado?
    if ($form_token !== false) {
        // se sim: remove da sessão
        unset($_SESSION['tokens'][$form_token]);
    } else {
        // se não encontrado ou já consumido: redireciona
        header("location: lista.php"); 
    }
    $db = new mysqli('localhost', 'root', 'root', 'todo');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $descricao = $_REQUEST["descricao"];
    $db->query("INSERT INTO tarefas VALUES ('${descricao}')");
    $msg = "Salvo com sucesso!";
    // redirect (PRG)
    // POST-REDIRECT-GET PATTERN
    header("location: lista.php"); 
    // outra opção: renderiza a lista (não é favoritável)
    // include('lista.php');
    // die;
  }
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
  <?php
  // PASSO 1, PREPARAR: gera o token, para o exemplo foi usado um misto de funções mas existem outras abordagens
  $token = hash('sha256',uniqid(rand(),true));
  $_SESSION['tokens'][] = $token;
  ?>

  <form method="post">
    <input type="hidden" name="token" value="<?= $token ?>">
    <input type="hidden" name="acao" value="salva">
    <input type="text" id="descricao" name="descricao" placeholder="Descrição">
    <input type="submit" value="Criar">
  </form>

</body>
</html>
