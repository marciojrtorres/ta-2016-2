<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>

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
            <h2 onclick="revealForm(this)"><?=$noticia['titulo']?></h2>
            <form onsubmit="updateTitle(this); return false;" style="display:none">
                <input type="hidden" name="id" value="<?=$noticia['id']?>">
                <input type="text" name="titulo" value="<?=$noticia['titulo']?>" class="titulo">
                <input type="submit" name="atualizar" value="Atualizar">
            </form>
        </div>

        <? if ($noticia['imagem']): ?>
        <div class="imagem">
            <img width="320" height="240" data-src="imagem/<?=$noticia['imagem']?>.<?=$noticia['extensao']?>">
        </div>
        <? endif ?>

        <div class="texto">
            <p><?=$noticia['texto']?></p>
        </div>

    </div>
    <? endwhile ?>


    <script type="text/javascript">

        images = document.querySelectorAll('img');


        function isImageInViewport(img) {
            return img.getBoundingClientRect().top > 0
                && img.getBoundingClientRect().top < window.innerHeight;
        }

        function loadImage(img) {
            if (img.src === "") img.src = img.dataset['src'];
        }

        function loadImagesIfInViewport() {
            for (var i = 0; i < images.length; i++) {
                if (isImageInViewport(images[i])) loadImage(images[i]);
            }
        }

        window.onscroll = function() {
            loadImagesIfInViewport();
        }

        window.onload = function() {
            loadImagesIfInViewport();
        }

        function updateTitle(form) {
          form.atualizar.disabled = true;
          form.atualizar.value = 'Atualizando ...';
          var ajax = new XMLHttpRequest();     
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4) {            
                    if (ajax.status==200) {
                        form.atualizar.value = 'Atualizar';
                        form.atualizar.disabled = false;
                        form.previousElementSibling.innerHTML = form.titulo.value;
                        form.previousElementSibling.style.display = 'block';
                        console.log('ok');
                    } else {
                        console.log('ah nao');
                    }
                }
            }
        
            ajax.open("GET","update.php?id="+form.id.value+"&titulo="+form.titulo.value,true);
            ajax.send();

            form.style.display = 'none';
        }

        function revealForm(h2) {
            h2.style.display = 'none';
            h2.nextElementSibling.style.display = 'block';
        }

    </script>

</body>
</html>
