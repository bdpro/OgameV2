<?php
$titrePage = "Détails, Coordonnées et classements  des Joueurs et Aliances Ogame fr ";
   
    include ('includes/head.php');
    include ('includes/navbar.php');
    include ('includes/header.php');




//$serv = $_GET['serv'];
$titrePage = "Liste joueurs Univers U'$serv'";
//Api1 avec Nom des joeurs, id de leur alliance, status...
$urlogame = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/players.xml';   
$players = simplexml_load_file($urlogame);
//Récupération date de  mise a jour
$ts = ($players->attributes()->timestamp);
$mj = (string) $ts;

//Affichage date de mise a jour



?>


<div class="col-md-8 card" id="global">
    <?php 
    //Affichage date de mise a jour
    echo '<p class="text-primary">Mise à jour Le '.date('d/m/Y', $mj).' &agrave; '.date('H:i', $mj).'</p>'; ?>
    
    <div id="">
        <div id="">
        </div>
    </div>

    <table class="table table-striped alltable" id="univ">
        <thead class="thead  text-white">
            <tr>

                <th scope="col">Alliance</th>
                <th scope="col">Tag</th>
                <th scope="col">Classement</th>
                <th scope="col">Point</th>

            </tr>
        </thead>
        
        <?php
//      Api avec nom des alliances,id alliances, et id joueur dans alliance
        $urlalli = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/alliances.xml';
        $allis  = simplexml_load_file($urlalli);
        //      Api avec position et score des alliances
        $hslallis = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/highscore.xml?category=2&type=0';
        $sallis  = simplexml_load_file($hslallis);
        $posallis = ($sallis->alliance->attributes()->position);
        $hsidalli = ($sallis->alliance->attributes()->id);
//        $posalli = $sallis->xpath("/highscore/alliance[@id='500014']")[0]->attributes()->position;
//        print_r ($posalli);
        
 
    foreach ($allis->alliance as $alli){
        
       
       $idalliance = ($alli->attributes()->id);
       if ($sallis->xpath("/highscore/alliance[@id='$idalliance']")[0] ?? false){
            $posalli = $sallis->xpath("/highscore/alliance[@id='$idalliance']")[0]->attributes()->position;
            $scoralli = $sallis->xpath("/highscore/alliance[@id='$idalliance']")[0]->attributes()->score;
           $alliname = ($alli->attributes()->name);
            $tagalli = ($alli->attributes()->tag);
        }
        else{ 
            ($alliname = "<p class='text-warning'> _En cour de supression_</p>");
            
            }

                        
                        
                        //        $pos = ($infalli->position);
//    echo "<pre class='text-danger'>";
//        print_r ($infalli);
//        echo "</pre>";
//            
        
        echo "<tr></td><td><a  href='alliance.php?id=".$idalliance."&serv=$serv'>".$alliname."</a></td><td class='text-success'>[".$tagalli."]</td><td>".$posalli."</td><td>".$scoralli."</td></tr>"; 
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