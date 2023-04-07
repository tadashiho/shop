<?php
$account = $_POST["account"] ?? null;
$password = $_POST["password"] ?? null;
// echo $account.$password;

$link=@mysqli_connect(
   'localhost',
   'root',
   'mysql',
   'car',
);

if ( !$link ) {
   echo "mysql disconnect<br>";
   exit();
}


//註冊 寫一筆資料進db
//且確定有接到帳號才執行
if ($account &&  $password){
   $sql = "INSERT INTO `userinfo` (`account`, `password`) VALUES ('$account', '$password');";
   $result = mysqli_query($link , $sql);
   // $row = mysqli_fetch_all($result);  //insert不需要

   echo "<p align='center'>註冊成功 請重新登入 <a href='login.php'>回登入畫面</a></p>";
   //重定向瀏覽器 
   // header("Location: login.php"); 
   //確保重定向後，後續代碼不會被執行 
   exit;
}
?>

<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <title>register</title> 
   <style>
      input:focus { background-color:yellow; }
      .center{text-align: center;}
   </style>
</head>
<body>
   <div class="center">
      <form action="register.php" method="post">
         <h1>請輸入帳號密碼完成註冊</h1>
         <p>帳號:<input type="text" name="account" require></p>
         <p>密碼:<input type="password" name="password" require></p>
         <p><input type="submit" value="確認">
         <input type="reset" value="取消"></p>
      </form>
      <a href="login.php" >回到登入</a>
   </div>
</body>
</html>