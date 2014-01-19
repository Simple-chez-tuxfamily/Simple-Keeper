<?php    
    // Pour permettre la connexion via cookie:
    if(isset($_GET['cookie'])){
        $_POST['pseudo'] = $_GET['pseudo'];
        $_POST['password'] = $_GET['password'];
    }
    
    if(isset($_POST['pseudo'], $_POST['password'])){
        $sqlite = new PDO('sqlite:private/data.db');
        
        if(empty($_GET['cookie']))
            $_POST['password'] = $sqlite->quote(sha1($_POST['pseudo'] . $_POST['password'] . $_POST['pseudo']));
        else
            $_POST['password'] = $sqlite->quote($_POST['password']);
            
        $_POST['pseudo'] = $sqlite->quote($_POST['pseudo']);
        
        $query = $sqlite->query('SELECT * FROM users WHERE username=' . $_POST['pseudo'] . ' AND password=' . $_POST['password']);
        $result = $query->fetch();
        
        if(isset($result['id'])){
            $_SESSION['id'] = $result[0];
            $_SESSION['uname'] = $result[1];
            $_SESSION['admin'] = $result[3];
            $_SESSION['token'] = md5(uniqid('', true));
            
            if(isset($_POST['keep'])){
                $url = str_replace('core/interact.php', '', $_SERVER['SCRIPT_NAME']); // Chemin du cookie
                setcookie('sk_userconnect', $result[1] . ';' . $result[2], (time() + 7776000),$url);
            }
            
            header('Location: ../index.php');
        }
        else{
            $url = str_replace('core/interact.php', '', $_SERVER['SCRIPT_NAME']); // Chemin du cookie
            setcookie('sk_userconnect','',1,$url);
            header('Location: ../index.php?erreur');
        }
    }
    else
        header('Location: ../index.php?erreur');
    
?>