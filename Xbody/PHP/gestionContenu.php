<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;
            charset=utf8', 'root', '');
        } catch(Exception $e) {
            die('Error : '.$e->getMessage());
        }
        $requestImg = $bd->query('select * from images');
        $requestOffre = $bd->query('select * from offre');
        $requetdelete = $bd->prepare('delete from images where id=?') or die(print_r( $bd->errorInfo()));
    if(!empty($_GET['id_img'])){
        $id_img = $_GET['id_img'];
        $requetdelete->execute(array($id_img));
        header("Location: administrateur.php?id=1");
        exit();
    }    
    
?>


<div class="container">
        <?php while( $img = $requestImg->fetch() ):?>
        <div class="img_container">
            <img class="image" src="../<?=$img[1]?>" alt="">
           
            <a href="administrateur.php?id=1&id_img=<?=$img[0]?>">
                <input type="button" value="حدف" class="supprimer">
            </a>

        </div>
        <?php endwhile?>
</div>

<div class="ajouter_photo">
    <h2>اضافة صور</h2>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <!-- On limite le fichier à 100Ko -->
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <input type="file" name="photo" value="choisir photo"> 
        <input type="submit" name="envoyer" value="envoyer" class="envoyer">
    </form>
</div>

<div class="offre float-right">
    <h2 class="float-right">العروض</h2>
    <table>
        <th class="id">#</th>
        <th class="type">النوع</th>
        <th class="duree">مدة الاستراك</th>
        <th class="prix">التمن</th>
        <th class="description">وصف العرض</th>
        <th class="reduction">تخفيض</th>
<style>
table input[type="submit"] {
  color: #12947f;
  font-weight: bold;
  outline: none;
  border: 2px solid #12947f;
  border-radius: 10px;
}

table input[type="submit"]:hover {
  color: #fff;
  background-color: #12947f;
}
</style>

        <?php while( $offre = $requestOffre->fetch() ):?>
            <tr>
                <form action="saveOffre.php" method="post">
                    <td><input type="text" name="id" class="id" value="<?=$offre[0]?>" readonly></td>
                    <td><input type="text" name="type" class="type" value="<?=$offre[1]?>"></td>
                    <td><input type="text" name="duree" class="duree" value="<?=$offre[2]?>"></td>
                    <td><input type="text" name="prix" class="prix" value="<?=$offre[3]?>"></td>
                    <td><input type="textarea" name="description" class="description"  value="<?=$offre[4]?>"></td>
                    <td><input type="textarea" name="reduction" class="reduction"  value="<?=$offre[5]?>"></td>
                    <td><input type="submit" class="submit" value="حفض التغير"></td>
                </form>
            </tr>
        <?php endwhile?>
    </table>
</div>


<!--
<div class="container">
    <?php //while( $img = $request ->fetch() ):?>
    <div class="img_container">
        <img class="image" src="../<?//=$img[1]?>" alt="">
        <a href="#"><img id="icone" src="../images/icones/supprimer_icone.png" alt=""> supprimer</a>
    </div>
    <?php //endwhile?>
</div>

 <a href="http://localhost/Xbody/inc/administrateur.php?img=<?php//$img[0]?>"><img id="icone" src="../images/icones/supprimer_icone.png" alt=""> supprimer</a>

    <a href="#"><img id="icone" src="../images/icones/edit_icone.png" alt=""> Edit</a>
<table border="collaspse">
    <caption>صور</caption>
    <tr>
        <td class="id">1</td>
        <td class="image">
            <img src="../images/1454429116344270042.jpg" alt="images/1454429116344270042.jpg">
        </td>
        <td class="edit">
            <a href=""><i class="fas fa-edit">Edit</i></a>
        </td>
        <td class="edit">
            <a href="#"><i class="fas fa-trash">Supprimer</i></a>
        </td>
    </tr>
</table>


<ul>
    <li>
        <a class="left_links" href="#">العروض</a>
    </li>
    <li>
        <a class="left_links" href="#">صور</a>
    </li>
</ul>
-->