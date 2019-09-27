<?php
    include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Daftar Nilai Siswa</h1>
    <form action="" method="post">
        <input style="height:39px" type="text" name="namasiswa" placeholder="nama siswa" />
        <input style="height:39px; margin-left: 20px" type="text" name="mapel" placeholder="mapel" />
        <input style="height:39px; margin-left: 20px" type="number" name="nilai" placeholder="nilai" />
        <button style="height:39px; margin-left: 40px; background-color: red; color: white;" type="submit" name="tbltambah"> Tambahkan</button>
    </form>
    <table border="1" style="width: 100%; margin-top:50px;">
        <tr style="background-color:blue; color: white;;">
            <th>No</th>
            <th>Nama</th>
            <th>Tabel</th>
            <th>Nilai</th>
        </tr>
        <?php
            $sqlagenda = mysqli_query($koneksi,"SELECT * FROM admin");
            $nomer = 1;
            while($fetchagenda = mysqli_fetch_array($sqlagenda)) {
                echo '<tr>';
                echo '<td>'.$nomer++.'</td>';
                echo '<td>'.$fetchagenda['nama_siswa'].'</td>';
                echo '<td>'.$fetchagenda['mapel'].'</td>';
                echo '<td>'.$fetchagenda['nilai'].'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>

<?php 
    if(isset($_POST['tbltambah'])) {
        $namasiswa = $_POST['namasiswa'];
        $mapel = $_POST['mapel'];
        $nilai = $_POST['nilai'];
        $sqltambah = mysqli_query($koneksi,"INSERT INTO admin(nama_siswa,mapel,nilai) VALUES('$namasiswa','$mapel','$nilai')");
        
         echo '<script>alert("Berhasil di Tambahkan")</script>';
         echo '<meta http-equiv="refresh" content="0">';
    }
?>