<?php
session_start();
// print_r($_SESSION["list"]);
// print_r($_SESSION['price']);

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

 $sql = "SELECT * FROM `buy_list` WHERE account= '{$_SESSION['username']}';";
 // echo $account;
 $result = mysqli_query($link , $sql);

 $row = mysqli_fetch_all($result);
//  print_r($row);
?>

<!doctype html>
<html lang='zh-tw'>
    <head>
        <meta charset="utf-8">
        <title>user_buy_list</title>
    </head>
    <body>
        <table border="1" align="center">
            <tr>
                <th>account</th>
                <th>product</th>
                <th>amount</th>
                <th>total_money</th>
                <th>date</th>
            </tr>

            <?php
            foreach ($row as $key => $value){
                echo "<tr><td>$value[0]</td> <td>$value[1]</td> <td>$value[2]</td> <td>$value[3]</td> <td>$value[4]</td></tr>";
            }
            ?>
        </table>
    </body>
</html>