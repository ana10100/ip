<!DOCTYPE html>
<html>
<head>
    <title>Unos Prisustva</title>
</head>
<body>
    <form action="prisustvo/controllerPrisustva.php?action=insert" method="post">
        <label for="brRadnika">Broj Radnika:</label>
        <input type="text" name="brRadnika" id="brRadnika">
        <br>
        <label for="trajanjePrisustva">Trajanje Prisustva (u minutima):</label>
        <input type="text" name="trajanjePrisustva" id="trajanjePrisustva">
        <br>
        <input type="submit" value="Unesi">
    </form>
    <?php if (isset($msg)) { echo "<p>$msg</p>"; } ?>
</body>
</html>
