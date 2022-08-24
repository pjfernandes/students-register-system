<h1>List of students</h1>

<?php
  require_once 'banco.php';
  session_start();
  $query = $db->query('SELECT * FROM alunos ORDER BY nome ASC');
  $students = $query->fetchAll();

  if (count($students) === 0) {
    echo '<p>No students registered</p>';
  } else { ?>

    <ul>
      <?php
        foreach ($students as $student) {
          // $linhas_afetadas = $db -> prepare("SELECT * FROM students WHERE nome = :nome");
          // $linhas_afetadas->bindParam(':nome', $student);
          ?>
          <a href="show.php?id=<?=$student['id']?>" id="<?php echo $student['id']; ?>"><li><?php echo $student['nome']; ?> - <?php echo $student['email'];?></li></a>

        <?php } ?>
    </ul>
  <?php } ?>

<a href="new.php">Register student</a>
