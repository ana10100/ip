<?php
require_once '../kosarkasi/DAO.php';
session_start();

class controllerKosarkas {
    public function search() {
        $id = isset($_POST['id']) ? $_POST['id'] : '';

        if (!empty($id) && is_numeric($id) && $id > 0) {
            $dao = new DAO();
            $kosarkas = $dao->getKosarkas($id);

            if ($kosarkas) {
                $_SESSION['kosarkas'] = $kosarkas;
                header('Location: ../public/viewForm.php');
                exit();
            } else {
                $_SESSION['error'] = 'Košarkaš sa datim ID-jem nije pronađen.';
                header('Location: index.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Neispravan ID.';
            header('Location: index.php');
            exit();
        }
    }

    public function logout() {
        if (isset($_SESSION['kosarkas'])) {
            session_unset();
            session_destroy();
        }
        header('Location: index.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new controllerKosarkas();
    $controller->search();
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'logout') {
    $controller = new controllerKosarkas();
    $controller->logout();
} else {
    header('Location: index.php');
    exit();
}
?>
