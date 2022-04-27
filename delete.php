<?php

  require 'config.php';

  $sql = $pdo->prepare('delete from posts where id ='.$_GET['id']);

  $res = $sql->execute();
  if($res){
    echo '<script>alert("Success");
    window.location.href="index.php";</script>';
  }

?>