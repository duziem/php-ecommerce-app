<?php
session_start(); //start a session
ob_start(); //start output buffering

require "./database/database.php";

include "./database/product.php";

include "./database/cart.php";

include "./database/register.php";

include "./database/login.php";

include "./database/user.php";

include "./database/wishlist.php";

$db= new db();

$product= new product($db);

$cart= new cart($db);

$register= new register($db);

$login= new login($db);

$user= new user($db);

$wishlist= new wishlist($db);