<?php 

		if (!empty($_POST)) {

			require_once 'db.php';

			$errors = array();
			if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])) {
				$errors['nom'] = 'nom non validé';
			}

			if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom'])) {
				$errors['prenom'] = 'prenom non validé';
			}

			if (empty($_POST['email1'])) {
				$errors['email'] = 'entrer email';
			} else {
				$requet = $bde->prepare('select * from client where email=? ');
				$requet->execute(array($_POST['email1']));
				if($requet ->fetch()) {
					$errors['email'] = 'ce email déja existe';
				}
			}

			if (empty($_POST['mot']) || $_POST['mot'] !=
				$_POST['password']) {
				$errors['password'] = 'password non validé';
			}  else {
				$requet = $bde->prepare('select * from client where password=? ');
				$requet->execute(array($_POST['password']));
				if($requet ->fetch()) {
					$errors['password'] = 'ce password déja existe';
				}
			}

			if (empty($_POST['sexe'])) {
				$errors['sexe'] = 'entrer sexe';
			}

			if (empty($_POST['tele']) || !preg_match('/^[0-9]+$/', $_POST['tele'])) {
				$errors['tele'] = 'telephone non validé';
			}

			if (empty($_POST['date'])) {
				$errors['date'] = 'entrer date';
			}

			if(empty($errors)) {
				$requet0 = $bde->prepare('INSERT INTO client(nom, prenom, email, password, sexe, telephone, date_naissance)
				VALUES (?, ?, ?, ?, ?, ?, ?)') or die(print_r( $bde->errorInfo()));
				$requet0->execute(array($_POST['nom'],$_POST['prenom'],$_POST['email1'],$_POST['mot'],$_POST['sexe'],$_POST['tele'],$_POST['date']));
				//die('votre compte a bien creé');
				Header('location:../index.php');

			}

		}

	?>

<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>تسجيل</title>
	<link rel="stylesheet" href="../CSS/inscrire.css">
</head>	
	
<body>
	<header>
      <img id="logo" src="../images/small_logo2.png" />
	</header>
	
	<div class="box">
		<div class="left">
			<img src="../images/inscrire_photo.jpeg" class="img">
		</div>
		<div class="right">
			<h1>تسجيل</h1>
			<?php if(!empty($errors)) { ?>
					<div class="errors">
						<p>tu as des erreues : </p>
						<?php foreach ($errors as $error) { ?>
							<li><?= $error; ?></li>
						<?php } ?>
					</div>
			<?php  }  ?>
			<form  name="Formulaire" action="" method="post">
				<label for="sexe">الجنس  </label><br>
				<select name="sexe" id="sexe">
					<option default></option>
					<option value="homme">ذكر</option>
					<option value="femme">أنثى</option>
				</select><br><br><br>
				<label>الإسم</label><br>
				<input type="text" name="prenom" value="<?=$_GET['prenom1']?>" id="nom"><br>
				<label>النسب</label><br>
				<input type="text" name="nom" value="" id="prenom"><br>
				<label>تاريخ الميلاد</label><br>
				<input type="date" name="date" value="" id="date"><br>
				<label>الهاتف</label><br>
				<input type="text" name="tele" value="" id="tele"><br>
				<label>البريد الإلكتروني</label><br>
				<input type="email" name="email1" value="<?=$_GET['email']?>" id="email"><br>
				<label>كلمة السر</label><br>
				<input type="password" name="mot" value="" id="mot"><br>
				<label>تأكيد كلمة السر</label><br>
				<input type="password" name="password" value="" id="password"><br>
				<input type="submit" name="va" value="تسجيل">	  
			</form>
		</div>
	</div>
</body>
	
</html>