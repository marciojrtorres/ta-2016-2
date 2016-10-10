<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>

    <h1>NEWS: Lista de Notícias</h1>

    <?php
        $link = new mysqli('localhost', 'root', 'root', 'news');;
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $sql = 'SELECT * FROM noticias';

        $noticias = $link->query($sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Título
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <? while ($n = $noticias>fetch_assoc()): ?>
            <tr>
                <td>
                    <?= $n['id'] ?>
                </td>
                <td>
                    <?= $n['titulo'] ?>
                </td>
                <td>
                    <button onclick=" if (confirm('excluir?')) window.location='excluir.php?id=<?= $n['id']?>'">
                    Excluir
                    </button>
                </td>
            </tr>
            <? endwhile ?>
        </tbody>
    </table>

</body>
</html>
