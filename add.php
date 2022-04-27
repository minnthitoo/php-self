<?php

require 'config.php';

if (!empty($_POST)) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  if ($title == '' || $description == '') {
    echo '<script>alert("fill all the fields");</script>';
  } else {
    $sql = 'insert into posts(`title`, `description`) values (:title, :description);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':description', $description);
    $res = $stmt->execute();
    if ($res) {
      echo '<script>alert("done");
        window.location.href = "index.php";</script>';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Post</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="card">
    <div class="card-body">
      <h1>Add New Post</h1>
      <form action="add.php" method="post">
        <div class="form-group mt-3">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="">
        </div>
        <div class="form-group mt-3">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group mt-3">
          <input type="submit" value="Post">
          <a href="index.php">Back</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>