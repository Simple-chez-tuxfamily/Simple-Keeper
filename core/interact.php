<?php
    /*
     * Interact.php est le *SEUL* fichier à appeler dans les fichiers js.
     * Usage : interact.php?action=fichier[&parametre1][&parametre2]
     * Attention: fichier ne doit PAS être accompagné de l'extension PHP
    */
    
    header('Content-Type: text/html; charset=utf-8'); // Encodage
        
    session_start();
        
    if(!isset($_GET['token']))
        $_GET['token'] = '';
        
    if($_GET['token'] == $_SESSION['token'])
        $has_access = true;
    elseif($_GET['action'] == 'connect')
        $has_access = true;
    else
        $has_access = false;
        
    if(!empty($_GET['action']) && file_exists('interact/' . $_GET['action'] . '.php') && $has_access == true)
        include './interact/' . $_GET['action'] . '.php';
    else
        header('HTTP/1.0 404 Not Found');
?>