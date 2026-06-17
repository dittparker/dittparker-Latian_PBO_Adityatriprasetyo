<?php
require_once 'Tiket.php';

class TiketReguler extends Tiket {
    // Properti tambahan spesifik
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor Subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $tipeAudio, $lokasiBaris) {
        // Melempar atribut global ke Constructor Abstract Class (Induk)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        
        // Mengisi atribut spesifik
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Implementasi metode hitung total harga
    public function hitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    // Implementasi metode tampilkan info fasilitas
    public function tampilkanInfoFasilitas() {
        return "Fasilitas Reguler: Audio " . $this->tipeAudio . " di Baris " . $this->lokasiBaris . ".";
    }
}
?>