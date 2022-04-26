<?php
  print'<pre>';
  print_r($_POST);
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