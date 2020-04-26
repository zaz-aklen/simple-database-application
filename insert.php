<?php
require_once "pdo.php";
session_start();
if(isset($_POST['leave'])){
  header('Location:app.php');
  return;
}
if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['email'])){
  $spd="INSERT INTO user1 (name,email,pass) VALUES (:name,:email,:pass)";
  $sql=$pdo->prepare($spd);
  $sql->execute(array(
    ':name'=>$_POST['name'],
    ':email'=>$_POST['email'],
    ':pass'=>$_POST['pass']));
    $_SESSION['message']="inserted succesfully";
    header('Location:app.php');
    return;
}
 ?>
<html><head></head>
<body>
<form method="post">
  <label for="name">name</label>
  <input type="text" name="name"/>
  <label for="email">email</label>
  <input type="text" name="email"/>
  <label for="pass">password</label>
  <input type="password" name="pass"/>
  <input type="submit" value="insert"/>         <input type="submit" value="cancel" name="leave"/>
</form>
</body>
</html>
