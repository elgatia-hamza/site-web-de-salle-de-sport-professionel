<?php
    session_start();
?>
<header id="top" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
    url('images/bodybuilding.jpg');">
        <div class="top_social_bar">
                <div class="icones">
                    <div class="icon">
                        <i class="fa fa-facebook float-right social_links_icon" aria-hidden="true"></i>
                        <a href="http://www.facebook.com" class="social_links float-right">فيس بوك</a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-google-plus float-right social_links_icon" aria-hidden="true"></i>
                        <a href="http://google.com" class="social_links float-right">جوجل</a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-twitter float-right social_links_icon" aria-hidden="true"></i>
                        <a href="http://twitter.com" class="social_links float-right">تويتر</a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-instagram float-right social_links_icon" aria-hidden="true"></i>
                        <a href="http://instagram.com" class="social_links float-right">إنستغرام</a>
                    </div>
                    <div class="float-right">|</div>

                    <div class="float-right top_phone" style="padding-top: 1px;">
                        <i class="fa fa-phone float-right social_links_icon" aria-hidden="true"></i>
                        <i class="social_links float-right telephone">055 555 5555</i>
                    </div>
                    <?php if(!empty($_SESSION['hot'])){?>
                        <div class="inscrire">
                            <a class="registre_links" href="PHP/deconnect.php"><span id="login ">تسجيل الخروج</span></a>
                            <span style="padding: 0 10px 0 10px">|</span>
                            <a class="registre_links" href="PHP/inscrire2.php"><span id="connect">حسابي</span></a>
                        </div>
                    <?php }else{ ?>
                        <div class="inscrire">
                            <a class="registre_links" href="PHP/connect.php"><span id="login ">تسجيل الدخول</span></a>
                            <span style="padding: 0 10px 0 10px">|</span>
                            <a class="registre_links" href="PHP/inscrire2.php"><span id="connect" >تسجيل</span></a>
                        </div>
                    <?php }?>
                </div>
        </div>
        <nav>
           <div id="menu" class="menu float-right">
                <div class="small_logo float-right">
                    <a href="index.php"><img id="small_logo" src="images/small_logo2.png"></a>
                </div>
                <div>
                    <ul>
                        <li><a class="menu_links float-right" href="#top_scroll">صفحة البداية</a></li>
                            <li><a class="menu_links float-right" href="#explanation_scroll">شرح</a></li>
                            <li><a class="menu_links float-right" href="#image_scroll">صور</a></li>
                            <li><a class="menu_links float-right" href="#news_scroll">اخبار</a></li>
                            <li><a class="menu_links float-right" href="#plans_scroll">الاسعار</a></li>
                            <li><a class="menu_links float-right" href="#review_scroll">قالو عنا</a></li>
                        </ul>
                    </div>
                </div>
        </nav>
            <div id="logo" style="background-image: url(images/logo.png);" ></div>
    </header>