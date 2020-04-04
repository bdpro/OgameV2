<?php
$serv = $_GET['serv'];

?>

<nav class="navbar   navbar-expand-md navbar-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Univers</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="home.php?serv=<?php echo $serv; ?>">Joueurs</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="listalliance.php?serv=<?php echo $serv; ?>">Alliances</a>
            </li>



        </ul>

    </div>


</nav>
