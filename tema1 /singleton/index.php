<?php
include_once "tigger.php";

$tigger1 = Tigger::getInstance();
$tigger2 = Tigger::getInstance();

for ($i = 0; $i < 10; $i++){
    $tigger1 -> getRoar();
}

echo "Tigger ha rugido". $tigger1 -> getCounter() . " veces <br>";
?>