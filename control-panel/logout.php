<?php
session_start();
session_unset();
session_destroy();
header('REFRESH:.2;URL=login.php') ;
?>