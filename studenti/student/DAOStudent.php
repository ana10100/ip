<?php
require_once '../config/db.php';

class DAOStudent {
    private $db;

    public function __construct() {
        $this->db = DB::createInstance();
    }

    public function studentExist($id) {
        $statement = $this->db->prepare("SELECT * FROM student WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $ime, $prezime, $brIndeksa) {
        $statement = $this->db->prepare("UPDATE student SET ime = ?, prezime = ?, brIndeksa = ? WHERE id = ?");
        return $statement->execute([$ime, $prezime, $brIndeksa, $id]);
    }
}
?>
