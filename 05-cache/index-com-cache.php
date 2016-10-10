<?php
require 'vendor/autoload.php';
Predis\Autoloader::register();
$client = new Predis\Client();
// $client->set('foo', 'bar');
// $value = $client->get('foo');

// $offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;


?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(function() {
        $('div#detalhes').load('detalhes');
    });
    </script>
</head>
<body>

    <a href="postar.php">Postar</a>

    <h1>UM BLOG</h1>

    <img src="logo.jpg" alt="logo do blog">

    <?php

    $index = $client->get('index');

    if ($index) {
        echo "vindo do cache";
        echo $index;
    } else {

    $link = new mysqli('localhost', 'root', 'root', 'glitter');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $sql = "SELECT * FROM posts"; // LIMIT 2 OFFSET " . $offset;
    //echo $sql;
    $posts = $link->query($sql);

    echo "vindo do banco";

    ob_start();

    ?>

    <? while ($post = $posts->fetch_assoc()): ?>
    <div class="post">
        <h2><a href="#"><?=$post['titulo']?></a></h2>
        <p>
            <?=$post['texto']?>
        </p>
    </div>
    <? endwhile ?>

    <?php

    $conteudo = ob_get_flush();
    $client->set('index', $conteudo);
    $client->expire('index', 1);

    }
    ?>

    <div id="detalhes">

    </div>
</body>
</html>
