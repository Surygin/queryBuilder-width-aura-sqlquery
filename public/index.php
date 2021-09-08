<?php 

require '../vendor/autoload.php';


//echo $_SERVER['REQUEST_URI'];

if ($_SERVER['REQUEST_URI'] == '/home'){
    require '../app/controllers/homepage.php';
}
exit;
