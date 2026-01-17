<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
</head>
<body>
    <h1>Selamat Datang di KELEKAK.ID</h1>
    <h3>Daftar Kosa Kata:</h3>
    
    <table border="1">
        <tr>
            <th>Indonesia</th>
            <th>Daerah</th>
            <th>Filosofi</th>
        </tr>
        <?php foreach ($kamus as $k) : ?>
        <tr>
            <td><?= $k['kata_indonesia']; ?></td>
            <td><?= $k['kata_daerah']; ?></td>
            <td><?= $k['filosofi']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>