<?php
    require_once("affichage.php");
    if (($_SESSION)) {
        
        
        include("search.php");
    
   
    
$info = $omar->showInfo();
if(empty($info)){
    session_destroy();
    header("Location:../view/connexion.html");
}else {
    $nomInfo = $info['nom'];
    $prenomInfo = $info['prenom'];
    $birthdateInfo = $info['birthdate'];
    $genreInfo = $info['genre'];
    $villeInfo = $info['ville'];
    $mailInfo = $info['email'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../view/styleAccueuil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/marta" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
      <div>
          <img class="logoAcc" src="../view/images/brave.png"
      </div>
      <div class="bienvenu">
          <h1 class="pret1">Bienvenu <?php echo $prenomInfo;?></h1>
          <h1 class="pret">Prêt à chercher l'amour ?</h1>
      </div>
      
      <div id="myModal" class="modal">
          
          <div class="modal-content">
              <span class="close">&times;</span>
              <h3>Mes information</h3>
              <ul>
                  <li><?php echo "Nom : ".$nomInfo?></li>
                  <li><?php echo "Prenom : ".$prenomInfo?></li>
                  <li><?php echo "Date de naissance : ".$birthdateInfo?></li>
                  <li><?php echo "Ville : ".$villeInfo?></li>
                  <li><?php echo "Genre : ".$genreInfo?></li>
                  <li><?php echo "Email : ".$mailInfo?></li>
              </ul>
          </div>

      </div>
   
        <div class="dropdown">
            <a class="account" >Paramètres</a>

            <div class="submenu">
                <ul class="root">
                    <li ><a onClick="showHideDiv('Dashboard')" value="Show/Hide" >modifier l'email</a></li>
                    <li ><a onClick="showHideDiv1('Dashboard1')" value="Show/Hide" >modifier le mot de passe</a></li>
                    <li ><a onClick="showHideDiv2('search')" value="Show/Hide">chercher l'amour</a></li>
                    <li ><a id="myBtn">mes information</a></li>
                    <li ><a href="deconnect.php">Déconnexion</a></li>

                </ul>
            </div>
            <div>
            <div>
                <form class="modifEmail" id="Dashboard">
                    <label for="emailModif">Nouvelle email</label><input type="email" id="emailModif" name="emailModif">
                    <input type="button" id="validEmail" value="valider">
                </form>
            </div><br><br>
            <div>
                <form class="modifPass" id="Dashboard1">
                    <label for="passModif">Nouveau mot de passe</label><input type="password" id="passModif" name="passModif">
                    <input type="button" id="validPass" value="valider">
                </form>
            </div>

        </div>
      </div>
      <div>
          <form id="search" action="info.php" method="post">
              <p class="cherche1">chercher votre amour</p>
             
              <label class="look1" for="age">Age: </label><select name="age" id="age">
                  <option value="Between '1997-01-01' AND '2004-01-01'">18-25</option>
                  <option value="Between '1987-01-01' AND '1997-01-01'">25-35</option>
                  <option value="<= '1977-01-01'">45 et plus</option>
              </select>
              <label class="look1" for="genre">Genre: </label><select name="genre" id="genre">
                  <option value="Autre">Autre</option>
                  <option value="Homme">Homme</option>
                  <option value="Femme">Femme</option>
              </select>
              <label class="look1" for="ville">Ville: </label><input type="text" id="ville" name="ville">
             
              <label class="look1" for="genre">Loisir: </label><select name="loisir" id="loisir">
                  <option value="manger">Manger</option>
                  <option value="sortir">Sortir</option>
                  <option value="musique">musique</option>
                  <option value="musee">musee</option>
                  <option value="cinema">cinema</option>
                  <option value="voyager">voyager</option>
                  <option value="mode">mode</option>
              </select>
             
              <input type="submit" id="validSearch" value="chercher">
          </form>
      </div>
      <?php if(isset($_POST['age'])) {
          $age = $_POST['age'];
          $genre = $_POST['genre'];
          $ville = $_POST['ville'];
          $loisir = $_POST['loisir'];
          $guardiola = new search();
          $user = $guardiola->select($genre,$ville,$loisir,$age);
          ?>
      <div class="slideshow-container">
          <?php
          foreach ($user as $item) {
              ?>
          <div class="mySlides fade">
              <p><?php echo "Prenom : ".$item['prenom'];?></p>
              <p><?php echo "Nom : ".$item['nom'];?></p>
              <p><?php echo "Date de Naissance : ".$item['birthdate'];?></p>
              <p><?php echo "Ville : ".$item['ville'];?></p>
              <p><?php echo "Loisirs : ".$item['loisir'];?></p>
              <p><?php echo "Email : ".$item['email'];?></p>
          </div>
              <?php
              
         }
          ?>
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div><?php
          $county = count($user);
          $i = 0;
          ?>
      <div style="text-align:center"><?php
          while ( $i < $county){
             ?> <span class="dot" onclick="currentSlide(1)"></span><?php
              $i++;
          }
          ?>
      </div><?php
      }
      
      ?>
      
      
      
      <script type="text/javascript" src="../model/bisaccueil.js"></script>
</body>
</html>
<?php }else{
        header("Location:../view/connexion.html");
    }
    ?>
