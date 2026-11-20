<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 >Nilai Mahasiswa</h1>
    <form action="" method="POST">
        <label for="hadir">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <br>

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

        <button type="submit">Simpan</button>
    </form>

    <?php
        include 'database.php';

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 3. Check if form was submitted via POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve and trim inputs
            $nama = trim($_POST['nama']);
            $nilai = (int) $_POST['hadir'];
            $praktikum = (int) $_POST['Praktikum'];
            $uts = (int) $_POST['uts'];
            $uas = (int) $_POST['uas'];

            // Basic validation
            if (empty($nama)) {
                die("<h2 id='error'>Please provide valid input data.</h2>");
            }

            // 4. Prepare the SQL statement with placeholders (?)
            $stmt = $conn->prepare("INSERT INTO nilai_mahasiswa (nama, nilai_kehadiran, nilai_praktikum, nilai_uts, nilai_uas) VALUES (?, ?, ?, ?, ?)");

            // 5. Bind parameters: name is a string and the four scores are integers
            $stmt->bind_param("siiii", $nama, $nilai, $praktikum, $uts, $uas);

            // 6. Execute and check result
            if ($stmt->execute()) {
                echo "<h2 id='success'>Record saved successfully!</h2>";
            } else {
                echo "<h2 id='error'>Error saving record: " . $stmt->error . "</h2>";
            }
            // Close statement
            $stmt->close();
        }
        // Close connection
        $conn->close();
    ?>
</body>
</html>



