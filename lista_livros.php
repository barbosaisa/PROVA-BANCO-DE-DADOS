<?php
require_once('conexao.php');
$sql = "SELECT * FROM Livros";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>
<head> <link rel="stylesheet" href="style.css">
  <title>Lista de livros</title>
</head>
<body>  <div class='form'>
  <h1>Lista de livros</h1>
  <?php if ($resultado->num_rows > 0) { ?>
  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php while($livro = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $livro['titulo'] ?></td>
        <td><?php echo $livro['autor'] ?></td>
        <td><?php echo $livro['editora'] ?></td>
        <td><?php echo $livro['ano'] ?></td>
        <td><?php echo $livro['status'] == 1 ? 'Disponível' : 'Emprestado' ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
  <p>Não há livros cadastrados.</p>
  <?php } ?>
  <p><a href="index.php">Voltar à página inicial</a></p>
  </DIV>
</body>
</html>
