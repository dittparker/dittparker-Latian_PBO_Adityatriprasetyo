<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik
    private $kacamata3dId;
    private $efekGerakFitur;

    // Constructor Subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Implementasi metode hitung total harga (Harga Dasar + Charge IMAX Rp 25.000 per tiket)
    public function hitungTotalHarga() {
        $biayaTambahanIMAX = 25000;
        return ($this->harga_dasar_tiket + $biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    // Implementasi metode tampilkan info fasilitas
    public function tampilkanInfoFasilitas() {
        $kacamata = $this->kacamata3dId ? $this->kacamata3dId : "Tidak memakai kacamata 3D";
        return "Fasilitas IMAX: Kacamata 3D ID (" . $kacamata . ") dengan Efek Gerak: " . $this->efekGerakFitur . ".";
    }
}
?>