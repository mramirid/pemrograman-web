<?php 
    include('conn.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['no'])) {
            $noDelete = $_GET['no'];
            $deleteQuery = "DELETE FROM `profile` WHERE `no` = '$noDelete'"; 
            mysqli_query(connection(), $deleteQuery);
  
            // Kembali ke home
            header('Location: index.php');
        }  
    }
?>