<?php
 
// inicia a sessão
session_start();
 
// muda o valor de logged_in para false
$_SESSION['logged_in'] = false;
 
// finaliza a sessão
unset($_SESSION['login']);
 
// retorna para a index.php
header('Location: ../../');