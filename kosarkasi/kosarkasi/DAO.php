<?php
require_once '../config/db.php';

class DAO {
    private $db;

    private $GETPROSEK = "SELECT AVG(brpoena) AS prosek_poena FROM kosarkasi";
    private $GETKOSARKASI = "SELECT * FROM kosarkasi WHERE id = :id";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function getProsek() {
        try {
            $stmt = $this->db->query($this->GETPROSEK);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['prosek_poena'];
        } catch (PDOException $e) {
            echo 'Greska: ' . $e->getMessage();
        }
    }

    public function getKosarkas($id) {
        try {
            $stmt = $this->db->prepare($this->GETKOSARKASI);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Greska: ' . $e->getMessage();
        }
    }
}
?>
