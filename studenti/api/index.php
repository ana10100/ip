<?php
require 'flight/Flight.php';
require_once 'student/DAOStudent.php';

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /student/@id', function($id){
    $dao = new DAOStudent();
    $result = $dao->studentExist($id);
    echo json_encode($result);
});

Flight::route('PUT /student/@id', function($id){
    $dao = new DAOStudent();
    $ime = Flight::request()->data->ime;
    $prezime = Flight::request()->data->prezime;
    $brIndeksa = Flight::request()->data->brIndeksa;
    $result = $dao->update($id, $ime, $prezime, $brIndeksa);
    echo json_encode($result);
});

Flight::start();
