<?php
    ob_start('ob_gzhandler'); // On active la compression GZIP
    header('Content-Type: text/html; charset=utf-8'); // On défini l'encodage (UTF-8)
        
    session_start();
    
    if(file_exists('installation/install.php')) // Si le fichier d'installation existe, on redirige l'utilisateur
        header('Location: installation/index.php'); 
    
    ob_start();
        if(isset($_SESSION['uname'])){ // Si l'utilisateur est connecté
            $sqlite = new PDO('sqlite:core/private/data.db'); // On charge la base de données
                    
            if(!isset($_GET['p'])) // Page par défaut
                $_GET['p'] = 'notes';
                
            if(!file_exists('pages/' . $_GET['p'] . '.php')) // Si la page n'existe pas
                $_GET['p'] = '404';
        }
        else // Si l'utilisateur n'est pas connecté, on le redirige 
            $_GET['p'] = 'connexion';
            
        include './pages/' . $_GET['p'] . '.php'; // On inclu la bonne page
                
        $content = ob_get_contents();
        
        ob_end_clean();
            
        if(!isset($no_header)) // Doit-on charger le thème?
            include './theme/template.php';
        else
            echo $content;
    ob_end_flush();
?>