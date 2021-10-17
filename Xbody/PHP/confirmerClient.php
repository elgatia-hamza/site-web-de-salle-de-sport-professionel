<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;charset=utf8', 'root', '');
    } catch(Exception $e) {
         die('Error : '.$e->getMessage());
    }
    $requet_update = $bd->prepare('update client set confirmer=1 where id=?') or die(print_r( $bd->errorInfo()));
    
    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        $requet_update->execute(array($id));
        header("Location: administrateur.php?id=2");
        exit();
    }
?>