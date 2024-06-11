<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>starwars</title>
    <link href="https://fonts.googleapis.com/css2?family=Asar&family=Grenze:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
  
        <div class="leftlogo"><img src="images/starwars_text.png" alt="starwars" style="width: 100px;"></div>
       
        <div class="topnav" id="myTopnav">

        <a href="javascript:void(0);" class="icon" onclick="myFunction()" style="text-align: center;">
            <i class="fa fa-bars"></i>   </a>
            <a href="livre-or.php">Tous les avis </a> 
            <a href="inscription.php">Inscription</a>
            <a href="connexion.php" style="margin-right: 15px;">Connexion</a>
            
            
        </div>
        
           <a href="profile.php"> <img src="images/dv_head.png" alt="dv" style="width: 50px;"></a>
        </nav>
<main>
    <div class="darkvader">

            <h2 class="titleh2">Saviez-vous que : </h2>

            <p class="discrip">Star Wars est considéré comme l'une des meilleures franchises pour plusieurs raisons. Tout d'abord, la saga propose une narration épique avec des thèmes intemporels comme la lutte entre le bien et le mal. Les personnages emblématiques tels que Luke Skywalker et Dark Vador sont devenus des icônes culturelles. La franchise est également saluée pour ses effets spéciaux innovants et son univers expansif exploré à travers divers médias. Enfin, "Star Wars" a laissé une empreinte indélébile sur la culture populaire, inspirant des générations de fans. </p>

            <button class="button4"> <a href="comments.php">partagez vos avis!</a></button>
    </div>
    






</main>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>



</body>
</html>