<?php
// $logout = $_POST["del_session"] ?? null;
// if($logout){
    session_start() ;
    session_destroy() ;
    header ("Location: login.php");
// }

?>