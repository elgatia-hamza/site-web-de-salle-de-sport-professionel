<?php

  if (!empty($_POST)) {

      require_once 'inc/db.php';

      $errors = array();
      if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])) {
        $errors['nom'] = 'nom non validé';
      }

      if (empty($_POST['number']) || !preg_match('/^[0-9]+$/', $_POST['number'])) {
        $errors['number'] = 'number_card non validé';
      }

      if (empty($_POST['date'])) {
        $errors['date'] = 'entrer date';
      }

      if (empty($_POST['csc']) || !preg_match('/^[0-9]+$/', $_POST['csc'])) {
        $errors['csc'] = 'csc non validé';
      }

      if (empty($_POST['key']) || !preg_match('/^[0-9]+$/', $_POST['key'])) {
        $errors['key'] = 'key non validé';
      }

      if(empty($errors)) {
        session_start();
        $requet = $bde->prepare('INSERT INTO carte_bancaire(name_on_card, card_number, epiry_date, csc, code_postale, date_creation, date_expiration, id_client)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)') or die(print_r( $bde->errorInfo()));
        
        $id_offre=$_GET['id'];
        if(!empty($_POST['duree'])){
          
          $duree = $_POST['duree'];

          if($id_offre==2){
            $date_expiration = date("Y-m-d", strtotime("+".$duree." month"));
          }elseif($id_offre==3){
            $date_expiration = date("Y-m-d", strtotime("+".$duree." month"));
          }elseif($id_offre==1){
            $date_expiration = date("Y-m-d", strtotime("+".$duree." day"));
          }else{
            Header('location:index.php');
          }
          $requet->execute(array($_POST['nom'], $_POST['number'], $_POST['date'], $_POST['csc'], $_POST['key'], date("Y-m-d"),$date_expiration, $_SESSION['hot']->id));
          Header('location:index.php');
        }

      }

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>معلومات الاشتراك</title>
    <link rel="stylesheet" href="../CSS/paiment.css" />
    <script type="text/javascript" src="../JS/paiement.js"></script>
  </head>
  <body>

    <header>
      <img id="logo" src="../images/small_logo2.png" />
    </header>

    <div class="plans_price">
    <?php
      try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;
        charset=utf8', 'root', '');
      } catch(Exception $e) {
        die('Error : '.$e->getMessage());
      }
      if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $request = $bd->query('select * from offre where id_offre='.$id);
        $offre = $request->fetch();
        preg_match_all('!\d+!', $offre[2], $matches);
      }
      else{
        die(print_r( $bd->errorInfo()));
        exit();
      }
    ?>
      <h3><?=$offre[1]?></h3>
      <h3><?=$offre[2]?></h3>
      <h1><?=$offre[3]?></h1>
      <p>
      <?=$offre[4]?>
      </p>
    </div>
    
    <?php if(!empty($errors)) { ?>
          <div class="alert alert-danger">
            <strong>Il y a des erreues : </strong>
            <ul>
            <?php foreach ($errors as $error) { ?>
              <li><?= $error; ?></li>
            <?php } ?>
            </ul>
          </div>
    <?php  }  ?>

    <div class="box">
      <div class="left_img">
        <img src="../images/paiement_photo.jpg" />
      </div>
      <div class="formulaire">
        <div class="card_icons">
          <img src="../images/cardIcons/Free-Credit-Card-Logo-104.png" />
          <img src="../images/cardIcons/Free-Credit-Card-Logo-56.png" />
          <img src="../images/cardIcons/Free-Credit-Card-Logo-68.png" />
          <img src="../images/cardIcons/Free-Credit-Card-Logo-92.png" />
        </div>
        <form method="post">
          <input type="hidden" name="duree" value="<?=$matches[0][0]?>">
          <div class="inputBox">
            <h4>اسم على البطاقة</h4>
            <input
              type="text"
              name="nom"
              id="name_on_card"
              onkeyup="check_name_on_card();"
            />
            <span id="txt_name_on_card"></span>

            <h4>رقم البطاقة</h4>
            <input
              type="text"
              name="number"
              id="card_number"
              size="16"
              maxlength="16"
              onkeyup="check_card_number();"
            />
            <span id="txt_card_number"></span>

            <div class="card_info">
              <div class="date">
                <h4>تاريخ الانتهاء</h4>
                <input
                  type="date"
                  name="date"
                  id="expiry_date"
                  size="7"
                  maxlength="7"
                  placeholder="YY/MM"
                  onkeyup="check_expiry_date();"
                />
                <span id="txt_expiry_date"></span>
              </div>
              <div class="code">
                <h4>CSC</h4>
                <input
                  type="text"
                  name="csc"
                  id="csc"
                  size="3"
                  maxlength="3"
                  placeholder="3 ارقام"
                  onkeyup="check_csc();"
                />
                <span id="txt_csc"></span>
              </div>
            </div>

            <h4>رمز البريد</h4>
            <input
              type="text"
              name="key"
              id="code_postal"
              size="5"
              maxlength="5"
              placeholder="5 ارقام"
              onkeyup="check_code_postal()"
            />
            <span id="txt_code_postal"></span>

            <button type="submit" id="pay"><?="دفع ".$offre[3]?></button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
