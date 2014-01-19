<?php
    $sqlite = new PDO('sqlite:private/data.db');
    if(isset($_POST['id'], $_POST['titre'], $_POST['note']) && !empty($_POST['id'])){
        $titre = $sqlite->quote(preg_replace('"\b(https?://\S+)"', '<a href="$1">$1</a>', htmlentities($_POST['titre'])));
        $note = $sqlite->quote(preg_replace('"\b(https?://\S+)"', '<a href="$1">$1</a>', nl2br(htmlentities($_POST['note']))));
        
        $sqlite->query('UPDATE notes SET title=' . $titre . ', note=' . $note . ' WHERE id=' . $sqlite->quote($_POST['id']) . ' AND user_id=' . $sqlite->quote($_SESSION['id']));
    }
    header('Location: ../index.php');
?>