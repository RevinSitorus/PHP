<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include 'database.php';
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT nama, nilai_rata FROM nilai_mahasiswa";
        $record = $conn->query($sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nilai Rata-Rata</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($record && $record->num_rows > 0): ?>
            <!-- 3. Loop through available records -->
            <?php while ($row = $record->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['nilai_rata']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?> 
            <tr>
                <td colspan="2">No records found.</td>
            </tr> 
        <?php endif; ?>
        </tbody>

    </table>
        <?php
        // 4. Close connection
        $conn->close();
        ?>
</body>
</html>

