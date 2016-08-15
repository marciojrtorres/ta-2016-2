<?php 
// salva guarda
session_start();
if (! isset($_SESSION['usuario'])) {
    die('eh necessario estar logado para ver essa pagina');
}

$db = new mysqli('localhost', 'root', 'root', 'acad');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
   
if ($_REQUEST['acao'] == 'atualiza') {
    $nota = $_REQUEST['nota'];
    $id_aluno = $_REQUEST['id_aluno'];
    $db->query("UPDATE alunos SET nota = $nota WHERE id_aluno = $id_aluno");
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

    <?=$_SERVER['HTTP_REFERER']?>

    <?php while ($row = $rs->fetch_assoc()): ?>
    <div>
        <strong><?= $row['nome'] ?></strong>
        <form>
            <input type="hidden" id="acao" name="acao" value="atualiza">
            <input type="hidden" id="id_aluno" name="id_aluno" value="<?=$row['id_aluno']?>">
            <input type="text" id="nota" name="nota" value="<?=$row['nota']?>">
            <input type="submit" value="Atualizar">
        </form>
    </div>
    

    <?php endwhile ?>
    

</body>
</html>
