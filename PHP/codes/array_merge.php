<?php

$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$array3 = array(0, 1, 2, 3, 4);
$array4 = array(5, 6, 7, 8, 9);

// $ret1 = array_merge($array1, $array2);
// print_r($ret1);

// $ret11 = $array1 + $array2;
// print_r($ret11);
// $ret2 = array_merge($array1, array("color" => null));
// print_r($ret2);
// $ret3 = array_merge($array3, $array4);

// print_r($ret3);

// $ret4 = array_merge($array3, $array4);
// print_r($ret4);

// $ret5 = $array3 + $array4;
// print_r($ret5);

// $ret6 = array() + $array3  ;
// print_r($ret6);

// $ret7 = array_merge($array3, array());
// print_r($ret7);

$ret8 = array_merge($array3, null);
print_r($ret8);