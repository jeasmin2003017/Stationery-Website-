<?php

$conn = new mysqli('localhost', 'root', '', 'stationery_shop');


session_start();
session_unset();
session_destroy();

header('location:index.php');

?>