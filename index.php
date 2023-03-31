<?php
require_once('conexao.php');
$sql = "SELECT * FROM Livros WHERE status = 1";
if (!empty($_GET['titulo'])) {
  $titulo = $_GET['titulo'];
  $sql .= " AND titulo LIKE '%$titulo%'";
}
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

  <title>Mini Biblioteca</title>
</head>

<body> 

  <h1>Mini Biblioteca</h1>
  <form   class="form" method="get">
    <div class="titulo "><label>Buscar livro:</label> </div>
    <input type="text" name="titulo" placeholder="Título do livro">
    <input type="submit" value="Buscar">
  </form>
 
  <?php if ($resultado->num_rows > 0) { ?>
  
  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php while($livro = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $livro['titulo'] ?></td>
        <td><?php echo $livro['autor'] ?></td>
        <td><?php echo $livro['editora'] ?></td>
        <td><?php echo $livro['ano'] ?></td>
        <td><a href="emprestimo.php?id=<?php echo $livro['id'] ?>">Emprestar</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
 <div class="form2" >
  </form><?php } ?>
  <p><a href="lista_livros.php">Ver todos os livros</a></p>
  <p><a href="novo_livro.php">Cadastrar novo livro</a></p>
  <p><a href="lista_usuarios.php">Ver usuários cadastrados</a></p>
  <p><a href="novo_usuario.php">Cadastrar novo usuário</a></p>
  </div>
</body>
</html>
