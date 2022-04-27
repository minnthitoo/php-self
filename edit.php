<?php

  require'config.php';

  if(!empty($_POST)){
    $title = $_POST['title'];
    $description = $_POST['description'];
    if($title == '' || $description == ''){
      echo '<script>alert("Fill all field");</script>';
    }else{
      $sql = 'update posts set title=:title, description=:description where id = :id;';
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':title', $title);
      $stmt->bindValue(':description', $description);
      $stmt->bindValue(':id', $_GET['id']);
      $res = $stmt->execute();

      if($res){
        echo '<script>alert("success");
        window.location.href="index.php";
        </script>';
      }else{
        echo '<script>alert("Error");</script>';
      }
    }
  }

  $pdo_stmt = 'select * from posts where id='.$_GET['id'];
  $stmt = $pdo->prepare($pdo_stmt);
  $stmt->execute();
  $res = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="card">
    <div class="card-body">
      <h1>Edit</h1>
      <form action="" method="post">
        <div class="form-group mt-3">
          <label for="title">Title</label>
          <input type="text" name="title" id="" class="form-control" value="<?php echo $res[0]['title'] ?>">
        </div>
        <div class="form-group mt-3">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $res[0]['description'] ?></textarea>
        </div>
        <div class="form-group mt-3">
          <input type="submit" value="Edit">
          <a href="index.php">Back</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>