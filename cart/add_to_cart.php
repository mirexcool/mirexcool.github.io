<?php

session_start();

$_SESSION['cart'][] = $_GET['id'];
echo "Товар добавлен в корзину!";
header('Location:../index.php');
?>
