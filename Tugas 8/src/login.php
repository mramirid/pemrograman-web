<?php

require_once("core/init.php");

$error = "";

// Redirect ke index kalau user sudah login
if (isset($_SESSION["user"])) header("Location: index.php");

// Validasi login
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];

    if (!empty(trim($username)) && !empty(trim($pass))) {
        if (cek_username($username) != 0) {
            if (cek_data($username, $pass)) redirect_login($username);
            else $error = "Username/Password salah";
        } else $error = $username . " belum terdaftar";
    } else $error = "Field tidak boleh kosong!";
}

require_once("views/header.php");

// Pesan session (perintah untuk login dahulu)
if (isset($_SESSION["message"])) flash_delete();

?>

<form action="login.php" method="post">
    <label>Username</label> <br>
    <input type="email" name="username"> <br> <br>

    <label>Password</label> <br>
    <input type="password" name="password"> <br> <br>

    <input type="submit" name="submit" value="Login">

    <br> <br>

    <?php if ($error != "") { ?>
        <div id="error">
            <?= $error; ?>
        </div>
    <?php } ?>
</form>

<?php require_once("views/footer.php"); ?>