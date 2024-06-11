<?php
session_start();
require_once '../kosarkasi/DAO.php';

if (!isset($_SESSION['kosarkas'])) {
    header('Location: index.php');
    exit();
}

$dao = new DAO();
$kosarkas = $_SESSION['kosarkas'];
$prosek = $dao->getProsek();
$brojPoena = $kosarkas['brpoena'];
$razlika = $brojPoena - $prosek;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz Košarkaša</title>
    <style>
        .positive { color: green; }
        .negative { color: red; }
    </style>
</head>
<body>
    <h1>Košarkaš sa ID: <?php echo htmlspecialchars($kosarkas['id']); ?></h1>
    <p>Ime: <?php echo htmlspecialchars($kosarkas['ime']); ?></p>
    <p>Prezime: <?php echo htmlspecialchars($kosarkas['prezime']); ?></p>
    <p>Broj poena: <?php echo htmlspecialchars($brojPoena); ?></p>
    <p>Prosečan broj poena svih košarkaša: <?php echo htmlspecialchars($prosek); ?></p>
    <p>Razlika u broju poena: 
        <span class="<?php echo ($razlika >= 0) ? 'positive' : 'negative'; ?>">
            <?php echo htmlspecialchars($razlika); ?>
        </span>
    </p>
    <a href="controller.php?action=logout">Logout</a>
</body>
</html>
