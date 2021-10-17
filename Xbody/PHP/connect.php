<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="../CSS/connect.css">
</head>
<body>
    <header>
      <img id="logo" src="../images/small_logo2.png" />
    </header>
    <?php
    require 'db.php';
    if(isset($_POST['login'])){
    if(empty($_POST['login']) || empty($_POST['password']) )  {

           echo '<div class="alert alert-danger">
                <p>Entrer votre email et votre mot de passe !!</p> 
            </div>';

     }
    else {

        $requet = $bde->prepare('select * from client where email=? and password=?');
        $requet->execute(array($_POST['login'],$_POST['password']));
         if($client=$requet->fetch()) {
            if($client->confirmer==0){
                echo '<div class="alert alert-danger">
                <p>L\'email ou le mot de passe n\'existe pas !!</p>    
                </div>';
            }else{
                session_start();
                $_SESSION['hot'] = $client;
                $requet->closeCursor();
                Header('location:../index.php');
            }
        }else {
            echo '<div class="alert alert-danger">
            <p>L\'email ou le mot de passe n\'existe pas !!</p>
            </div>';
        }
    }
}
?>
    <div class="box">
        <form method="post">
            <label for="login">البريد الإلكتروني</label>
            <input type="email" name="login" id="login" size="30">
            <label for="password">كلمة السر</label>
            <input type="password" name="password" id="password" size="30">
            <input type="submit" id="submit" value="تسجيل الدخول">
        </form>
    </div>
</body>
</html>
