<?php

include "DatabaseHelper.php";
include "ArrayList.php";
include "Mahasiswa.php";
include "Predikat.php";

$NPM_AMIR = "17081010051";

$databaseHelper = new DatabaseHelper("localhost", "root", NULL, "akademik");
$connection = $databaseHelper->getConnection();

$query = "SELECT mahasiswa.npm, mahasiswa.nama, mahasiswa.prodi, mahasiswa.fakultas, mata_kuliah.nama_mk, nilai.nilai 
          FROM mahasiswa 
          INNER JOIN nilai ON mahasiswa.npm = $NPM_AMIR AND nilai.npm = mahasiswa.npm 
          INNER JOIN mata_kuliah ON nilai.kode_mk = mata_kuliah.kode_mk";

$queryResult = $connection->query($query);

$mahasiswaAmir = new Mahasiswa();
$listMataKuliah = new ArrayList();
$listNilai = new ArrayList();

$isBiodataReceived = false;
while ($tableRow = $queryResult->fetch_assoc()) {
    if (!$isBiodataReceived) {
        // Cukup ambil 1 kali saja
        $mahasiswaAmir->setNPM($tableRow['npm']);
        $mahasiswaAmir->setNama($tableRow['nama']);
        $mahasiswaAmir->setProdi($tableRow['prodi']);
        $mahasiswaAmir->setFakultas($tableRow['fakultas']);

        $isBiodataReceived = true;
    }

    $listMataKuliah->add($tableRow['nama_mk']);
    $listNilai->add($tableRow['nilai']);
}

$mahasiswaAmir->setListMataKuliah($listMataKuliah);
$mahasiswaAmir->setListNilai($listNilai);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TRANSKRIP NILAI</title>
</head>

<body>
    <h2>TRANSKRIP NILAI</h2>

    <table>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td><?php echo $mahasiswaAmir->getNPM(); ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $mahasiswaAmir->getNama(); ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td><?php echo $mahasiswaAmir->getProdi(); ?></td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td><?php echo $mahasiswaAmir->getFakultas(); ?></td>
        </tr>
    </table>

    <br>

    <table border="1">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
            </tr>
        </thead>

        <?php

        $SKS = 3;
        $totalSKS = 0;
        $IPS = 0;
        for ($i = 0; $i < $mahasiswaAmir->getListNilai()->getSize(); ++$i) {
            echo "<tr>";
            echo "  <td>" . $mahasiswaAmir->getNPM() . "</td>";
            echo "  <td>" . $mahasiswaAmir->getNama() . "</td>";
            echo "  <td>" . $mahasiswaAmir->getProdi() . "</td>";
            echo "  <td>" . $mahasiswaAmir->getListMataKuliah()->getObject($i) . "</td>";
            echo "  <td>" . $mahasiswaAmir->getListNilai()->getObject($i) . "</td>";
            echo "</tr>";

            switch ($mahasiswaAmir->getListNilai()->getObject($i)) {
                case Predikat::A:
                    $IPS += (Predikat::MULTIPLIER_A * $SKS);
                    break;
                case Predikat::B:
                    $IPS += (Predikat::MULTIPLIER_B * $SKS);
                    break;
                case Predikat::C:
                    $IPS += (Predikat::MULTIPLIER_C * $SKS);
                    break;
                case Predikat::D:
                    $IPS += (Predikat::MULTIPLIER_D * $SKS);
                    break;
                case Predikat::E:
                    $IPS += (Predikat::MULTIPLIER_E * $SKS);
                    break;
            }

            $totalSKS += $SKS;
        }

        $IPS = $IPS / $totalSKS;

        ?>
    </table>

    <br>

    <table>
        <tr>
            <td>IPS</td>
            <td>:</td>
            <td><?php echo $IPS; ?></td>
        </tr>
    </table>
</body>

</html>