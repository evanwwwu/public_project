
<header>
    <div class="adTitle"></div>
    <?PHP if ($main_banner['multimedia']==''):?>
    <?PHP if(!isset($_SESSION[SITE_INDEX])):?>
    <?PHP $_SESSION[SITE_INDEX]=1;?>
    <script>
    $(document).ready(function(){
      setTimeout("$('.openToggle a').click();",2000);
      setTimeout("$('.adCloseBtn').click()",4000);
  });
    </script>
    <?PHP else:?>
    <script>
    $(document).ready(function(){
    });
    </script>
    <?PHP endif;?>
    <?PHP else:?>
    <?PHP if(!isset($_SESSION[SITE_INDEX])):?>
    <?PHP $_SESSION[SITE_INDEX]=1;?>
    <script>
    <?/*
    $(document).ready(function(){

        if( document.body.clientWidth >= 640){
            setTimeout("$('.openToggle a').click()",2000);
            setTimeout("xxx.playVideo()",2000);
        }
    });*/?>
    </script>
    <?PHP else:?>
    <script>
    $(document).ready(function(){
    });
    </script>
    <?PHP endif;?>
    <?PHP endif;?>
    <a href='#' class='adCloseBtn'></a>
    <div id="topNav">
        <div id="trigger" class="trigger">
            <a href="#">
                <img src="<?php echo SITE_URL?>assets/old/images/transparent.gif"></a>
            </div>
            <div id="logTrigger" class="logTrigger">
                <a href="#">
                    <img src="<?php echo SITE_URL?>assets/old/images/transparent.gif"></a>
                </div>
                <div class="logo"><a href="<?php echo SITE_URL?>"></a></div>
                <div class="nav">
                    <ul>
                        <?PHP if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0):?>
                        <li><a href="#" class="memberInfo" onclick="oxox_site.profile();"><?PHP echo strtoupper($_SESSION['user_login_email']);?></a><span>|</span></li>
                        <li><a href="#" class="logOut" onclick="oxox_site.logout();">LOG OUT</a><span></span></li>
                        <?PHP else:?>
                        <li><a href="#" class="signIn">SIGN UP</a><span>|</span></li>
                        <li><a href="#" class="logIn">LOG IN</a><span></span></li>
                        <?PHP endif;?>
                        <!-- <li><a href="#">ENGLISH</a></li> -->
                    </ul>
                </div>
            </div>
</header>