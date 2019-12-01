<?php

require_once("core/init.php");

if (!isset($_SESSION["user"])) {
    $_SESSION["message"] = "Anda harus login untuk mengakses halaman ini";
    header("Location: login.php");
}

require_once("views/header.php");

if (is_admin($_SESSION["user"])) { 
    $result = get_all_user_data(); ?>
    <h2>Hallo Admin</h2> <br>
    <table border="1">
        <th>NIP</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Username</th>
        <th>Password</th>

        <?php while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
                echo "<td>".$row["nopeg"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "<td>".$row["nm_fakultas"]."</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>".$row["password"]."</td>";
            echo "</tr>";
        } ?>
    </table>
<?php
} else { ?>
    <h2>Hallo User</h2> <br>
    
    <form action="post">
        <select id="jenis">
            <option value="">PILIH JENIS</option>
            <option value="KOMPUTER">Komputer</option>
            <option value="LCD">LCD</option>
            <option value="MEJA">Meja</option>
            <option value="KENDARAAN">Kendaraan</option>
        </select>
        <select id="kondisi">
            <option value="">PILIH KONDISI</option>
            <option value="BAIK">Baik</option>
            <option value="BARU">Baru</option>
            <option value="PERLU PERBAIKAN">Perlu Perbaikan</option>
        </select>
    </form>
    <button id="button-filter">Filter</button>

    <div id="table"></div>
<?php }

require_once("views/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        get_jenis = $("#jenis").val();
        get_kondisi = $("#kondisi").val();

        $("#button-filter").click(function() {
            $.ajax({
                url : "views/table_inv.php",
                method : "POST",
                data : {jenis : get_jenis, kondisi : get_kondisi}
            }).done(function(table) {
                $("#table").html(table);
            });
        });
    });
</script>