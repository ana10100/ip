<?php
require 'flight/Flight.php';
require_once '../kosarkasi/DAO.php'; 

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /kosarkas/@id', function($id){
    $dao = new DAO(); 
    $result = $dao->getKosarkas($id);
    echo json_encode($result);
});


Flight::route('GET /prosek', function(){
    $dao = new DAO(); 
    $prosek = $dao->getProsek();
    echo json_encode($prosek);
});

Flight::start();
?>
