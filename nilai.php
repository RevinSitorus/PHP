<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 >Nilai Mahasiswa</h1>
    <form action="" method="POST">
        <label for="hadir">Nilai Kehadiran:</label><br>
        <input type="text" id="hadir" name="hadir"><br>
        <br>
        <label for="Praktikum">Nilai Praktikum:</label><br>
        <input type="text" id="Praktikum" name="Praktikum"><br>
        <br>
        <label for="uts">Nilai UTS:</label><br>
        <input type="text" id="uts" name="uts"><br>
        <br>
        <label for="uas">Nilai UAS:</label><br>
        <input type="text" id="uas" name="uas"><br>

        <button type="submit">Hitung</button>
    </form>

    <?php

 if ($_SERVER["REQUEST_METHOD"] == "POST"):
    $nilai = $_POST['hadir'] * (10/100);
    $praktikum = $_POST['Praktikum'] * (40/100);
    $uts = $_POST['uts'] * (25/100);
    $uas = $_POST['uas'] * (25/100);

    $total = $nilai + $praktikum + $uts + $uas;


    if ($total >= 85) {
        $huruf = 'A';
    } elseif ($total >= 80) {
        $huruf = 'A-';
    } elseif ($total >= 75) {
        $huruf = 'B+';
    } elseif ($total >= 70) {
        $huruf = 'B';
    } elseif ($total >= 65) {
        $huruf = 'B-';
    } elseif ($total >= 60) {
        $huruf = 'C+';
    } elseif ($total >= 55) {
        $huruf = 'C';
    } elseif ($total >= 50) {
        $huruf = 'C-';
    } elseif ($total >= 45) {
        $huruf = 'D+';
    } elseif ($total >= 40) {
        $huruf = 'D';
    } else {
        $huruf = 'E';
    };

    if ($huruf) {
    echo "<h2>Nilai Akhir: {$total} | Nilai Huruf: {$huruf}</h2>";}
endif;

?>
</body>
</html>



