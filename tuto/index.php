<?php include '../mechanics/head.part.php'; ?>
<body>
	<?php include '../mechanics/header.part.php'; ?>
	<br />
	<center>
		<div class="body">
			Bienvenue sur ce tutoriel de Koggen.tk, 
			ici je vous présenterai plusieurs failles 
			une par une avec la méthode pour la contrer.
			<br />
			<h1>Avoir un mot de passe approprié</h1>
			<br />
			Savez-vous si vous avez un mot de passe approprié ? 
			Je vous invite à le vérifier grâce à ce site web et 
			à le modifier au besoin.
			<br />
			<a href="https://howsecureismypassword.net/">https://howsecureismypassword.net/</a>
			<br />
			Si vous n'arrivez pas à avoir un bon mot de passe, 
			essayez d'ajouter des synboles et des majucules. Ceci 
			correspond à contrer le cassage de mots de passe qui 
			consiste à essayer lettre par lettre les mots de passe 
			pour les craquer.
			<br />
			<h1>Injection SQL</h1>
			<br />
			L’injection SQL est une faille permettant 
			d’accéder à compte utilisateur dans une 
			base de données sans avoir le mot de passe. 
			Si vous ne connaissez pas les bases de 
			données et le SQL cela ne vous sera d’aucune 
			utilité. Pour les autres, imaginez-vous une 
			requête SQL bien banale pour permettre à 
			quelqu’un de se connecter à son compte 
			utilisateur sur votre site.
			<br />
			<em class = "code">
			$requete = $bdd->query('SELECT * FROM membre WHERE nom = "'.$_POST['nom'].'" AND motdepasse = "'.$_POST['motdepasse'].'"');
			</em>
			<br />
			L'utilisateur essaie de se connecter à 
			son compte et si la base de données 
			retourne un résultat, il a accès à son compte. 
			Le problème ici est que $_POST['nom'] et 
			$_POST['motdepasse'] n'ont pas été vérifié en 
			php avant, donc il peut s'y retrouver 
			n'importe quoi dans ces variables. Voilà des 
			exemples de ce qui pourrait se retrouver dans 
			ces variables.
			<br />
			<em class = "code">
			SELECT * FROM membre WHERE nom = "Jean" AND motdepasse = "secret"
			SELECT * FROM membre WHERE nom = "Michelle" AND motdepasse = "qwerty"
			SELECT * FROM membre WHERE nom = "Jean" OR nom = "Jean" AND motdepasse = "nimportequoi"
			</em>
			<br />
			Le tout est dans la dernière exemple, monsieur 
			le méchant a décidé d'entrer «Jean" OR 
			nom = "Jean» à la place de son pseudo, ce qui 
			lui permet d'accéder au compte de Jean sans 
			savoir le mot de passe puisqu'il a ajouté OR.
			Pour palier ce problème, vous devrez modifier 
			les entrés avant en php, empêcher les gens de 
			mettre des "" via le formulaire en javascript 
			ouvre une autre faille que j'expliquerai dans 
			la prochaine faille. Avant ça, voici la solution
			<br />
			<em class = "code">
			$requete = $bdd->query('SELECT * FROM membre WHERE nom = "'.htmlspecialchars($_POST['nom']).'" AND motdepasse = "'.htmlspecialchars($_POST['motdepasse']).'"');
			</em>
			<br />
			La fonction php transforme les guillements en 
			guillements spéciaux non-acceptés par la SQL, 
			vous pourrez donc sans crainte utiliser vote 
			espace membre. Faites attention cette faille 
			ne s'applique pas nécéssairement que pour des 
			sites webs, n'importe quelle application qui 
			intagit avec une base de donnée est à risques.
			<br />
			<a class="nextpage" href="<?php echo $root; ?>tuto/2">Suite</a>
		</div>
	</center>
	<br />
	<?php include '../mechanics/footer.part.php'; ?>
</body>