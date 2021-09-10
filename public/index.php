<?php 

require '../vendor/autoload.php';

// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');

//echo $_SERVER['REQUEST_URI'];

if ($_SERVER['REQUEST_URI'] == '/home'){
    // Render a template
    echo $templates->render('homepage', ['name' => 'Toha']);
} elseif ($_SERVER['REQUEST_URI'] == '/about') {
    // Render a template
    echo $templates->render('about', ['name' => 'Toha']);
} elseif ($_SERVER['REQUEST_URI'] == '/contacts') {
    // Render a template
    echo $templates->render('contacts', ['name' => 'Toha']);
} else  {
    echo $templates->render('404');
}
