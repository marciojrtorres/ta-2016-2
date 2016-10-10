<?php
session_start();
if (! isset($_SESSION['nome'])) {
    header("location: /cache_test/login.php");
}

$link = new mysqli('localhost', 'root', 'root', 'glitter');
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>BLOG:NOVO POST</title>
</head>
<body>
<?php
    if (isset($_SESSION['nome'])) {
        $nome = $_SESSION['nome'];
        echo "Logado como ${nome}";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_REQUEST['titulo'];
        $texto  = $_REQUEST['texto'];
        $link->query("INSERT INTO posts VALUES ('$titulo', '$texto')");
        echo 'Postado com sucesso';
    }
?>
    <h1>BLOG:NOVO POST</h1>

    <a href="index-sem-cache.php">Home</a>
    <a href="logout.php">Deslogar</a>

    <form method="post">
        <input type="text" id="titulo" name="titulo">
        <textarea id="texto" name="texto"></textarea>
        <input type="submit" value="Postar">
    </form>



</body>
</html>
