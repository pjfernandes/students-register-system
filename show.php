<?php
  require_once 'banco.php';
  $consulta = $db->query('SELECT * FROM alunos WHERE id=' . $_GET['id']);
  $student = $consulta->fetch();
?>

<h1>Student <?= $student['id']?> - <?= $student['nome'] ?></h1>
<p>Student's e-mail: <a href="mailto:<?=$student['email']?>"><?= $student['email'] ?></a></p>

<a href="index.php">Back</a>
