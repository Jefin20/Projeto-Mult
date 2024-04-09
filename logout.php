<?php

if(isset($_SESSION)) {

}
session_destroy();

header("location: tela_login.php")
?>

