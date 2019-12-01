<?php

// Cegah SQL Injection
function escape($data)
{
    global $link;
    return mysqli_real_escape_string($link, $data);
}

// Cek kalau user ada di database
function cek_username($username)
{
    global $link;

    $username = escape($username);

    $query = "SELECT * FROM data_user WHERE username = '$username'";

    if ($result = mysqli_query($link, $query)) return mysqli_num_rows($result);
}

function cek_data($username, $pass)
{
    global $link;

    $username = escape($username);
    $pass = escape($pass);

    $query = "SELECT password 
              FROM data_user 
              WHERE password = '$pass' AND username = '$username'";
    $result = mysqli_query($link, $query);
    $received_pass = mysqli_fetch_assoc($result)["password"];

    if ($pass == $received_pass) return true;
    else return false;
}

function redirect_login($username)
{
    $_SESSION["user"] = $username;
    header("Location: index.php");
}

// Menguji status user (admin/user)
function is_admin($username)
{
    $username = escape($username);

    if ($username == "admin@admin.com") return true;
    else return false;
}

function flash_delete()
{
    echo $_SESSION["message"] . "<br><br>";
    unset($_SESSION["message"]);
}

function get_all_user_data()
{
    global $link;

    $query = "SELECT data_user.nopeg, data_user.nama, fakultas.nm_fakultas, 
              data_user.username, data_user.password 
              FROM data_user 
              INNER JOIN fakultas ON fakultas.kode_fakultas = data_user.kode_fakultas;";
    $result = mysqli_query($link, $query);

    return $result;
}