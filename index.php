<?php
require 'config.php';
session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['logged_in'])){
  echo '<script>alert("Please login to continue");
  window.location.href = "login.php";
  </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php
  $stmt = $pdo->prepare('select * from posts order by id desc');
  $stmt->execute();
  $row = $stmt->fetchAll();
  ?>

  <div class="card">
    <div class="card-body">
      <table class="table table-stripped">
        <div>
          <a href="add.php" class="btn btn-primary">Create</a>
          <a href="logout.php" class="btn btn-danger" style="float: right;">Logout</a>
        </div>
        <thead>
          <th width=20%>Title</th>
          <th width=40%>Description</th>
          <th width=20%>Created at</th>
          <th width=10%>Action</th>
        </thead>
        <br><br>

        <tbody>
          <?php
          if ($row) {
            foreach ($row as $value) {
          ?>
          <tr>
            <td><?php echo $value['title'] ?></td>
            <td><?php echo $value['description'] ?></td>
            <td><?php echo date('d-m-Y', strtotime($value['created_at'])) ?></td>
            <td>
              <a href="edit.php?id=<?php $value['id'] ?>">Edit</a>
              <a href="delete.php?id=<?php $value['id'] ?>">Delete</a>
            </td>
          </tr>
          <?php
            }
          }
          ?>
        </tbody>

      </table>
    </div>
  </div>
</body>

</html>