<?php
$produk = [
    ["nama" => "Parfume YSL",  "kategori" => "Parfume",
       "harga" => 1800000, "stok" => 4,  "deskripsi" => "Parfum mewah dengan aroma floral yang tahan lama."],
    ["nama" => "Skintific Moisturizer", "kategori" => "Skincare",
      "harga" => 120000,  "stok" => 3,  "deskripsi" => "Pelembap untuk menjaga kelembapan dan skin barrier."],
    ["nama" => "Azarine SunScreen","kategori" => "Skincare",
      "harga" => 65000,   "stok" => 12, "deskripsi" => "Tabir surya ringan dengan perlindungan SPF 50."],
    ["nama" => "Vaseline LipBalm", "kategori" => "Skincare",
      "harga" => 18500,   "stok" => 0,  "deskripsi" => "Pelembap bibir agar tidak kering dan pecah-pecah."],
    ["nama" => "Parfume Velixir", "kategori" => "Parfume",
       "harga" => 250000,  "stok" => 6,  "deskripsi" => "Parfum dengan aroma segar untuk dipakai sehari-hari."],
    ["nama" => "Topi", "kategori" => "Aksesoris",
     "harga" => 42000,   "stok" => 0,  "deskripsi" => "Topi kasual yang nyaman dipakai untuk aktivitas harian."],
];
function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
 
function hitungDiskon($harga, $persen) {
    return $harga - ($harga * $persen / 100);
}
 
$batasDiskon   = 1000000;
$persenDiskon  = 10;
$totalProduk   = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
    
<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
<header>
    <div class="container nav">
        <div class="logo">Cia Store</div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#produk">Products</a></li>
                <li><a href="#footer">About</a></li>
            </ul>
        </nav>
    </div>
</header>
 
<main class="container">
  <section class="hero">
    <h1>CIA STORE</h1>
</section>
 
    <section id="produk">
        <div class="catalog-head">
            <h2>Katalog Produk</h2>
            <div class="total">Total Produk: <strong><?= $totalProduk; ?></strong></div>
        </div>
 
        <div class="grid">
            <?php foreach ($produk as $item) : ?>
                <?php
                    
                    $dapatDiskon = $item["harga"] >= $batasDiskon;
                    if ($dapatDiskon) {
                        $hargaAkhir = hitungDiskon($item["harga"], $persenDiskon);
                    }
 
                   
                    if ($item["stok"] > 0) {
                        $status = "Tersedia";
                        $kelasStatus = "ada";
                    } else {
                        $status = "Stok Habis";
                        $kelasStatus = "habis";
                    }
                ?>
                <article class="card">
                    <div class="kategori">
                        <?= $item["kategori"]; ?>
                        <?php if ($dapatDiskon) : ?>
                            <span class="badge-diskon">Diskon <?= $persenDiskon; ?>%</span>
                        <?php endif; ?>
                    </div>

                    
 
                    <h3><?= $item["nama"]; ?></h3>
                    <p class="deskripsi"><?= $item["deskripsi"]; ?></p>
 
                    <div class="harga-wrap">
                        <?php if ($dapatDiskon) : ?>
                            <div class="harga-coret"><?= rupiah($item["harga"]); ?></div>
                            <div class="harga promo"><?= rupiah($hargaAkhir); ?></div>
                        <?php else : ?>
                            <div class="harga"><?= rupiah($item["harga"]); ?></div>
                        <?php endif; ?>
                    </div>
 
                    <div class="stok-row">
                        <span>Stok: <?= $item["stok"]; ?></span>
                        <span class="status <?= $kelasStatus; ?>"><?= $status; ?></span>
                    </div>
 
                    <?php if ($item["stok"] > 0) : ?>
                        <button class="btn-beli">Beli Sekarang</button>
                    <?php else : ?>
                        <button class="btn-beli" disabled>Beli Sekarang</button>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
 
<footer id="footer">
    <div class="container">
        <h3>Tentang Cia Store</h3>
        <p>
            Cia Store adalah toko online sederhana yang menjual parfum, skincare,
            dan aksesoris. Kami ingin membantu pelanggan menemukan produk yang
            dibutuhkan dengan mudah, lengkap dengan informasi harga dan stok.
        </p>
        <p>
            Semua produk ditampilkan otomatis dari data yang tersimpan, jadi
            informasi harga, diskon, dan ketersediaan stok selalu sesuai dengan
            data terbaru di toko.
        </p>
        <p>
            Produk dengan harga Rp1.000.000 atau lebih mendapatkan diskon 10%.
            Produk yang stoknya habis tidak bisa dibeli sampai stok tersedia lagi.
        </p>
  </div>
</footer>
 
</body>
</html>