<?php
require_once '../prisustvo/DAO.php';
session_start();

if (!isset($_SESSION["prisustvo_id"])) {
    header("Location: ../public/index.php");
    exit();
}

$dao = new DAO();
$prisustvo_min = $dao->getMin();
$prisustvo_id = $_SESSION["prisustvo_id"];
$prisustvo_brRadnika = $_SESSION["prisustvo_brRadnika"];
$prisustvo_uneto = isset($_SESSION["prisustvo_uneto"]) ? $_SESSION["prisustvo_uneto"] : 0; // Check if the session variable is set

$razlika = $prisustvo_uneto - $prisustvo_min["trajanjePrisustva"];
$boja = $razlika >= 0 ? 'positive' : 'negative';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Prikaz Prisustva</title>
    <style>
        .positive { color: green; }
        .negative { color: red; }
    </style>
</head>
<body>
    <h1>Prikaz Prisustva</h1>
    <p>Korisnik: <?php echo htmlspecialchars($prisustvo_brRadnika); ?></p>
    <p>Id: <?php echo htmlspecialchars($prisustvo_id); ?></p>
    <p>Minimalno prisustvo: <?php echo htmlspecialchars($prisustvo_min["trajanjePrisustva"]); ?> minuta</p>
    <p>Vaše prisustvo: <?php echo htmlspecialchars($prisustvo_uneto); ?> minuta</p>
    <p>Razlika: <span class="<?php echo $boja; ?>"><?php echo htmlspecialchars($razlika); ?> minuta</span></p>
    <a href="../prisustvo/controllerPrisustva.php?action=logout">LOGOUT</a>
</body>
</html>
