<?php
  require_once 'banco.php';
?>

<form method="GET">
  <label for="name">Name</label>
  <input type="text" name="name" id="name">
  <br>
  <br>
  <label for="email">E-mail</label>
  <input type="email" name="email" id="email">
  <br>
  <br>
  <input type="submit" value="Send">
</form>

<?php
  $result = $db -> prepare("INSERT INTO alunos (email, nome) VALUES (:email, :name)");
  $result->bindParam(':email', $_GET['email']);
  $result->bindParam(':name', $_GET['name']);

  if ($result->execute()) {
    echo "New record created successfully";
    header('Location: index.php');
  } else {
  echo "Unable to create record";
  }
?>

<?php
echo $_GET['name'];
?>
