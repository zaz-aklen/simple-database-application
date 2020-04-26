<?php
require_once "pdo.php";
session_start();
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['user_id'])){
  $spd="UPDATE user1 SET name=:name,
  email=:email,
  pass=:pass WHERE user_id=:user_id";
  $sql=$pdo->prepare($spd);
  $sql->execute(array(':name'=>$_POST['name'],':email'=>$_POST['email'],':pass'=>$_POST['pass'],':user_id'=>$_POST['user_id']));
  $_message="update successful";
  header('Location:app.php');
  return;
}
//echo $_GET['userid']." ".$_GET['name']." ".$_GET['email'];
 ?>
 <html><head></head>
 <body>
   <form method="post">
     <label for="name">name</label>
     <input type="text" name="name" value="<?=$_GET['name']?>"/>
     <label for="email">email</label>
     <input type="text" name="email" value="<?=$_GET['email']?>"/>
     <label for="pass">password</label>
     <input type="password" name="pass"/>
     <input type="hidden" name="user_id" value="<?=$_GET['userid']?>"/>
      <input type="submit" value="insert"/>         <input type="submit" value="cancel" name="leave"/>
   </form>
 </body>
 </html>
