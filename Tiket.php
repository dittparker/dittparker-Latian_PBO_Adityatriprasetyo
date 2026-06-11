<?php

// Menggunakan keyword 'abstract' untuk menandakan class ini adalah kelas abstrak
abstract class Tiket {
    
    // Properti Terenkapsulasi (protected) sesuai dengan kolom basis data
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $harga_dasar_tiket;

    /**
     * Constructor untuk memetakan langsung nilai dari kolom database saat objek dibuat
     */
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib dideklarasikan tanpa isi / body)
    // =========================================================================
    
    // Wajib diimplementasikan subclass untuk menghitung total harga berdasarkan jenis studio
    abstract public function hitungTotalHarga();

    // Wajib diimplementasikan subclass untuk menampilkan info fasilitas spesifiknya
    abstract public function tampilkanInfoFasilitas();

    // =========================================================================
    // GETTER METHODS (Opsional - Agar nilai protected bisa dibaca di luar class)
    // =========================================================================
    public function getIdTiket() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return $this->jadwal_tayang; }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
    public function getHargaDasarTiket() { return $this->harga_dasar_tiket; }
}

?>