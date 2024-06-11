<?php 

$action=isset($_REQUEST['action'])?$_REQUEST['action']:"";
require_once 'controllerStudent.php';

switch ($_SERVER["REQUEST_METHOD"]){
	case "GET":
		switch ($action){
			case "forma":
				include '../public/viewForma.php';
				break;
			case "logout":
				$cs=new controllerStudent();
				$cs->logout();
				break;
		}
		break;
		
	case "POST":
		switch ($action){
			case "Update":
				$cs=new controllerStudent();
				$cs->update();
				break;
		}
		break;
	
}
?>