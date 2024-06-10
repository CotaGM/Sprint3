<?php 
require_once "Person.php";
require_once "CarKeys.php";
require_once "HouseKeys.php";
require_once "PublicTransportationCard.php";
require_once "Smartphone.php";
require_once "Wallet.php";

$wallet = new Wallet();
$houseKeys = new HouseKeys();
$carKeys = new CarKeys();
$publicTransportationCard = new PublicTransportationCard();
$smartphone = new Smartphone();

$person = new Person();

$person -> items= [$wallet, $houseKeys, $carKeys, $publicTransportationCard, $smartphone];

//llamada a metodo salida
$person -> getOutHome();

?>