<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;charset=utf8', 'root', '');
    } catch(Exception $e) {
         die('Error : '.$e->getMessage());
    }

    $requet_delete = $bd->prepare('delete from client where id=?') or die(print_r( $bd->errorInfo()));

    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        $requet_delete->execute(array($id));
        header("Location: administrateur.php?id=2");
        exit();
    }
?>