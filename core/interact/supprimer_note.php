<?php
    $sqlite = new PDO('sqlite:private/data.db');
    if(isset($_GET['id'])){
        $sqlite->query('DELETE FROM notes WHERE id=' . $sqlite->quote($_GET['id']) . ' AND user_id=' . $sqlite->quote($_SESSION['id']));
    }
    header('Location: ../index.php');
?>