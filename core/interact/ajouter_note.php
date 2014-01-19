<?php
    $sqlite = new PDO('sqlite:private/data.db');
    if(isset($_POST['titre'], $_POST['note'])){        
        $titre = $sqlite->quote(preg_replace('"\b(https?://\S+)"', '<a href="$1">$1</a>', htmlentities($_POST['titre'])));
        $note = $sqlite->quote(preg_replace('"\b(https?://\S+)"', '<a href="$1">$1</a>', nl2br(htmlentities($_POST['note']))));
        
        $sqlite->query('INSERT INTO notes (title, note, date, user_id) VALUES(' . $titre . ', ' . $note . ', ' . $sqlite->quote(time()) . ', ' . $sqlite->quote($_SESSION['id']) . ')');
    }
    header('Location: ../index.php');
?>