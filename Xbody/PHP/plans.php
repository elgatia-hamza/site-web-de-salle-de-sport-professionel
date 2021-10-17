<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;
            charset=utf8', 'root', '');
        } catch(Exception $e) {
            die('Error : '.$e->getMessage());
        }
        $request = $bd->query('select * from offre');   
?>

<section id="plans_scroll">
        <div class="row">
            <div class="plans">
                <div class="plans_title">
                    <h5>اسعار الاشتراك</h5>
                    <h2>أختار خطتك المناسبة</h2>
                    <i class="fa fa-bar-chart"></i>
                </div>
                
                <?php  $offre = $request->fetch();?>
                <div class="plans_price2">
                    <h5 class="plan_type"><?=$offre[1]?></h5>
                    <h5><?=$offre[2]?></h5>
                    <h1><?=$offre[3]?></h1>

                    <p><?=$offre[4]?></p>
                </div>
                
                <?php  $offre = $request->fetch();?>
                <div class="plans_price">
                    <h5><?=$offre[1]?></h5>
                    <h5><?=$offre[2]?></h5>
                    <h1><?=$offre[3]?></h1>

                    <p><?=$offre[4]?></p>
                </div>

                <?php  $offre = $request->fetch();?>
                <div class=" plans_price2">
                    <h5 class="plan_type"><?=$offre[1]?></h5>
                    <h5><?=$offre[2]?></h5>
                    <h1><?=$offre[3]?></h1>
                    <p><?=$offre[4]?></p>
                </div>

                <div class="plans_price2">
                    <p>جرب الاشتراك معنا<span style="color: #000 !important;"> لمده 5 ايام مجاناً</span> لتحصل على كل مميزات المتوفره لدينا! <span style="color: #000;">سارع بالتسجيل معنا</span></p>
                    <?php if(!empty($_SESSION['hot'])):?>
                        <a href="PHP/paiement.php?id=1" target="_blank" class="rollIn" >سجل معنا!</a>
                    <?php endif ?>
                </div>

                <?php  
                $request = $bd->query('select * from offre'); 
                while($offre = $request->fetch()){
                    if($offre[0]==2){
                        break;
                    }
                    }?>
                <div class="plans_price">
                    <p>خصم <span style="color: #fff;" ><?=$offre[5]?></span> لاول اشتراك في العضوية المميزه اثناء عملية <span style="color: #fff;">التسجيل</span> لدينا.</p>
                    <?php if(!empty($_SESSION['hot'])):?>
                        <a href="PHP/paiement.php?id=2" target="_blank" class="rollIn">سجل معنا!</a>
                    <?php endif ?>
                </div>

                <div class="plans_price2">
                    <p>جرب الاشتراك معنا<span style="color: #000 !important;"> لمده 5 ايام مجاناً</span> لتحصل على كل مميزات المتوفره لدينا! <span style="color: #000;">سارع بالتسجيل معنا</span></p>
                    <?php if(!empty($_SESSION['hot'])):?>
                        <a href="PHP/paiement.php?id=3" target="_blank"  class="rollIn">سجل معنا!</a>
                    <?php endif ?>
                </div>

            </div>
        </div>
    </section>