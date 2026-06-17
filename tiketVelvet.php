<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik
    private $bantalSelimutPack;
    private $layananButler;

    // Constructor Subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Implementasi metode hitung total harga (Harga Dasar + Charge Layanan Luxury Rp 50.000 per tiket)
    public function hitungTotalHarga() {
        $biayaTambahanVelvet = 50000;
        return ($this->harga_dasar_tiket + $biayaTambahanVelvet) * $this->jumlah_kursi;
    }

    // Implementasi metode tampilkan info fasilitas
    public function tampilkanInfoFasilitas() {
        return "Fasilitas Velvet Luxury: Mendapatkan " . $this->bantalSelimutPack . " dan dilayani oleh " . $this->layananButler . ".";
    }
}
?>