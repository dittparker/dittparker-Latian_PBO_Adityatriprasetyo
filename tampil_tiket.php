<?php
// Memanggil seluruh file yang dibutuhkan
require_once 'koneksi.php';
require_once 'tiketLeguler.php';
require_once 'tiketIMAX.php';
require_once 'tiketVelvet.php';

// 1. Membuat koneksi database
$koneksiObj = new Koneksi();
// Pastikan properti $db di koneksi.php bersifat public atau protected dan bisa diakses
// Jika properti berupa protected, pastikan ada method getter atau diakses lewat class terpisah.
// Di sini kita asumsikan bisa diakses untuk proses penarikan data:
$db = $koneksiObj->db; 

// 2. Mengambil 20 data dari tabel_tiket
$sql = "SELECT * FROM tabel_tiket";
$result = $db->query($sql);

$daftarTiket = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        // 3. IMPLEMENTASI POLIMORFISME & INSTANSIASI DINAMIS
        // Memeriksa jenis_studio untuk menentukan class anak mana yang akan dibuat
        if ($row['jenis_studio'] == 'reguler') {
            $tiketObj = new TiketReguler(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['tipe_audio'], $row['lokasi_baris']
            );
        } elseif ($row['jenis_studio'] == 'IMAX') {
            $tiketObj = new TiketIMAX(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['kacamata_3d_id'], $row['efek_gerak_fitur']
            );
        } elseif ($row['jenis_studio'] == 'Velvet') {
            $tiketObj = new TiketVelvet(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['bantal_selimut_pack'], $row['layanan_butler']
            );
        }
        
        // Simpan objek konkrit ke dalam satu array terpusat
        $daftarTiket[] = $tiketObj;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket Bioskop </title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8fafc; margin: 30px; }
        h2 { text-align: center; color: #1e293b; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #1e293b; color: white; }
        tr:hover { background-color: #f1f5f9; }
        .badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 12px; text-transform: uppercase; }
        .reguler { background-color: #e0f2fe; color: #0369a1; }
        .imax { background-color: #fef3c7; color: #b45309; }
        .velvet { background-color: #fce7f3; color: #be185d; }
    </style>
</head>
<body>

    <h2>Laporan Data Tiket Bioskop </h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Jumlah Kursi</th>
                <th>Harga Dasar</th>
                <th>Jenis Studio</th>
                <th>Fasilitas Tambahan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarTiket as $tiket): ?>
                <tr>
                    <td><?= $tiket->getIdTiket(); ?></td>
                    <td><?= htmlspecialchars($tiket->getNamaFilm()); ?></td>
                    <td><?= $tiket->getJadwalTayang(); ?></td>
                    <td><?= $tiket->getJumlahKursi(); ?> Pcs</td>
                    <td>Rp <?= number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                    <td>
                        <?php 
                            $className = get_class($tiket); 
                            if($className == 'TiketReguler') echo '<span class="badge reguler">Reguler</span>';
                            elseif($className == 'TiketIMAX') echo '<span class="badge imax">IMAX</span>';
                            elseif($className == 'TiketVelvet') echo '<span class="badge velvet">Velvet</span>';
                        ?>
                    </td>
                    <td><?= $tiket->tampilkanInfoFasilitas(); ?></td>
                    <td><strong>Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>