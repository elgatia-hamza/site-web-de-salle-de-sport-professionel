<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;
        charset=utf8', 'root', '');
    } catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
   
    $requet = $bd->prepare('update offre set `type`=?,`duree_abonnement`=?,`prix`=?,`discription`=?,`reduction`=? where id_offre=?') or die(print_r( $bd->errorInfo()));

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $type = $_POST['type'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $reduction = $_POST['reduction'];
    $requet->execute(array($type,$duree,$prix,$description,$reduction,$id))or die(print_r( $requet->errorInfo()));
    header("Location: administrateur.php?id=1");
    exit();
}  
?>