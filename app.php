<?php
require_once "pdo.php";
session_start();
$sql=$pdo->query("SELECT * FROM user1");
$rows=$sql->fetchAll(PDO::FETCH_ASSOC);
 ?>
<html>
<head></head>
<body>
  <table border="1">
<?php foreach($rows as $row){
  echo "<tr><td>";
  echo($row['name']);
  echo("</td><td>");
  echo($row['email']);
  echo("</td><td>");
  echo('<form><a href="edit.php?userid='.$row['user_id'].'&name='.$row['name'].'&email='.$row['email'].'">edit</a></form>');
    echo("</td><td>");
  echo ('<form><a href="delete.php?id='.$row['user_id'].'">del</a></form>');
  echo("</td></tr>\n");
}
if(isset($_SESSION['message'])){
  echo"<p style="color:green">". $_SESSION['message']."</p>\n";
  unset($_SESSION['message']);
}
 ?>
  </table>
<a href="insert.php">add</a>|<a href="logout.php">logout</a>

</body>
</html>
