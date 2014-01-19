<?php
    $no_header = true;
    $_SESSION = array();
    session_destroy();
    $url = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']); // Chemin du cookie
    setcookie('sk_userconnect', '', 0, $url);
    header('Location: index.php');
?>