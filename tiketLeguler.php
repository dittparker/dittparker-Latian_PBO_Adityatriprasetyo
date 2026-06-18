<?php
require_once 'Tiket.php';

class TiketReguler extends Tiket {
    // Atribut spesifik (Anak)
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $tipeAudio, $lokasiBaris) {
        // Melempar data ke parent constructor (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // METHOD OVERRIDING - Menghitung total harga reguler (Standar)
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->harga_dasar_tiket;
    }

    // Implementasi method abstrak dari induk
    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipeAudio . ", Baris Kursi: " . $this->lokasiBaris;
    }
}
?>