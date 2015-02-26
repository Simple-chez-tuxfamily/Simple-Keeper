<?php
    if(isset($_SESSION['uname'])){
        echo '<div id="container">
		<form id="nouvelle_note" action="core/interact.php?action=ajouter_note&token=' . $_SESSION['token'] . '" method="POST">
                    <input tabindex="2" name="titre" id="titre" type="text" placeholder="Titre..." />
                    <textarea tabindex="1" name="note" id="note" placeholder="Ajouter une note..." required></textarea>
                    <input type="submit" tabindex="3" id="valider" value="OK" />
                    <div class="clear"></div>
		</form><div id="container_notes">';
	
        $query = $sqlite->query('SELECT * FROM notes WHERE user_id=' . $_SESSION['id'] . ' ORDER BY date DESC');
        while($result = $query->fetch())
            echo '<div class="note rouge" id="n' . $result['id'] . '"><h1>' . $result['title'] . '</h1><a class="supprimer" href="core/interact.php?action=supprimer_note&token=' . $_SESSION['token'] . '&id=' . $result['id'] . '">X</a><p>' . $result['note'] . '</p></div>';
        
        echo '</div></div>';
        
        $title = 'Mes notes';
    }
?>
