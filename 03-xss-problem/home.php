<?php 
session_start();
if (! isset($_SESSION['id'])) {
    die('eh necessario estar logado para ver essa pagina');
}

$id = $_SESSION['id'];
$link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
mysql_select_db('glitter', $link) or die ('banco de dados glitter nao existe');
   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quem_sou_eu = $_REQUEST['quem_sou_eu'];
    if ($quem_sou_eu) {
        $quem_sou_eu = mysql_real_escape_string($quem_sou_eu);
        mysql_query("UPDATE usuarios SET quem_sou_eu = '$quem_sou_eu' WHERE id = $id");
    }
    $nova_mensagem = $_REQUEST['nova_mensagem'];
    if ($nova_mensagem) {
        $nova_mensagem = mysql_real_escape_string($nova_mensagem);
        mysql_query("INSERT INTO mural VALUES ($id, '$nova_mensagem')");
    }
}

$result_eu = mysql_query("SELECT * FROM usuarios WHERE id = $id", $link);
$eu = mysql_fetch_assoc($result_eu);

$result_amigos = mysql_query("SELECT * FROM usuarios WHERE id != $id", $link);
$result_mural = mysql_query("SELECT * FROM mural WHERE id = $id", $link);
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>GLITTER &lt;3 &lt;3 &lt;3</title>
</head>
<body>
    <?=$eu['nome']?>
    
    <a href="logout.php">Sair</a>
    <a href="busca.php">Busca</a>

    <h1>GLITTER</h1>

    <h2>Meu Perfil</h2>
    

    <div id="whoami">
        <h3>Quem sou eu</h3>
        <p>
        <?=$eu['quem_sou_eu']?>
        </p>
        <a href="#" onclick="this.style.display = 'none'; document.getElementById('updatewhoami').style.display = 'block';">
        Atualizar quem sou eu
        </a>
        <div id="updatewhoami" style="display:none">
            <h4>Atualizar quem sou eu</h4>
            <form method="post">
                <textarea name="quem_sou_eu" rows="4" cols="50"><?=$eu['quem_sou_eu']?></textarea>
                <input type="submit" value="Atualizar">
            </form>
        </div>
    </div>

    <div id="mural">
        <h3>Meu Mural</h3>
        <? while ($meu_mural = mysql_fetch_assoc($result_mural)): ?>
            <div class="mensagem">
                <?=$meu_mural['mensagem']?>
            </div>
        <? endwhile ?>
        <h4>Nova mensagem</h4>
        <form method="post">
            <textarea name="nova_mensagem" rows="4" cols="50"></textarea>
            <input type="submit" value="Publicar">
        </form>
    </div>

    <div id="friends">
        <h3>Amigos</h3>
        <? while ($amigo = mysql_fetch_assoc($result_amigos)): ?>
            <div class="friend">
                <a href="perfil.php?id=<?=$amigo['id']?>">
                    <?=$amigo['nome']?>
                </a>
            </div>
        <? endwhile ?>
    </div>
    
</body>
</html>