<?php

echo 'This is Home page<br><br> ';

use App\queryBuilder;

$db = new queryBuilder();

//$result = $db->getAll('posts');
$result = $db->getOne('posts', 2);

//$db->update('posts', [
//    'title' =>  'Insert -v2',
//    'body'  =>  'This is test new method Insert -v2'
//], 3);

//$db->delete(3, 'posts');

var_dump($result);
