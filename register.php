<?php
require 'config.php';
  if(!empty($_POST)){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($username == '' || $email == '' || $password == ''){
      echo '<script>alert("Fill all field");</script>';
    }else{
      $check_mail = 'select count(email) as num from users where email=:email';
      $stmt = $pdo->prepare($check_mail);
      $stmt->bindValue(':email', $email);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($row['num'] > 0){
        echo '<script>alert("This email already exist");</script>';
      }else{
        $encpassword = password_hash($password, PASSWORD_BCRYPT);
        $ins_sql = 'insert into users (username, email, password) values (:username, :email, :password);';
        $ins_stmt = $pdo->prepare($ins_sql);
        $ins_stmt->bindValue(':username', $username);
        $ins_stmt->bindValue(':email', $email);
        $ins_stmt->bindValue(':password', $encpassword);
        $result = $ins_stmt->execute();
        if($result){
          echo '<script>alert("Registeration success"); <a href="login.php">Login</a></script>';
        }else{
          echo '<script>alert("error");</script>';
        }
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
  <title>Registeration form</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="card">
    <div class="card-body">
      <h1>Register</h1>
      <form action="register.php" method="post">
        <div class="form-group mt-3">
          <label for="username">Username</label>
          <input type="text" name="username" id="" class="form-control">
        </div>
        <div class="form-group mt-3">
          <label for="email">Email</label>
          <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="form-group mt-3">
          <label for="password">Password</label>
          <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group mt-3">
          <input type="submit" value="Register">
          <a href="login.php" style="margin-left: 30px;">Login</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>