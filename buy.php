<?php
session_start();
// print_r($_SESSION["list"]);
// print_r($_SESSION['price']);
$usrename = $_SESSION['username'];

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


$list=[];
foreach ($_SESSION["list"] as $key => $value){

    if ($value > 0){
        $list[$key][0]= $value;
        $list[$key][1]= $value*$_SESSION['price'][$key];

    }
}
// print_r ($list);
$today = date('Y/m/d H:i:s');
foreach ($list as $k => $v){
    $sql = "INSERT INTO `buy_list` (`account` , `product`, `amount`, `total_money` , `date`) VALUES ('{$_SESSION['username']}','{$k}','{$v[0]}','{$v[1]}','{$today}');";

    $result = mysqli_query($link , $sql);

    $sql = "UPDATE `product` SET amount = amount -{$v[0]} WHERE name = '{$k}';";
    $result = mysqli_query($link , $sql);

}

echo "下單成功";
for ($i=1;$i<=8;$i++){
    $_SESSION["product{$i}"]=0;
}
echo "<a href='homepage.php'>回到首頁</a>" ;
?>