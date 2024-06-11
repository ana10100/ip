<?php
session_start();
require_once "DAO.php";

class controllerPrisustva {
    function insert() {
        $brRadnika = isset($_POST["brRadnika"]) ? $_POST["brRadnika"] : "";
        $trajanjePrisustva = isset($_POST["trajanjePrisustva"]) ? $_POST["trajanjePrisustva"] : "";

        if (!empty($brRadnika) && !empty($trajanjePrisustva)) {
            if ($trajanjePrisustva >= 60) {
                $dao = new DAO();
                $success = $dao->insert($brRadnika, $trajanjePrisustva);

                if ($success) {
                    $_SESSION["prisustvo_id"] = $dao->getLastInsertId();
                    $_SESSION["prisustvo_min"] = $dao->getMin();
                    $_SESSION["prisustvo_brRadnika"] = $brRadnika;
                    $_SESSION["prisustvo_uneto"] = $trajanjePrisustva; // Set the entered presence duration
                    header('Location: ../public/prikaz.php');
                    exit();
                } else {
                    $msg = "Neuspešan unos!";
                    include '../public/viewForm.php';
                }
            } else {
                $msg = "Trajanje prisustva mora biti najmanje 60 minuta!";
                include '../public/viewForm.php';
            }
        } else {
            $msg = "Unesite sva polja!";
            include '../public/viewForm.php';
        }
    }

    function logout() {
        if (isset($_SESSION["prisustvo_id"])) {
            session_unset();
            session_destroy();
        }
        header("Location: ../public/viewForm.php");
        exit();
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$controller = new controllerPrisustva();

if ($action == 'insert') {
    $controller->insert();
} elseif ($action == 'logout') {
    $controller->logout();
} else {
    echo "Invalid action!";
}
?>
