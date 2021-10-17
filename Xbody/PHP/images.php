<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;
            charset=utf8', 'root', '');
        } catch(Exception $e) {
            die('Error : '.$e->getMessage());
        }
        $requestImg = $bd->query('select * from images;');
?>

<section id="image_scroll">
            <ul class="images_section">
            <?php while( $img = $requestImg->fetch() ):?>
                <li><img class="show_image float-right" src="<?=$img[1]?>"></li>
            <?php endwhile?>
            </ul>
</section>