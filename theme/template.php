<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?> - Simple Keeper</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/png" href="theme/images/favicon.png" />      
		<style type="text/css">
		    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
		</style>
		<link type="text/css" rel="stylesheet" href="core/css.php" />
		<!-- Balises pour les mobiles -->
		<link rel="apple-touch-icon" href="theme/images/favicon.png" />
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
		<!-- Balises pour l'intégration à Windows 8.1 -->
		<meta name="application-name" content="Simple Keeper" />
		<meta name="msapplication-TileColor" content="#3a8cb2" />
		<meta name="msapplication-square70x70logo" content="theme/images/w_70.png" />
		<meta name="msapplication-square150x150logo" content="theme/images/w_1150.png" />
		<meta name="msapplication-wide310x150logo" content="theme/images/w_3150.png" />
		<meta name="msapplication-square310x310logo" content="theme/images/w_310.png" />
	</head>
	<body>
            <div id="masque">
            <form id="editeur" action="core/interact.php?action=modifier_note&token=<?php echo $_SESSION['token']; ?>" method="POST">
                    <input type="hidden" id="edit_id" name="id" />
                    <input tabindex="2" name="titre" id="edit_titre" type="text" autofocus />
                    <textarea tabindex="1" name="note" id="edit_note" required></textarea>
                    <input type="submit" tabindex="3" id="edit_valider" value="OK" />
                    <div class="clear"></div>
		</form></div>
		<nav>
			<ul>
				<li id="gauche">Bienvenue, <?php echo $_SESSION['uname']; ?></li>
				<li class="droite"><a href="?p=deconnexion">Déconnexion</a></li>
			</ul>
		</nav>
		
		<?php echo $content; ?>
		<script type="text/javascript" src="core/js.php"></script>
		<script>
var container = document.querySelector('#container_notes');
var msnry = new Masonry( container, {
  // options
  columnWidth: 0,
  itemSelector: '.rouge'
});
</script>
	</body>
</html>
