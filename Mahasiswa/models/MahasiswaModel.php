<?php
require_once __DIR__ . '/../config/database.php';

class MahasiswaModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll($search = '') {
        $sql = "SELECT nim, nama, umur FROM mahasiswa";
        if (!empty($search)) {
            $search = $this->db->real_escape_string($search);
            $sql .= " WHERE nim LIKE ? OR nama LIKE ?";
        }
        $sql .= " ORDER BY nim ASC";
        
        $stmt = $this->db->prepare($sql);
        if (!empty($search)) {
            $searchParam = "%$search%";
            $stmt->bind_param("ss", $searchParam, $searchParam);
        }
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getByNim($nim) {
        $stmt = $this->db->prepare("SELECT nim, nama, umur FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nim, $nama, $umur) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nim, $nama, $umur);
        return $stmt->execute();
    }

    public function update($nim, $nama, $umur) {
        $stmt = $this->db->prepare("UPDATE mahasiswa SET nama = ?, umur = ? WHERE nim = ?");
        $stmt->bind_param("sis", $nama, $umur, $nim);
        return $stmt->execute();
    }

    public function delete($nim) {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        return $stmt->execute();
    }
}
?>