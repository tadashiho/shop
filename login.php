<?php
$account = $_POST["account"] ?? null;
$password = $_POST["password"] ?? null;
// echo $account.$password;

//SQL連線
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

//登入
//確定有接到帳號才執行
if ($account) {

   $sql = "SELECT * FROM `userinfo` WHERE account= '$account';";
   // echo $account;
   $result = mysqli_query($link , $sql);

   $row = mysqli_fetch_all($result);

   if (empty($row)) {
      echo "帳號密碼錯誤請從新登入";
   }else {

      if ($row[0][0] !=$account || $row[0][1] !=$password) {
         echo "帳號密碼錯誤請從新登入";
      }else {
         echo "登入成功";

         session_start();
         $_SESSION["username"] = $account;
         header ("Location: homepage.php");
      }
   }
   

   // if (!$result = mysqli_query($link , $sql)) {
   //    echo "帳號密碼錯誤請從新登入";
   //    // var_dump($result);
   // }else {
   //    $row = mysqli_fetch_all($result);
   //    // var_dump($row);
   //    print_r($row[0][0]);
   // }
 }

?>

<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <title>login</title> 
   <style>
      input:focus { background-color:yellow; }
      .center{text-align: center;}
   </style>
</head>
<body>
   <div class="center">
      <form action="login.php" method="post">
         <h1>請輸入帳號密碼</h1>
         <p>帳號:<input type="text" name="account" required></p>
         <p>密碼:<input type="password" name="password" required></p>
         <p><input type="submit" value="確認">
         <input type="reset" value="取消"></p>
      </form>
      沒有密碼?<a href="register.php" >註冊</a>
   </div>
</body>
</html>
