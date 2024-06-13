<?php
session_start();
require_once '../karte/DAO.php'; // Proverite da li je putanja tačna

if (!isset($_SESSION['karta'])) {
    $_SESSION['errorMessage'] = "Nema karte u sesiji. Molimo pokušajte ponovo.";
    header('Location: ../karte/index.php');
    exit();
}

$karta = $_SESSION['karta'];
$kartaDAO = new KartaDAO();
$karte = $kartaDAO->nadjiSve($karta['polazak']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rezultat Pretrage</title>
</head>
<body>
    <h1>Rezultat Pretrage</h1>
    <div>
        <h2>Detalji Karte sa ID-em <?= htmlspecialchars($karta['id']) ?></h2>
        <p>ID: <?= htmlspecialchars($karta['id']) ?></p>
        <p>Polazak: <?= htmlspecialchars($karta['polazak']) ?></p>
        <p>Odredište: <?= htmlspecialchars($karta['odrediste']) ?></p>
        <p>Vreme: <?= htmlspecialchars($karta['vreme']) ?></p>
        
        <h2>Sve karte sa polaskom iz <?= htmlspecialchars($karta['polazak']) ?></h2>
        <ul>
            <?php foreach ($karte as $k): ?>
                <li><?= htmlspecialchars($k['id']) ?> - <?= htmlspecialchars($k['polazak']) ?> do <?= htmlspecialchars($k['odrediste']) ?> u <?= htmlspecialchars($k['vreme']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <form action="../karte/controllerKarte.php" method="get">
        <input type="hidden" name="action" value="logout">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
