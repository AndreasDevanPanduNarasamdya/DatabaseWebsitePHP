<?php
require_once __DIR__ . '/../config.php';

class Mahasiswa {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNim($nim) {
        $sql = "SELECT * FROM mahasiswa WHERE nim = :nim";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nim, $nama, $jurusan) {
        $sql = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES (:nim, :nama, :jurusan)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jurusan', $jurusan);
        return $stmt->execute();
    }

    public function update($nim, $nama, $jurusan) {
        $sql = "UPDATE mahasiswa SET nama = :nama, jurusan = :jurusan WHERE nim = :nim";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jurusan', $jurusan);
        return $stmt->execute();
    }

    public function delete($nim) {
        $sql = "DELETE FROM mahasiswa WHERE nim = :nim";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword OR jurusan LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $likeKeyword = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
