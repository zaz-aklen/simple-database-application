<?php
require_once "pdo.php";
session_start();
if(isset($_POST['account']) && isset($_POST['pw'])){
  unset($_SESSION['account']);
  if($_POST['account']=='csev'&&$_POST['pw']=='umsi'){
    $_SESSION['account']=$_POST['account'];
    $_SESSION['message']="login success";
    header('Location:app.php');
    return;
  }
  else{
    $_SESSION['message']="incorrect password";
    header('Location:home.php');
    return;
  }
}
 ?>
 <html>
 <head></head>
 <body>
<?php if(isset($_SESSION['message'])){
  echo ('<p style="color:red">'.$_SESSION['message']."</p>\n");
  unset($_SESSION['message']);
} ?>
<!--- account=csev   password=umsi--->
<form method="post">
  <label for="account">account</label>
  <input type="text" name="account"/>
  <label for="pw">password</label>
  <input type="password" name="pw"/>
  <input type="submit" value="login"/>
</form>
for id password see comments
 </body>
 </html>
