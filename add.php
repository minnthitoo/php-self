<?php

require 'config.php';

if (!empty($_POST)) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  if ($title == '' || $description == '') {
    echo '<script>alert("fill all the fields");</script>';
  } else {

    $targetFile = 'images/'.($_FILES['image']['name']);
    $imagetype = pathinfo($targetFile, PATHINFO_EXTENSION);

    if($imagetype != 'png' && $imagetype != 'jpg' && $imagetype != 'jpeg'){
      echo '<script>alert("Add jpg or png or jpeg");</script>';
    }else{
      $move = move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);
      if($move){
        echo '<script>alert("Success");</script>';
      }
    }

    $sql = 'insert into posts(`title`, `description`, `image`) values (:title, :description, :image);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':image', $_FILES['image']['name']);
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
      <form action="add.php" method="post" enctype="multipart/form-data">
        <div class="form-group mt-3">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="">
        </div>
        <div class="form-group mt-3">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group mt-3">
          <label for="image">Image add</label> <br>
          <input type="file" name="image" id="" required>
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