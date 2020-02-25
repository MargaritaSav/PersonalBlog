<!--<?php //$this->title = "JF-admin"; ?>-->
<!DOCTYPE html>
<html>
<head>
	<title>JF-Admin authorization</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Public/style.css">
</head>
<body>
	<div id="authorization-form">
		<p> Se connecter à JF-admin </p>
		<form method="post" action="index.php?action=admin" >
		<label for="admin_login">Votre pseudo : </label>
		<input type="text" name="admin_login" id="admin_login" class="authorization-field" required></br>
		<label for="password">Mot de passe : </label>
		<input type="password" name="password" class="authorization-field" required></br>
		<input type="submit" name="submit" id="authorization-submit" >
		</form>
	</div>
	

	<?php $class_msg = "hidden";
		if(isset($_GET['err'])){
			$class_msg = "shown";
		} ?>
	<div class="alert alert-warning <?= $class_msg ?>" role="alert">
  		Mauvais identifiant ou mot de passe
	</div>

</body>
</html>
