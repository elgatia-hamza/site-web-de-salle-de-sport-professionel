<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ادارةالموقع</title>
    <link rel="stylesheet" href="../CSS/administrateur.css" />
    <link rel="stylesheet" href="../icones/font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <img id="logo" src="../images/small_logo2.png" />
      <ul>
        <li>
          <a
            class="menu_links float-right"
            href="http://localhost/Xbody/PHP/administrateur.php?id=1"
            >ادارة المحتوي</a
          >
        </li>
        <li>
          <a
            class="menu_links float-right"
            href="http://localhost/Xbody/PHP/administrateur.php?id=2"
            >ادارة الزبناء</a
          >
        </li>
      </ul>
    </header>
    <div class="content">
    <?php
    $id = $_GET['id'];
    if($id==1){
      require 'gestionContenu.php';
    }elseif($id==2){
      require 'gestionClient.php';
    }
    ?>
    </div>
  </body>
</html>
