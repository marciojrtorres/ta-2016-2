<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>

    <a href="postar.php">Postar</a>

    <h1>UM BLOG</h1>

    <img src="logo.jpg" alt="logo do blog">

    <?php
    $link = new mysqli('localhost', 'root', 'root', 'glitter');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $sql = "SELECT * FROM posts"; // LIMIT 2 OFFSET " . $offset;
    $posts = $link->query($sql);
    ?>

    <? while ($post = $posts->fetch_assoc()): ?>
    <div class="post">
        <h2><a href="#"><?=$post['titulo']?></a></h2>
        <p>
            <?=$post['texto']?>
        </p>
    </div>
    <? endwhile ?>

</body>
</html>
