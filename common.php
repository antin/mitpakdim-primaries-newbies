<?php
session_start();
include "settings.php";

function check_session() {
    global $_SESSION;
    if (!isset($_SESSION['CA_USER']) || !isset($_SESSION['CA_NAME'])) {
        header( 'Location: login.php?err=nologin' );
        exit();
    }
}

function connecti() {
    global $settings;
    $db = $settings["db"]["readwrite"];
    $con = mysqli_connect($db["hostname"],$db["username"], $db["password"]) OR DIE ("{ type: 'error', msg: 'DB_CONN' }");
	mysqli_select_db($con, $db["dbname"]);
	mysqli_query($con, "SET NAMES utf8");
    return $con;
}

function connect() {
    global $settings;
    $db = $settings["db"]["readwrite"];
    $con = mysql_connect($db["hostname"],$db["username"], $db["password"]) OR DIE ("{ type: 'error', msg: 'DB_CONN' }");
    mysql_select_db($db["dbname"]);
    mysql_query("SET NAMES utf8");
    return $con;
}

function connect_readonly() {
    global $settings;
    $db = $settings["db"]["readonly"];
    $con = mysql_connect($db["hostname"],$db["username"], $db["password"]) OR DIE ("{ type: 'error', msg: 'DB_CONN' }");
    mysql_select_db($db["dbname"]);
    mysql_query("SET NAMES utf8");
    return $con;
}

?>
