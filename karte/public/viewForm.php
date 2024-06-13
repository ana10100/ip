<?php
session_start();
$errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : null;
unset($_SESSION['errorMessage']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pretraga Karti</title>
    <script>
        function validateForm() {
            const id = document.getElementById("id").value;
            if (id === "" || isNaN(id) || id <= 0) {
                alert("Molimo unesite validan ID (pozitivan broj).");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Pretraga Karti</h1>
    <form action="controllerKarta.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="action" value="kupiKarta">
        <label for="id">Unesite ID karte:</label>
        <input type="text" id="id" name="id" />
        <button type="submit">Pretraži</button>
    </form>
    <div>
        <?php if ($errorMessage): ?>
            <p><?= htmlspecialchars($errorMessage) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
