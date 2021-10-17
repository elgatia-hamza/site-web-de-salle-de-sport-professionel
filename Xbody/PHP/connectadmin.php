<?php

    $admin="admin@mail.com";
    $passwrd="admin";

    if(isset($_POST['login'])){
    if(empty($_POST['login']) || empty($_POST['password']) )  {

           echo '<div class="errors">
                <p>Entrer votre email et votre mot de passe !!</p> 
            </div>';

     } 

    else {
        
        if($admin==$_POST['login'] and $passwrd==$_POST['password']) {
            Header('location:./administrateur.php?id=1');
        }else {
            $message= '<div class="alert alert-danger">
                <p>L\'email ou le mot de passe n\'existe pas !!</p>    
                </div>';
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="../CSS/connect.css">
    <style>
    h1{
        text-align: center;
        color: #e67e22;
        margin:0 25%;
    }
    </style>
</head>
<body>
    <header>
        <img id="logo" src="../images/small_logo2.png" />
    </header>
    <?php
        if(!empty($message))
            echo $message;
    ?>
    <h1>XBODY Adminstration</h1>
    <div class="box">
        <form method="post">
            <label for="login">البريد الإلكتروني</label>
            <input type="email" name="login" id="login" size="30">
            <label for="password">كلمة السر</label>
            <input type="password" name="password" id="password" size="30">
            <input type="submit" id="submit" value="تسجيل الدخول">
        </form>
    </?>
</body>
</html>
