<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Atribut spesifik (Anak)
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // METHOD OVERRIDING - Ditambah biaya flat Rp 35.000
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->harga_dasar_tiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        $kacamata = $this->kacamata3dId ? $this->kacamata3dId : "Tidak Ada";
        return "Kacamata 3D ID: " . $kacamata . ", Fitur Gerak: " . $this->efekGerakFitur;
    }
}
?>