<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfolio Dafa</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<!-- NAVBAR -->
<header>
    <nav>
        <h2>Portofolio Dafa</h2>
        <div>
            <a href="#home">Home</a>
            <a href="#about">Tentang Saya</a>
            <a href="#cert">Sertifikat</a>
        </div>
    </nav>
</header>

<!-- HOME -->
<section id="home" class="hero">
    <img src="foto/FOTO KTM.jpeg">
    <h1>Halo 😃</h1>
    <p>Saya mahasiswa Sistem Informasi.</p>
</section>

<!-- ABOUT -->
<section id="about" class="about">
    <h2>Tentang Saya</h2>

    <?php
    $about = mysqli_query($conn, "SELECT * FROM about");
    while ($row = mysqli_fetch_assoc($about)) {
        echo "<p>{$row['deskripsi']}</p>";
    }
    ?>

    <h3>Keterampilan</h3>

    <?php
    $skill = mysqli_query($conn, "SELECT * FROM skill");
    while ($row = mysqli_fetch_assoc($skill)) {
    ?>
        <div class="skill">
            <span><?= $row['nama']; ?></span>
            <div class="progress">
                <div style="width:<?= $row['persen']; ?>%"></div>
            </div>
        </div>
    <?php } ?>

</section>

<!-- SERTIFIKAT -->
<section id="cert" class="cert">
    <h2>Sertifikat</h2>

    <div class="grid">
        <?php
        $sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat");
        while ($row = mysqli_fetch_assoc($sertifikat)) {
        ?>
            <div class="item">
                <img src="<?= $row['gambar']; ?>">
                <p><?= $row['nama']; ?></p>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>