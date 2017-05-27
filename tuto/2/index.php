<?php include '../../mechanics/head.part.php'; ?>
<body>
	<?php include '../../mechanics/header.part.php'; ?>
	<br />
	<center>
		<div class="body">
			Bienvenue sur ce tutoriel de Koggen.tk, 
			ici je vous présenterai plusieurs failles 
			une par une avec la méthode pour la contrer.
			<br />
			<h1>La faille XSS</h1>
			<br />
			Cette faille est à peu près semblable à la 
			précédente puisque la solution est quasi la 
			même. Imaginons que nous voulons faire un 
			formulaire d'inscription sur notre petit 
			site web, ce site a une base de données qui 
			enregistre les informations de ses membres, 
			par exemple le nom, le prénom, le mot de passe, 
			le sexe, l'avatar, la description etc. Ces 
			informations seront entrés à l'aide d'un 
			formulaire, et vos contraites sont directement 
			imposé par le formulaire de façon que l'utilisateur 
			ne puisse pas entrer un caractère de plus que la 
			limite permise et qu'il ne puissent pas mettre des 
			signes spéciaux du genre <>""'' (on sait à quel 
			point ils sont dangereux les guillemets). C'est 
			génial tout fonctionne, personne ne peut mettre de 
			mauvais truc dans votre formulaire.
			<br />
			Le problème avec ce truc c'est que peut importe la 
			sévérité de votre formulaire, rien n'oblige son 
			utilisation. Rien empêche un méchant de créer son 
			propre formulaire et de l'envoyer sur votre page de 
			réception avec tout les méchants signes et noms trop 
			long à l'intérieur. Pour contrer cette faille vous 
			devrez revéfier tous les champs du formulaire sur 
			le serveur en PHP avec htmlspecialchars et des regex.
			<br />
			<h1>La faille HeartBleed</h1>
			<br />
			Notre passage sur HeartBleed sera très court puisque 
			cette faille est encore très exploitable. Cette faille 
			permet d'accéder aléatoirement à la mémoire vive d'un 
			système utilisant OpenSSL. Cette faille est une erreur 
			de la part de OpenSSL et la seule façon de la contrer et 
			de mettre celui ci à jour.
			<br />
			<h1>Remote File Inclusion</h1>
			<br />
			Cette faille consiste à faire entrer un code javascript 
			dans une page afin de gêner ou de bloquer l'accès du site 
			à d'autrex personnes. Cette faille est assez vague elle 
			peut être utilisée nà l'aide de la faille XSS ou par d'autres 
			méthodes. La méthode peut varier selon le site web. Je vais 
			vous présenter un exemple très simpliste qui fonctionne par 
			l'adresse URL. Notre adresse:
			<br />
			http://www.exemple.com/message.php?pseudo=Koggen&message=bonjour
			<br />
			<em class="code">
			<?php echo htmlspecialchars('
			<?php
				echo $_GET[\'pseudo\'].\': \'.$_GET[\'message\'].\'<br />\';
			?>
			');?>
			</em>
			<br />
			Comme on peut le voir ici, le site récupère le pseudo et 
			le message dans l'url sans ce douter que quelqu'un pourrait 
			y insérer un JavaScript qui ferrait ce qu'il veut avec le 
			client. La solution est simple pour celle ci encore vous devez
			vous assurrez que toutes vos entrées sont gérées par le htmlspecialchars() 
			en php.
			<br />
			<!-- <a class="nextpage" href="<?php echo $root; ?>tuto/3">Suite</a> -->
		</div>
	</center>
	<br />
	<?php include '../../mechanics/footer.part.php'; ?>
</body>