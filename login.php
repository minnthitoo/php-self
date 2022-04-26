<?php
require 'config.php';
  if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email == '' || $password == ''){
      echo '<script>alert("fill all field");</script>';
    }else{
      $sql = 'select * from users where email=:email';
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      print'<pre>';
      print_r($result);
      $check = password_verify($password, $result['password']);

      if($check){
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['logged_in'] = time();
        header('Location: index.php');
        exit();
      }else{
        echo '<script>alert("Incorrect");</script>';
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
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="card">
    <div class="card-body">
      <h1>Login</h1>
      <form action="login.php" method="post">
        <div class="form-group mt-3">
          <label for="email">Email</label>
          <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="form-group mt-3">
          <label for="password">Password</label>
          <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group mt-3">
          <input type="submit" value="Login">
          <a href="register.php">Register</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>