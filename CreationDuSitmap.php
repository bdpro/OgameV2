<?php
$titrePage = "Liste joueurs Univers Himalia u160";
   
    include ('includes/header.php');
    include ('includes/navbar.php');

//Api1 avec Nom des joeurs, id de leur alliance, status...
$urlogame = 'https://s160-fr.ogame.gameforge.com/api/players.xml';   
$players = simplexml_load_file($urlogame);
//Récupération date de  mise a jour
$ts = ($players->attributes()->timestamp);
$mj = (string) $ts;

//Affichage date de mise a jour
 echo '<p class="text-primary">Mise à jour Le '.date('d/m/Y', $mj).' &agrave; '.date('H:i', $mj).'</p>';

?>

<div class="col-md-12 card">
    <div id="preloader">
        <div id="loader">
        </div>
    </div>

    <table class="table table-striped alltable" id="univ">
        <thead class="thead  text-white">
            <tr>

                <th scope="col">Nom</th>
                <th scope="col">Alliance</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
<?php
//      Api2 avec nom des alliances,id alliances, et id joueur dans alliance
        $urlalli = 'https://s160-fr.ogame.gameforge.com/api/alliances.xml';
        $allis  = simplexml_load_file($urlalli);
 

//Boucle Api1 avec tous les joueurs et l id de leur alliance
foreach ($players->player as $player){
        $name = ($player->attributes()->name);
        $coords= ($player->attributes()->coords);
        $id =($player->attributes()->id);
        $idalliance =($player->attributes()->alliance);
        $status =($player->attributes()->status);
 
        

   $stimap ="<p> <xmp> 
    <url>
        <loc>http://nimarena.fun/alliance.php?id=";
    $sitemap2 ="</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url></xmp></p>";  
        
            


    if($idalliance ?? false){
        $alliname = $allis->xpath("/alliances/alliance[@id='$idalliance']")[0]->attributes()->name;
        $allitag = $allis->xpath("/alliances/alliance[@id='$idalliance']")[0]->attributes()->tag;
        $alli ='<font class="text-white">'.$alliname.' <font class="text-success">['.$allitag.']</font>';
                     }
        else{ 
            ($alli = '');
            if($alli == '');{
                $sitemap2 ='';
                $stimap ='';
                
            }
            }
    
    
    
    echo $stimap.$idalliance.$sitemap2;
    
//    echo "<p>http://nimarena.fun/player.php?id=".$id."</p>";
    
    
//        echo "<p> <xmp> 
//    <url>
//        <loc>http://nimarena.fun/alliance.php?id=".$idalliance."</loc>
//        <changefreq>weekly</changefreq>
//        <priority>0.9</priority>
//    </url></xmp></p>";
    
    
//      echo "<tr><td class='joueur' ><a  href='player.php?id=".$id."'>".$name."</a></td><td><a  href='alliance.php?id=".$idalliance."'>".$alli."</a></td><td>(".$status.")
//      </td></tr>";

 
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