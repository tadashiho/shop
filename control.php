<?php

class car
{  
    function __construct(){
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
         
        //  print_r($row);

        echo json_encode($row);

    }
    
}

$car = new car;

?>