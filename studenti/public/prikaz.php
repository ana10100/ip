<?php 
require_once '../student/DAOStudent.php';
//error_reporting(0);
session_start(); 

if ($_SESSION["korisnik"] != ""){
    $dao = new DAOStudent();
    echo $_SESSION["korisnik"];
    echo "<br>";
    $student = $dao->getStudent($_SESSION['korisnik']);
?>

<html>
<head>
<title>Insert title here</title>
</head>
<body>
Id: <?= $student["id"] ?><br>
Ime: <?= $student["ime"] ?><br>
Prezime: <?= $student["prezime"] ?><br>
Broj indeksa: <?= $student["brIndeksa"] ?><br>
<a href="../student/?action=logout">LOGOUT</a>

</body>
</html>

<?php 
} else {
    header("Location:../index.php");
    exit(); // Dodajemo exit nakon header-a
}
?>
