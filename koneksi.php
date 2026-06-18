<?php

class Koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    // Menyesuaikan dengan nama database relasional di Tahap 3 kamu
    private $database = "db_LATIHAN_PBO_TI-1D_Adityatriprasetyo"; 
    public $db;

    public function __construct() {
        try {
            $this->db = new mysqli($this->host, $this->username, $this->password, $this->database);

            if ($this->db->connect_error) {
                throw new Exception("Koneksi gagal: " . $this->db->connect_error);
            }
        } catch (Exception $e) {
            echo "Terjadi kesalahan koneksi: " . $e->getMessage();
        }
    }
}
?>