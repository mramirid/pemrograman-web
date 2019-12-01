<?php

require_once("db.php");

function get_filtered_data($jenis, $kondisi)
{
    global $link;

    $query = "SELECT data_inv.kode_inv, data_inv.jenis, fakultas.nm_fakultas, data_inv.barang, data_inv.kondisi 
              FROM data_inv 
              INNER JOIN fakultas ON fakultas.kode_fakultas = data_inv.kode_fakultas
              WHERE jenis = '$jenis' AND kondisi = '$kondisi'";
    $result = mysqli_query($link, $query);

    return $result;
}