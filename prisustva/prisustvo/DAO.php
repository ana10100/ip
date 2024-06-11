<?php
require_once '../config/db.php';

class DAO {
    private $db;
    private $INSERTPRISUSTVO = "INSERT INTO Prisustva (brRadnika, trajanjePrisustva) VALUES(?, ?)";
    private $MIN = "SELECT * FROM Prisustva WHERE trajanjePrisustva = (SELECT MIN(trajanjePrisustva) FROM Prisustva)";

    public function __construct() {
        $this->db = DB::createInstance();
    }

    public function insert($brRadnika, $trajanjePrisustva) {
        $statement = $this->db->prepare($this->INSERTPRISUSTVO);
        $statement->bindValue(1, $brRadnika);
        $statement->bindValue(2, $trajanjePrisustva);
        return $statement->execute();
    }

    public function getMin() {
        $statement = $this->db->prepare($this->MIN);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastInsertId() {
        return $this->db->lastInsertId();
    }
}
?>
