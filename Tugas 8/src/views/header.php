<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventaris</title>
    <link rel="stylesheet" href="views/style.css">
    <link rel="stylesheet/less" type="text/css" href="views/style.less">
    <script src="js/less.min.js"></script>
</head>
<body>
    <header>
        <h1>Aplikasi Pendataan Inventaris Universitas</h1>
        
        <br>

        <nav>
            <a href="index.php">Home</a>

            <!-- Jika user belum login maka tampilkan, jika sudah login, tampilkan tombol logout saja -->
            <?php if (!isset($_SESSION["user"])) { ?>
                <a href="login.php">Login</a>
            <?php } else { ?>
                <a href="logout.php">Logout</a>
            <?php } ?>
        </nav>
    </header>