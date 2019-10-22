<?php 
function connection()
{
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "akademik";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

    if (!$conn)
        die('Connection Failed: '.mysqli_error());

    mysqli_select_db($conn, $dbName);

    return $conn;
}

class Predikat
{
    public const A = 4;
    public const B = 3;
    public const C = 2;
    public const D = 1;
    public const E = 0;
}

$sql = "SELECT mahasiswa.npm, mahasiswa.nama, mahasiswa.prodi, mata_kuliah.nama_mk, nilai.nilai FROM mahasiswa, mata_kuliah, nilai WHERE mahasiswa.npm = \'17081010051\' AND nilai.npm = mahasiswa.npm AND nilai.kode_mk = mata_kuliah.kode_mk";
    
$queryResult = mysqli_query(connection(), $sql);

$npm = array();
$nama = array();
$prodi = array();
$nama_mk = array();
$nilai = array();

$i = 0;
while ($data = mysqli_fetch_array($queryResult)):
    $npm[$i] = $data['npm'];
    $nama[$i] = $data['nama'];
    $prodi[$i] = $data['prodi'];
    $nama_mk[$i] = $data['nama_mk'];
    $nilai[$i] = $data['nilai'];
    ++$i;
endwhile;

$ips = 1;
$sks = 3;
for ($i = 0; $i < 5; ++$i) {
    switch ($nilai[$i]) {
        case Predikat::A:
            $ips = (Predikat::A * $sks);
            break;
        case Predikat::B:
            $ips = (Predikat::B * $sks);
            break;
        case Predikat::C:
            $ips = (Predikat::C * $sks);
            break;
        case Predikat::D:
            $ips = (Predikat::D * $sks);
            break;
        case Predikat::E:
            $ips = (Predikat::E * $sks);
            break;
    }
}
$ips /= (5 * $sks);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>No-2</title>


</head>
<body>
    <h2>TRANSKRIP NILAI</h2>

    <table>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td>17081010051</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>Amir Muhammad Hakim</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>Teknik Informatika</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td>Ilmu Komputer</td>
        </tr>
    </table>

    <table border="1">
        <thead>
            <tr align="center">
                <th>NPM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <?php echo "$ips" ?>
</body>
</html>