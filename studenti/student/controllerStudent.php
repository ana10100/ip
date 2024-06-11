<?php

require_once "DAOStudent.php";
session_start();

class controllerStudent{
	function update(){
		$id=isset($_POST["id"])?$_POST["id"]:"";
		$ime=isset($_POST["ime"])?$_POST["ime"]:"";
		$prezime=isset($_POST["prezime"])?$_POST["prezime"]:"";
		$brIndeksa=isset($_POST["brIndeksa"])?$_POST["brIndeksa"]:"";

		if (!empty($id)&&!empty($ime)&&!empty($prezime)&&!empty($brIndeksa)){
			$dao=new DAOStudent();
			$postoji=$dao->studentExist($id);
			if ($postoji==true){
					
				$dao->update($id, $ime, $prezime, $brIndeksa);
				$_SESSION["korisnik"]=$id;
				//var_dump($_SESSION);
				//die();
				include '../public/prikaz.php';
					
			}else{
				$msg="Student sa datim brojem indeksa ne postoji";
				include '../public/viewForma.php';
			}
		}else{
			$msg="Morate popuniti sva polja";
			include '../public/viewForma.php';
		}

	}

	function logout(){
		if ($_SESSION["korisnik"]!=""){
			session_unset();
			session_destroy();
			include '../public/viewForma.php';
		}
	}
}

?>