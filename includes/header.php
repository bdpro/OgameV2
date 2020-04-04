<?php
$urlinfoserv = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/serverData.xml';
        $nameservs = simplexml_load_file($urlinfoserv);
        $nameserv = ($nameservs->name);
?>
<header>
<div class="jumbotron text-center" id="">
    <a href="http://nimarena.fun/"><img class="img-fluid" src="img/og.png"></a>

    <h5 class="tlogo text-white text-center ">Univers <?php echo $nameserv,' '.$serv ?></h5>

</div>

</header>