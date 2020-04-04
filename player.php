<?php
$titrePage = "Détails, Coordonnées et classements  des Joueurs Ogame fr";
   
include ('includes/head.php');
include ('includes/navbar.php');
include ('includes/header.php');




    
$idj = $_GET['id'];




$nomimages[0]="https://gf3.geo.gfsrv.net/cdneb/0b4e5e7d10690282412502048a2f80.png";
$nomimages[1]="https://gf3.geo.gfsrv.net/cdn87/0ffda2f18430e811c30d68b5aa84fb.png";
$nomimages[2]="https://gf1.geo.gfsrv.net/cdnf7/6177c65f05d9039be190b926a43f91.png";
$nomimages[3]="https://gf1.geo.gfsrv.net/cdn96/129465cd1dfc64bbf6765752ba2c2d.png";
$nomimages[4]="https://gf2.geo.gfsrv.net/cdn7a/ca5a968aa62c0441a62334221eaa74.png";
$nomimages[5]="https://gf1.geo.gfsrv.net/cdn69/9ad60afcc1cffcb6870d31053f9eaf.png";
$nomimages[6]="https://gf1.geo.gfsrv.net/cdnc3/05f9cbd97aef057af87dc00f448bdb.png";
$nomimages[7]="https://gf3.geo.gfsrv.net/cdnbe/1757e1263534f3fdd03caac5b2a7cf.png";




$urlogame = 'https://s'.$serv.'-fr.ogame.gameforge.com/api/playerData.xml?id='.$idj.''; 

$player = simplexml_load_file($urlogame);
$ts = ($player->attributes()->timestamp);
$mj = (string) $ts;
$name =($player->attributes()->name);
@$alli = ($player->alliance->name);
@$idalli = ($player->alliance->attributes()->id);
@$tag = ($player->alliance->tag);

?>
<div class="text-center">

    <?php 
        echo "<h2>".$name." <font class='text-success'> [".$tag."]</h2><a  href='alliance.php?id=".$idalli."&serv=$serv'><h3>".$alli."</a></font></h3>";
        ?>
    
</div>
<?php echo '<p class="text-primary" id="cjou">Mise à jour Le '.date('d/m/Y', $mj).' &agrave; '.date('H:i', $mj).'</p>'; ?>

<div class="container-fluid" id="cjou">
    <div class="row">
  
            <div class="col-md-6 card" >
                
                <h4 class="card-header">Planètes</h4>
                <table class="table table-striped alltable">
                    <thead class="thead  text-white">
                        <tr>
                            <th scope="col">Planètes</th>
                            <th scope="col">Coordonées</th>
                            <th scope="col">Lunes</th>


                        </tr>
                    </thead>
                    <?php

    foreach ($player->planets->planet as $colo){
        
       
    
            $nomcolo = ($colo->attributes()->name);
            $adcolo = ($colo->attributes()->coords);
            @$moon = ($colo->moon->attributes()->name);
       
            $i=rand(0,7);
      
        echo "<tr><td> ".$nomcolo."</td><td><img src='$nomimages[$i]' width='30' height='30'> ".$adcolo."</td><td>".($moon)."</td></tr>";
  
                                                }
    
?>
                </table>
            </div>
            <div class="col-md-6 card" >
                <h4 class="card-header">Classement</h4>
                <table class="table table-striped alltable">
                    <thead class="thead  text-white">
                        <tr>
                            <th scope="col">Catégories</th>
                            <th scope="col">Classements</th>
                            <th scope="col">Points</th>


                        </tr>
                    </thead>




                    <?php
    $categorie = array('<img src="img/point.gif" width="35" height="35"> Points ','<img src="img/eco.gif" width="35" height="35"> Economie','<img src="img/recherche.gif" width="35" height="35"> Recherche', '<img src="img/flotte.gif" width="35" height="35"> Militaire','<img src="img/pmc.png" width="35" height="35"> Points militaires construits','<img src="img/pmd.png" width="35" height="35"> Points militaires détruits','<img src="img/pmp.png" width="35" height="35"> Points militaires perdus','<img src="img/ph.png" width="35" height="35"> Points Honorifiques');
    
                    $c = 0;

    foreach ($player->positions->position as $position){

            $score = ($position->attributes()->score);
    
        echo "<tr><td>".$categorie[$c++]."</td><td>".$position."</td><td>".$score."</td></tr>";
                                                        }
 

?>

                </table>
            </div>
        </div>
    </div>


<script type="text/javascript" src="js/script.js"></script>

<?php include ('includes/footer.php') ?>