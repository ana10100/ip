<?php
session_start();
require_once '../karte/DAO.php';

class ControllerKarte {
    private $kartaDAO;

    public function __construct() {
        $this->kartaDAO = new KartaDAO();
    }

    public function kupiKarta($id) {
        error_log("Called kupiKarta with id: " . $id);
        if ($id <= 0 || !is_numeric($id)) {
            $_SESSION['errorMessage'] = "ID mora biti pozitivan broj.";
            header('Location: index.php');
            exit();
        }

        $karta = $this->kartaDAO->getKarta($id);
        if ($karta == null) {
            $_SESSION['errorMessage'] = "Karta sa datim ID-em nije pronađena.";
            header('Location: index.php');
            exit();
        }

        $_SESSION['karta'] = $karta;
        header('Location: ../public/prikaz.php');
        exit();
    }

    public function logout() {
        error_log("Called logout");
        session_destroy();
        header('Location: index.php');
        exit();
    }
}

$controller = new ControllerKarte();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST request received");
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $controller->kupiKarta($id);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    error_log("GET request received");
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        $controller->logout();
    } else {
        header('Location: index.php');
        exit();
    }
}
?>
