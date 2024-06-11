<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretraga Košarkaša</title>
</head>
<body>
    <h1>Pretraga Košarkaša po ID-u</h1>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="controllerKosarkas.php" method="POST">
        <label for="id">Unesite ID košarkaša:</label>
        <input type="number" id="id" name="id" required>
        <button type="submit">Pretraži</button>
    </form>
</body>
</html>
