<?php
require 'flight/Flight.php';
require_once '../prisustvo/DAO.php';

Flight::route('/', function () {
    echo 'hello world';
});

Flight::route('GET /min', function () {
    $dao = new DAO();
    $result = $dao->getMin();
    Flight::json($result);
});

Flight::route('POST /prisustva/@id', function ($id) {
    $data = Flight::request()->data->getData();
    $brRadnika = isset($data['brRadnika']) ? $data['brRadnika'] : null;
    $trajanjePrisustva = isset($data['trajanjePrisustva']) ? $data['trajanjePrisustva'] : null;

    if ($brRadnika !== null && $trajanjePrisustva !== null) {
        $dao = new DAO();
        $success = $dao->insert($brRadnika, $trajanjePrisustva);
        if ($success) {
            $response = ['status' => 'success', 'message' => 'Record inserted successfully', 'id' => $dao->getLastInsertId()];
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to insert record'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid input'];
    }

    Flight::json($response);
});

Flight::start();
