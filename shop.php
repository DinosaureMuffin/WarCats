<?php
  require_once('include/connect.php');
  require_once('include/data_user.php');
  require_once('include/data_item.php');

  $sql_stuff_plastron = "SELECT `id`, `armure`, `nom`, `image`, `prix` FROM `plastron` ORDER BY `armure` ASC";
    if (!($result_stuff_plastron = $db->query($sql_stuff_plastron))){
      die ('Erreur de Requete SQL (stuff_plastron)');
    }
    while($row_stuff_plastron = $result_stuff_plastron->fetch_assoc()){
         $plastrons_id[] = $row_stuff_plastron['id'];
         $plastrons_nom[] = $row_stuff_plastron['nom'];
         $plastrons_skin[] = $row_stuff_plastron['image'];
         $plastrons_armure[] = $row_stuff_plastron['armure'];
         $plastrons_prix[] = $row_stuff_plastron['prix'];
    }
  $sql_stuff_casque = "SELECT `id`, `armure`, `nom`, `image`, `prix` FROM `casque` ORDER BY `armure` ASC";
    if (!($result_stuff_casque = $db->query($sql_stuff_casque))){
      die ('Erreur de Requete SQL (stuff_CASQUE)');
    }

    while($row_stuff_casque = $result_stuff_casque->fetch_assoc()){
        $casques_id[] = $row_stuff_casque['id'];
        $casques_nom[] = $row_stuff_casque['nom'];
        $casques_skin[] =$row_stuff_casque['image'];
        $casques_armure[] = $row_stuff_casque['armure'];
        $casques_prix[] =  $row_stuff_casque['prix'];
    }

  $sql_stuff_arme = "SELECT `id`, `degats`, `nom`, `image`,`prix` FROM `arme` ORDER BY `degats` ASC";
    if (!($result_stuff_arme = $db->query($sql_stuff_arme))){
      die ('Erreur de Requete SQL (stuff_arme)');
    }
    $armes = [];
    while($row_stuff_arme = $result_stuff_arme->fetch_assoc()){

      $armes_id[] = $row_stuff_arme['id'];
      $armes_nom[] = $row_stuff_arme['nom'];
      $armes_skin[] = $row_stuff_arme['image'];
      $armes_degats[] = $row_stuff_arme['degats'];
      $armes_prix[] = $row_stuff_arme['prix'];
    }
  $sql_stuff_jambieres = "SELECT `id`, `armure`, `nom`, `image`,`prix` FROM `jambieres` WHERE 1;";
    if (!($result_stuff_jambieres = $db->query($sql_stuff_jambieres))){
      die ('Erreur de Requete SQL (stuff_jambieres)');
    }
    while($row_stuff_jambieres = $result_stuff_jambieres->fetch_assoc()){
         $jambieres_id[] = $row_stuff_jambieres['id'];
         $jambieres_nom[] = $row_stuff_jambieres['nom'];
         $jambieres_armure[] = $row_stuff_jambieres['armure'];
         $jambieres_skin[] = $row_stuff_jambieres['image'];
         $jambieres_prix[] = $row_stuff_jambieres['prix'];
    }
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>WARCATS</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
	<link rel="stylesheet" href="font/stylesheet.css" type="text/css" media="all">
	<link rel="icon" type="image/png" href="img/faviconWarcats.ico" />
</head>
<body>
	<div class= "container">
	<section id= "contact">
		<header>
			<h1><a href="index.php">WARCATS</a></h1>
			<h2>1<span>er</span> jeu en ligne de combat de chats</h2>
			<ul id="menu-accordeon">
         		<li><a href="#">MENU</a>
	              	<ul>
	                	<li><a href="index.php">Accueil</a></li>
	                	<li><a href="profil.php">Profil</a></li>
	                	<li><a href="#">Shop</a></li>
	                	<li><a href="classement.php">Classement</a></li>
	                	<li><a href="deconnexion.php">Déconnexion</a></li>
	            	</ul>
           		</li>
      		</ul>
		</header>
		
		<div class="shop">
		</div> <!-- Fin DIV content -->
		<!-- contact -->
		<div class="nav-shop">
			<ul>
         		<li>
	              	<ul>
	                	<li><a href="casques.php">Casques</a></li>
	                	<li><a href="plastrons.php">Plastrons</a></li>
	                	<li><a href="armes.php">Armes</a></li>
	                	<li><a href="chaussures.php">Chaussures</a></li>
	            	</ul>
           		</li>
      		</ul>
		</div>

		<div class="user-money">
			<p><?php echo $argent; ?></p>
		</div>

		<div class="items-armure">

    <!--  for ($i=0; $i < 3; $i++) {
       foreach (array('nom','skin','armure','prix','skin') as $value) { -->
    <table id="lol" border="1">
      <tr>
        <th>nom</th>
        <th>skin</th>
        <th>armure</th>
        <th>prix</th>
      </tr>


    <?php for ($i=0; $i < count($plastrons_nom); $i++) : ?>
      <tr>
        <td><?php echo $plastrons_nom[$i];?></td>
        <td><?php echo $plastrons_skin[$i];?></td>
        <td><?php echo $plastrons_armure[$i];?></td>
        <td><?php echo $plastrons_prix[$i];?></td>
        <th>
          <form action="scriptshop.php" method="post">
            <input type="hidden" name="id" value="<?php echo $plastrons_id[$i]; ?>"/>
            <input type="hidden" name="nom" value="<?php echo $plastrons_nom[$i]; ?>"/>
            <input type="hidden" name="prix" value="<?php echo $plastrons_prix[$i]; ?>"/>
            <input type="submit" value="Acheter">
          </form>
          <!-- <a href="scriptshop.php?toto=<?php echo $stuff_plastron_id;?>"></a> -->
        </th>
      </tr> 
  <?php endfor; ?>  
    </table> 
		</div>	
		<footer>
			<div class= "footer">
				<ul>
					<li>Aucun chat n'a été maltraité ! </li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="mention.html">Mentions légales</a></li>
				</ul>
			</div> <!-- Fin DIV footer -->
		</footer>
	</section>
	</div> <!-- Fin DIV container -->

</body>
</html>
