<?php 
session_start();
if (! isset($_SESSION['id'])) {
    die('eh necessario estar logado para ver essa pagina');
}

$termo = @$_REQUEST['termo'];
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>GLITTER &lt;3 &lt;3 &lt;3</title>
</head>
<body>

    <h1>GLITTER</h1>

    <h2>Busca mensagens</h2>

    <form>
        <input type="text" id="termo" value="<?=$termo?>" 
        name="termo" placeholder="Termo da busca">
        <input type="submit" value="Busca">
    </form>

    <? if ($termo): ?>
    <div id="searchterm" style="margin-top: 2em; margin-bottom: 2em;">
        <em>
            Você buscou por
            <strong><?=$termo?></strong>
        </em>
    </div> 
    <? endif ?>

    <div id="searchresults">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>

</body>
</html>