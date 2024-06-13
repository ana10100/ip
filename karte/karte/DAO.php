<?php
require_once '../config/db.php';

class KartaDAO {
    private $db;

    private $SELECT_BY_ID = "SELECT * FROM karte WHERE id = ?";
    private $SELECT_BY_POLAZAK = "SELECT * FROM karte WHERE polazak = ?";

    public function __construct() {
        $this->db = DB::createInstance();
    }

    public function getKarta($id) {
        $statement = $this->db->prepare($this->SELECT_BY_ID);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function nadjiSve($polazak) {
        $statement = $this->db->prepare($this->SELECT_BY_POLAZAK);
        $statement->bindValue(1, $polazak, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
