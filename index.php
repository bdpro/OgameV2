<?php
$titrePage = "Détails, Coordonnées et classements  des Joueurs et Aliances Ogame fr ";
   
    include ('includes/head.php');



       


        ?>
<header>
<div class="jumbotron text-center" id="">
    <a href="http://nimarena.fun/"><img class="img-fluid" src="img/og.png"></a>

    <h5 class="tlogo text-white text-center ">LISTE DES UNIVERS FR</h5>

</div>

</header>


<div class="col-md-8 card text-center " id="global">

    <div id="preloader">
        <div id="loader">
        </div>
    </div>

    <table class="table table-striped alltable" id="univ">

        <thead class="thead  text-white">

            <tr>

                <th scope="col">Nom</th>
                <th scope="col">Numero</th>
                <th scope="col">Nonbre de joueurs</th>
                <th scope="col">Version</th>
                <th scope="col">lien</th>

            </tr>
        </thead>
        <?php

        $urlidserver = 'https://s170-fr.ogame.gameforge.com/api/universes.xml';   
        $idservs = simplexml_load_file($urlidserver);
        foreach ($idservs->universe as $idserv){
        $serv = ($idserv->attributes()->id);
        $urlinfoserv = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/serverData.xml';
        $nameservs = simplexml_load_file($urlinfoserv);
        $nameserv = ($nameservs->name);
        $vers = ($nameservs->version);
//         $urlposserv = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/highscore.xml?category=1&type=0';
//        $position = simplexml_load_file($urlposserv);
//            foreach ($position as $positions){
//            $pos = ($positions->attributes()->position);
//                
//            }   
//        
          echo "<tr><td class='joueur'><a href='home.php?serv=".$serv."'>".$nameserv."</a></td><td>Univers ".$serv."</td><td></td><td>".$vers."</td><td><a href='home.php?serv=".$serv."' ><i class='fas fa-external-link-alt'></i></a></td></tr>";
            
//            <td>".$serv."</td><td>".$pos."</td><td>".$vers."</td></tr>";   
            
//            echo $nameserv;
//            echo $serv;
//            echo $vers;
//            echo $pos;
            
            

               
        }
 



?>


    </table>
</div>





<script>
    $(document).ready(function() {
        $('#preloader').delay().hide();

    });
</script>
<script type="text/javascript" src="js/script.js"></script>

<?php include ('includes/footer.php') ?>