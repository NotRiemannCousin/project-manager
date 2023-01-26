<?php
// include 'rb-mysql.php';

// R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');



$s = "asvfvkmfavpã~éáà";

// // $dev = R::load('zzzzzz', 2);

echo '<pre>';

print_r($s);
// // print_r($dev);
echo "\n\n";
// // print_r($dev->credencial);

print_r (preg_replace("/[^\p{L}\s]/u", "", $s));
echo '</pre>';


// $devs = R::findAll('desenvolvedor');
// $creds = R::findAll('credencial');


// foreach($devs as $dev){
//     $dev->credencial = $creds[$dev->id];
//     R::store($dev);
// }

