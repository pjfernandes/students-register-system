<?php
  require_once 'banco.php';
  $consulta = $db->query('SELECT * FROM alunos WHERE id=' . $_GET['id']);
  $student = $consulta->fetch();
?>

<h1>Edit Student <?= $student['id']?> - <?= $student['nome'] ?></h1>

<form method="POST">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" value="<?=$student['nome']?>">
  <br>
  <br>
  <label for="email">E-mail</label>
  <input type="email" name="email" id="email" value="<?=$student['email']?>">
  <br>
  <br>
  <input type="submit" value="Send">
</form>

<?php
  $result = $db -> prepare("UPDATE alunos SET email=:email, nome=:name WHERE id=:id");
  //$db->exec("UPDATE `usuarios` SET `email` = 'jose@dasilva.com', `nome` = 'José' WHERE `id` = 1");
  $result->bindParam(':email', $_POST['email']);
  $result->bindParam(':name', $_POST['name']);
  $result->bindParam(':id', $_GET['id']);

  if ($result->execute()) {
    echo "New record edit successfully";
    header("Location: show.php?id=${_GET['id']}");
  } else {
  echo "Unable to edit record";
  }
?>
