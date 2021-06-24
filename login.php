<!doctype html>
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'kiterisk';
$attempt = 0;
$conn = mysqli_connect($host,$user,$password,$database);
if (isset ($_POST['login'])){
  $user = $_POST['usrnm'];
  $password = $_POST['password'];
  if($attempt<4){
    $query = "SELECT * from informationuser WHERE username='".$user."' and password = '".$password."'";
    $result = mysqli_query($conn, $query);
    if ($result){
      if(mysqli_num_rows($result)){
        while(mysqli_fetch_array($result, MYSQL_BOTH)){

          echo'<script type="text/javascript">alert("Login Successful")</script>';
        }
      }
      else{
        $attempt++;
        echo '<script type="text/javascript">alert("Attemp"'.$attempt.'"failed")</script>';
      }
    }
  }
}

 ?>

<html>
<head>
  <title> Admin Login </title>
</head>

<body>
  <h1 align="center">Admin Log In</h1>
  <form method="POST" action="">
    <table align="center">
      <tr>
        <td><label for="u1">Username</label></td>
        <td><input type="text" name="usrnm" id="u1"></td>
      </tr>
      <tr>
        <td><label for="u2">Password</label></td>
        <td><input type="password" name="password" id="u2"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="login" value="Login" class="form-submit-button"></span></td>
      </tr>
    </table>
  </form>
</body>
