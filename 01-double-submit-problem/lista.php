<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lista</title>
</head>
<body>

  <h1>Lista de Tarefas</h1>

  <nav>
    <a href="nova.php">Nova Tarefa</a>
    <a href="lista.php">Lista de Tarefas</a>
  </nav>

  <p>
    <?= @$msg ?>
  </p>

<?php
  $db = new mysqli('localhost', 'root', 'root', 'todo');
  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
  $rs = $db->query("SELECT * FROM tarefas");
?>

  <table>
    <thead>
      <tr>
        <th>Descrição</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $rs->fetch_assoc()): ?>
      <tr>
        <td><?= $row['descricao'] ?></td>
      </tr>
      <?php endwhile ?>
    </tbody>
  </table>

</body>
</html>
