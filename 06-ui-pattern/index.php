<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <h1>NEWS</h1>

    <?php
        $link = new mysqli('localhost', 'root', 'root', 'news');;
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
        $sql = "SELECT * FROM noticias";
        $noticias = $link->query($sql);
    ?>

    <? while ($noticia = $noticias->fetch_assoc()): ?>
    <div class="noticia">

        <div class="titulo">
            <h2><?=$noticia['titulo']?></h2>
        </div>

        <? if ($noticia['imagem']): ?>
        <div class="imagem">
            <img width="320" height="240" src="imagem/<?=$noticia['imagem']?>.<?=$noticia['extensao']?>">
        </div>
        <? endif ?>

        <div class="texto">
            <p><?=$noticia['texto']?></p>
        </div>

    </div>
    <? endwhile ?>

</body>
</html>
