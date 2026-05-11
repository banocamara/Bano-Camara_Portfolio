<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bano Camara</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php require '../composants/navigation.php'; ?>
  <?php require '../fonction.php'; ?>
       <h2 class="titre3">Mes projets</h2>

        <form method="GET" class="recherche">
          <input type="text" placeholder="Rechercher un projet..." name='q'>
        </form>
  <?php
        $projets = [
                [
                'titre'=> 'SahelMarket',
                'description' => 'Cette plateforme est actuellement en cours de développement et permettra aux 
                                  utilisateurs de publier et consulter des annonces
                                  dans différents domaines : emploi, vente de produits (voitures, téléphones, etc.) 
                                  et location de biens (maisons, appartements). 
                                  L’objectif est d’offrir une alternative plus organisée et fiable aux échanges informels 
                                  sur les réseaux sociaux comme WhatsApp ou Facebook, en centralisant toutes les annonces sur 
                                  une seule plateforme accessible et simple d’utilisation.',
                'technologies'=> ['HTML', 'CSS'],
                'image' =>[
                      '../images/SahelMarket.png'
                      ],
                'video' => '../videos/video_sahelmarket.mp4'
                      
                 ],

                 [
                'titre'=> 'Poubelle intelligente automatisée (IoT)',
                'description' => 'Dans le cadre de notre formation en Génie Logiciel et Administration des Réseaux (GLAR), 
                                  nous avons conçu une poubelle intelligente automatisée basée sur un microcontrôleur ESP32.
                                  Ce système permet d’ouvrir et de fermer automatiquement le couvercle sans contact physique,
                                  grâce à un capteur à ultrasons. Il s’inscrit dans une logique d’hygiène et d’innovation 
                                  inspirée de l’Internet des Objets (IoT).La poubelle collecte également des données environnementales
                                  (température et humidité) et les transmet vers une interface web accessible à distance.',
                'technologies'=> ['ESP32', 'Arduino IDE', 'Capteur ultrason (HC-SR04)','Servomoteur','DHT11','LDC','HTML / CSS (interface web)'],
                'image' => [
                      '../images/image_poub1.jpeg',
                      '../images/image_poub2.jpeg',
                      '../images/image_poub3.jpeg',
                      '../images/image_poub4.jpeg',
                      '../images/image_poub5.jpeg',
                      '../images/image_web.jpeg'
                  ],
                'video' => '../videos/video_poubelle.mp4'
                 ],
                 [
                'titre'=> 'Design d’affiches créatives autour de LEGO',
                'description' => 'Conception d’affiches visuelles créatives inspirées de l’univers LEGO, avec un accent sur l’harmonie des couleurs, 
                                  la mise en page et la clarté du message. 
                                  Ce projet m’a permis de développer mon sens du design, de la composition graphique et de la présentation visuelle..',
                'technologies'=> ['PicSart', 'Canva'],
                'image' =>[
                   '../images/Logo_Picsart.jpeg',
                   '../images/Logo-canva.jpeg'
                ]
                 ],
                 [
                'titre'=> 'Gestion d\'un Répertoire Téléphonique',
                'description' => 'Application développée en langage C permettant de gérer un répertoire téléphonique.
                                  Ce projet a été réalisé dans le cadre de ma formation en Génie Logiciel.
                                  Le système permet d’ajouter, modifier, rechercher, afficher et supprimer des contacts
                                  à travers un menu interactif.',
                'technologies'=> ['Langage C', 'SQL','Structures de données'],
                'image' =>[
                      '../images/ImageC1.png',
                      '../images/ImageC2.png',
                      '../images/ImageC3.png',
                      '../images/ImageC4.png',
                      '../images/ImageC5.png',
                      '../images/ImageC6.png',
                      '../images/ImageC7.png'
                ]
                 
                 ]
              ];
        $mot_cle = nettoyer($_GET['q'] ?? '');
        $resultats = [];

        #recherche de projets correspondant au mot-clé
        if ($mot_cle !== '') {
            foreach ($projets as $projet) {
                if (stripos($projet['titre'], $mot_cle)!== false ||
                    stripos($projet['description'], $mot_cle)!== false) {
                    $resultats[] = $projet;
                }
            }
        } 
        #si aucun mot-clé n'est saisi, afficher tous les projets
        else {
             $resultats = $projets;
            };
     ?>
  
     <div class ="projets-container">
          
        <?php foreach ($resultats as $projet) : ?>
        <div class='carte-projet'>
            <?php # Affichage des images du projet ?>
            <?php foreach($projet['image'] as $image) :?>
                    <img src='<?= htmlspecialchars($image) ?>'
                      alt='image projet'>
            <?php endforeach; ?>

          <?php # Affichage de la vidéo du projet s'il existe ?>
            <?php if (!empty($projet['video'])) : ?>
              <video controls class="video-projet">
               <source src="<?= htmlspecialchars($projet['video']) ?>" type="video/mp4">
              </video>
            <?php endif; ?>
            
            <h3 class='titre_projet'><?php echo htmlspecialchars($projet['titre']); ?></h3>
            <p><?= htmlspecialchars($projet['description']) ?></p>

              <?php echo"<br> <h4 class='outil'>Techonologies utilisées</h4>";?>
            <div class='technologies'>
              <?php foreach ($projet['technologies'] as $tech) : ?>
              <?php echo "<li class='features'>". htmlspecialchars($tech)." </li> <br>"; ?>
              <?php endforeach; ?>
            </div>
            
          </div>
        <?php endforeach; ?>
        
        <?php# Affichage d'un message si aucun projet ne correspond à la recherche ?>
        <?php if (empty($resultats)) : ?>
          <p>Aucun projet ne correspond à votre recherche.</p>
        <?php endif; ?>
     </div>
 <?php require '../composants/footer.php'; ?>
</body>
</html>