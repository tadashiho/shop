<?php

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

$sql = "SELECT * FROM `product`";
// echo $account;
$result = mysqli_query($link , $sql);

$row = mysqli_fetch_all($result);

session_start();
$ammount1 = $_POST["python"] ?? null;
$_amount1 = $_SESSION["product1"] ?? null;
$_SESSION["product1"] = $_amount1 + $ammount1;
// print_r ($_SESSION["username"]);
// echo $_SESSION["product"];
$ammount2 = $_POST["django"] ?? null;
$_amount2 = $_SESSION["product2"] ?? null;
$_SESSION["product2"] = $_amount2 + $ammount2;

$ammount3 = $_POST["python_機器學習"] ?? null;
$_amount3 = $_SESSION["product3"] ?? null;
$_SESSION["product3"] = $_amount3 + $ammount3;

$ammount4 = $_POST["spring_boot"] ?? null;
$_amount4 = $_SESSION["product4"] ?? null;
$_SESSION["product4"] = $_amount4 + $ammount4;

$ammount5 = $_POST["algorithm"] ?? null;
$_amount5 = $_SESSION["product5"] ?? null;
$_SESSION["product5"] = $_amount5 + $ammount5;

$ammount6 = $_POST["excel"] ?? null;
$_amount6 = $_SESSION["product6"] ?? null;
$_SESSION["product6"] = $_amount6 + $ammount6;

$ammount7 = $_POST["machine"] ?? null;
$_amount7 = $_SESSION["product7"] ?? null;
$_SESSION["product7"] = $_amount7 + $ammount7;

$ammount8 = $_POST["powerbi"] ?? null;
$_amount8 = $_SESSION["product8"] ?? null;
$_SESSION["product8"] = $_amount8 + $ammount8;

$_SESSION["list"] = ["python"=>$_SESSION["product1"], "django" => $_SESSION["product2"],"python_機器學習" => $_SESSION["product3"],"spring_boot"=>$_SESSION["product4"],
                    "algorithm"=>$_SESSION["product5"],"excel"=>$_SESSION["product6"],"machine"=>$_SESSION["product7"],"powerbi"=>$_SESSION["product8"]];

// print_r ($_SESSION["list"] );
echo "您好";
print_r ($_SESSION['username']);
// print_r ($row);
$price_box = [];
for ($i=0; $i<count($row); $i++) {
    $price_box[$row[$i][0]] = $row[$i][2];
}
$_SESSION['price'] = $price_box;
// print_r ($price_box);
?>

<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <title>index</title> 
   <link rel="stylesheet" href="style.css">
   <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js'></script>
</head>
<body>

    <img src="picture/笑臉.png" width="200" height="100" class="postion">
    <h1>微笑購物</h1>
    
    <form action="" method="" align="center" class="search_postion">
        <input type="text" placeholder="查詢" size="50">
        <input type="submit" value="送出">
    </form>

    <!-- <form action="homepage.php" method="post" class="logout" align="right"><input type="hidden" name="del_session" value="1"><input type="submit" value="登出"></form> -->
    <p align="right"> <a href="logout.php" class="logout">登出</a> <a href="buy_list.php" class="logout" target="_blank">購買紀錄</a> </p>

    <div id="car">
        <!-- <ol>
            <li v-for="product in info"> {{ info }}</li>
        </ol> -->

        <table border="1"  align="center">

            <tr>
                <td><img src="picture/python.jpg" width="300" height="400"></td>
                <td><img src="picture/django.jpg" width="300" height="400"></td>        
                <td><img src="picture/python_機器學習.jpg" width="300" height="400"></td>
                <td><img src="picture/spring_boot.jpg" width="300" height="400"></td>
                <td><img src="picture/algorithm.jpg" width="300" height="400"></td>
                <td><img src="picture/excel.jpg" width="300" height="400"></td>        
                <td><img src="picture/machine.jpg" width="300" height="400"></td>
                <td><img src="picture/powerbi.jpg" width="300" height="400"></td>
            </tr>

            <tr>
                <td v-for="(product,index) in info" :key="index"> 書名:{{ info[index][0] }} <br> 商品數量:{{ info[index][1] }} <br> 商品價錢:{{ info[index][2] }}</td>
            </tr>

            <tr>
                <td><form action="homepage.php" method="post"><input type="number" name="python"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="django"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="python_機器學習"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="spring_boot"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="algorithm"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="excel"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="machine"><input type="submit" value="加入購物車"></form></td>
                <td><form action="homepage.php" method="post"><input type="number" name="powerbi"><input type="submit" value="加入購物車"></form></td>
            </tr>
        </table>
    </div>

    <table border="1" align="center" style=" margin-top: 10px;">
        <caption>您的購物車內容</caption>
        <tr>
            <th>商品名稱</th>
            <th>數量</th>
            <th>價錢</th>
        </tr>

        <?php 
        foreach ($_SESSION["list"] as $key =>$value){
            echo "<tr>  <td>$key</td>  <td>$value</td>";
        ?>

        <td> <?php echo $value*$price_box["$key"]?>
        </td></tr>

        <?php
        }
        ?>
    </table>

    <form action="buy.php" method="post" align="center">
        <input type="submit" value="下單">
    </form>
 
</body> 
<script src="vue.js"></script>
</html>