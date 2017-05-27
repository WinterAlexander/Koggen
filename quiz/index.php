<?php include '../mechanics/head.part.php';
$form = array('Quelle fontion sécurise les chaîne de texte. (code dangereux)', 
'Écrivez tous les caractères spéciaux suceptible d\'injecter une SQL.', 
'Quel est le mot clé à mettre dans une requête SQL pour contourner la protection ?', 
'Quel est le logiciel à mettre à jour pour contrer la faille heartbleed ?');
$formAnswer = array('htmlspecialchars', '\'"', 'or', 'openssl');
$formAnswer2 = array('htmlspecialchars()', '\'\'""', 'or', 'open ssl');
$formAnswer3 = array('htmlspecialchars_decode', '\'\'"', 'or', 'open-ssl');
$formAnswer4 = array('htmlspecialchars_decode()', '\'""', 'or', 'open-ssl');
$state = 0;
$state += $_POST['currentId'];
$message = '';
if($_POST['reponse'] != null)
{
	if(strtolower($_POST['reponse']) == $formAnswer[$state] 
	|| strtolower($_POST['reponse']) == $formAnswer2[$state] 
	|| strtolower($_POST['reponse']) == $formAnswer3[$state] 
	|| strtolower($_POST['reponse']) == $formAnswer4[$state])
	{
		$state++;
		$message = '<em class="goodanswer">Bravo vous avez trouvé la bonne réponse!</em>';
	}
	else
	{
		$message = '<em class="badanswer">Veilleuz recommencer, vous n\'avez pas trouvé la bonne réponse...</em>';
	}
}
else
{
	$message = '<em>Bienvenue dans le quiz !</em>';
}
?>
<body>
	<?php include '../mechanics/header.part.php'; ?>
	<br />
		<center>
			<div class="body">
				<form method="post" action="/quiz/index.php">
					<?php 
					if($state < count($form))
					{
						echo $message;
						echo '<br />';
						echo ($state + 1) .': '. $form[$state];
						?>
						<br />
						<input type="hidden" name="currentId" value="<?php echo $state; ?>" />
							<input type="text" name="reponse" />
						<br />
						<input type="submit" value="Ok" />
						<?php
					}
					else
					{
						echo 'Bravo vous avez réussi tout le quiz, merci d\'être venu visité!';
					}
					?>
				</form>
			</div>
		</center>
	<br />
	<?php include '../mechanics/footer.part.php'; ?>
</body>