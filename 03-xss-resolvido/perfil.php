<?php
session_start();
if (! isset($_SESSION['id'])) {
    die('eh necessario estar logado para ver essa pagina');
}

$id = $_REQUEST['id'];
if (!$id) {
    die('id do perfil nao informado');
}

$db = new mysqli('localhost', 'root', 'root', 'glitter');
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$result_perfil = $db->query("SELECT * FROM usuarios WHERE id = $id");
$perfil = $result_perfil->fetch_assoc();

$result_mural = $db->query("SELECT * FROM mural WHERE id = $id");
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>GLITTER &lt;3 &lt;3 &lt;3</title>
</head>
<body>

    <a href="home.php">Ir para minha página</a>

    <h1>GLITTER</h1>

    <h2>Mural de <?=$perfil['nome']?></h2>

    <div id="whoami">
        <h3>Quem eh <?=$perfil['nome']?> </h3>
        <p>
        <?=$perfil['quem_sou_eu']?>
        </p>
    </div>

    <div id="mural">
        <? while ($mural = $result_mural->fetch_assoc()): ?>
            <div class="mensagem">
                <?=$mural['mensagem']?>
            </div>
        <? endwhile ?>
    </div>
</body>
</html>
