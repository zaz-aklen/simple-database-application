<?php
require_once "pdo.php";
session_start();
if(isset($_POST['id'])){
  $sql="DELETE FROM user1 WHERE user_id=:id";
  $spd=$pdo->prepare($sql);
  $spd->execute(array(':id'=>$_POST['id']));
  $_SESSION['message']="delete successful";
  header('Location:app.php');
  return;
}
if(!isset($_GET['id'])){
  $_SESSION['message']="invalid data";
  header('Location:app.php');
  return;
}
  $sql="SELECT name,user_id FROM user1 WHERE user_id=:id";
  $spd=$pdo->prepare($sql);
  $spd->execute(array(':id'=>$_GET['id']));
  $row=$spd->fetchAll(PDO::FETCH_ASSOC);
  if($row===false){
    $_SESSION['message']="invalid data";
    header('Location:app.php');
    return;
  }?>
  do u want to delete <?= $row[0]['name'] ?>
  <form method="post"><input type="hidden" name="id" value="<?=$row[0]['user_id'] ?>"/>
  <input type="submit" value="yes"/>  <a href="app.php">cancel</a></form>
