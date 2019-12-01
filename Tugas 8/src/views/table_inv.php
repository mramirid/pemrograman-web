<?php

require_once("../functions/inv.php");

$jenis = $_POST["jenis"];
$kondisi = $_POST["kondisi"];

$filtered_data = get_filtered_data($jenis, $kondisi);

echo "<table border='1'>";
    echo "<th>Kode Inventaris</th>";
    echo "<th>Jenis</th>";
    echo "<th>Nama Fakultas</th>";
    echo "<th>Username</th>";
    echo "<th>Password</th>";

    while ($row = mysqli_fetch_assoc($filtered_data)) { 
        echo "<tr>";
            echo "<td>".$row["kode_inv"]."</td>";
            echo "<td>".$row["jenis"]."</td>";
            echo "<td>".$row["nm_fakultas"]."</td>";
            echo "<td>".$row["barang"]."</td>";
            echo "<td>".$row["kondisi"]."</td>";
        echo "</tr>";
    }
echo "</table>";