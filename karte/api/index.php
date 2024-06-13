<?php
require 'flight/Flight.php';
require_once '../karte/DAO.php'; 

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /karta/@id', function($id){
    $dao = new KartaDAO();
    $result = $dao->getKarta($id);
    
    if ($result) {
        Flight::json($result);
    } else {
        Flight::halt(404, "Karta sa ID-em $id nije pronađena.");
    }
});

Flight::route('GET /karte/polazak/@polazak', function($polazak){
    $dao = new KartaDAO();
    $result = $dao->nadjiSve($polazak);
    
    if ($result) {
        Flight::json($result);
    } else {
        Flight::halt(404, "Nema karata sa polaskom iz $polazak.");
    }
});

Flight::start();
?>
