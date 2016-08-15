<?php
// salva guarda
session_start();
if (! isset($_SESSION['usuario'])) {
    die('eh necessario estar logado para ver essa pagina');
}

$db = new mysqli('localhost', 'root', 'root', 'acad');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_REQUEST['acao'] == 'atualiza') {
    $form_token = array_search($_POST['token'], $_SESSION['tokens']);
    if ($form_token !== false) {
        unset($_SESSION['tokens'][$form_token]);
    } else {
        die("já era");
    }
    $nota = $_REQUEST['nota'];
    $id_aluno = $_REQUEST['id_aluno'];
    $db->query("UPDATE alunos SET nota = $nota WHERE id_aluno = $id_aluno");
  }
}

$rs = $db->query("SELECT * FROM alunos ORDER BY nome");
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>ACAD:notas</title>
</head>
<body>
<?php
    if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "Logado como ${usuario}";
    }
?>
    <h1>ACAD:notas</h1>

    <a href="/">Home</a>
    <a href="logout.php">Deslogar</a>

      <?php
      $token = hash('sha256',uniqid(rand(),true));
      $_SESSION['tokens'][] = $token;
      ?>

    <?php while ($row = $rs->fetch_assoc()): ?>
    <div>
        <strong><?= $row['nome'] ?></strong>
        <form method="post">
          <input type="hidden" name="token" value="<?= $token ?>">
            <input type="hidden" id="acao" name="acao" value="atualiza">
            <input type="hidden" id="id_aluno" name="id_aluno" value="<?=$row['id_aluno']?>">
            <input type="text" id="nota" name="nota" value="<?=$row['nota']?>">
            <input type="submit" value="Atualizar">
        </form>
    </div>


    <?php endwhile ?>


</body>
</html>
