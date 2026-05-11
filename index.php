<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bano Camara</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php require 'composants/navigation.php'; ?>
        <?php require 'fonction.php'; ?>
        <?php
        # Initialisation des variables pour la gestion des formulaires
        $erreurs  = [];
        $succes   = false;
        $nom      = '';
        $email    = '';
        $message  = '';
        $description = '';
        $budget='';
        $type_projet='';
        $nom_complet="";
        $email_projet="";
        $type_formulaire="";

        # Traitement des formulaires de contact et de demande de projet
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type_formulaire=$_POST['formulaire'];
            if($type_formulaire==='contact')
                {
                    # Nettoyage et validation des champs du formulaire de contact
                    $nom   = nettoyer($_POST['nom']     ?? '');
                    $email  = nettoyer($_POST['email']   ?? '');
                    $message = nettoyer($_POST['message'] ?? '');
                    # Validation des champs du formulaire de contact
                    if (!champ_requis($nom))
                        {
                            $erreurs[] = 'Le nom est obligatoire.';
                        };
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            $erreurs[] = 'L\'adresse e-mail est invalide.';
                        };
                    if (!champ_requis($message))
                        {
                            $erreurs[] = 'Le message ne peut pas être vide.';
                        };
                }
            # Traitement du formulaire de demande de projet
            if($type_formulaire==='projet')
                {
                    # Nettoyage et validation des champs du formulaire de demande de projet
                    $description = nettoyer($_POST['description'] ?? '');
                    $budget = nettoyer($_POST['budget'] ?? '');
                    $type_projet = nettoyer($_POST['type_projet'] ?? '');
                    $nom_complet = nettoyer($_POST['nom_complet'] ?? '');
                    $email_projet= nettoyer($_POST['email_projet'] ?? '');

                    # Validation des champs du formulaire de demande de projet
                    if (!champ_requis($description))
                        {
                            $erreurs[] = 'Le message ne peut pas être vide.';
                        }

                    if (!filter_var($email_projet, FILTER_VALIDATE_EMAIL))
                        {
                            $erreurs[] = 'L\'adresse e-mail est invalide.';
                        }
            
                    if (!champ_requis($budget))
                        {
                            $erreurs[] = 'Le budget ne peut pas être vide.';
                        }
                    if (!champ_requis($nom_complet))
                        {
                            $erreurs[] = 'Votre nom est obligatoire.';
                        }
                 }
            # Si aucune erreur n'est survenue, marquer le succès de l'envoi du message ou de la demande de projet     
            if (empty($erreurs)) {
                $succes = true;
            };
            # Préparation des données de la demande de projet pour un éventuel traitement ultérieur (ex: envoi par email, stockage en base de données, etc.)
            $demande =
             [
                'nom' => nettoyer($_POST['nom'] ?? ''),
                'email' => nettoyer($_POST['email'] ?? ''),
                'type_projet'=> nettoyer($_POST['type_projet'] ?? ''),
                'description'=> nettoyer($_POST['description'] ?? ''),
                'budget'=> nettoyer($_POST['budget'] ?? ''),
                'message'=> nettoyer($_POST['message'] ?? '')
            ];
        }
        ?>
        
        <div class="code" id="haut">
            <span class="signe"><i class="fa-solid fa-code"></i></span> <span class="port"> Portfolio </span></i>
        </div>

        <div class="section">
            <div class="presentation">
                <span class="code"> <span><i class="fa-solid fa-door-open"></i></span> Bienvenue sur mon <span class="port">Portfolio</span></i></span><br><br>
                <span class="paragraphe">
                    Je suis<span class="nom"> Bano Camara</span>, étudiant en Génie Logiciel et Administration Réseaux (GLAR).
                    Passionné par l’informatique, je m’intéresse particulièrement au développement web, à la programmation et aux réseaux.
                    Je transforme mes idées en solutions concrètes.
                </span>  
            </div>

            <div class="stats">
            <div class="stat-box">
                <h3>3+</h3>
                <p>Projets réalisés</p>
            </div>
            <div class="stat-box">
                <h3>5+</h3>
                <p>Technologies</p>
            </div>
            <div class="stat-box">
                <h3>1+</h3>
                <p>Année d'apprentissage</p>
            </div>
            </div>
            <div class="photo">
                    <img src="images/photo.png" alt="profil" width="200px">
            </div>

            
        </div>

        <a href="cv/CV_Bano_Camara.pdf" download class="btn-cv">
    📄 Télécharger mon CV
        </a>
    <br>
        <div class="pourquoi">
        <h3>Pourquoi me choisir ?</h3>
        <ul>
            <li>✔ Sérieux et motivé</li>
            <li>✔ Apprentissage rapide</li>
            <li>✔ Passionné par la tech</li>
        </ul>
        </div>
        <div class="contact">
                <h2 class="reseau">Me Suivre:</h2>
                <li> <a href="mailto:bano65406@gmail.com"><i class="fa-solid fa-envelope"> Mail</i></a> </li>
                <li> <a href="https://github.com/banocamara"><i class="fa-brands fa-github"> GitHub</i></i></a></li>
                <li><a href="https://www.facebook.com/share/1Gu4WivCge/?mibextid=wwXIfr"><i class="fa-brands fa-facebook"> Facebook</i></a></li>
                <li><a href="https://www.linkedin.com/in/bano-camara-423b101a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i class="fa-brands fa-linkedin"> Linkedin</i></a></li>
        </div>
    <br>
        
        <div class="formulaire">
            <h2>Contactez-moi</h2>
            <?php if (!empty($erreurs)) : ?>
                <div class="erreurs">
                    <?php foreach ($erreurs as $erreur) : ?>
                        <p><?= $erreur ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($succes) : ?>
                <p class="succes">
                    Message envoyé avec succès !
               </p>
            <?php endif; ?>

            <form method="POST" action="">
                <input type="hidden" name="formulaire" value="contact">
                <input type="text" name="nom" placeholder="Votre nom" required value="<?= $nom ?>">
                
                <input type="email" name="email" placeholder="Votre email" required>
                
                <textarea placeholder="Votre message" name="message" rows="5" required></textarea>
                
                <button type="submit">Envoyer</button>
            </form>
        </div>

        <div class="cta">
        <h3>Un projet en tête ?</h3>
        <p>Contactez-moi dès maintenant pour en discuter.</p>
        </div>
        <div class="formulaire-projet">
            <h2>📩 Demande de projet</h2>

            <form method ="POST" action ="">
            <input type="hidden" name="formulaire" value="projet">
            <input type="text"name="nom_complet" placeholder="Nom complet" required>

            <input type="email" name="email_projet" placeholder="Email" required>

            <select required name="type_projet">
                <option value="">Choisir un type de projet</option>
                <option>Site vitrine</option>
                <option>E-commerce</option>
                <option>Application web</option>
            </select>

            <input type="number" name="budget" placeholder="Budget estimé (FCFA)" required>

            <textarea placeholder="Décrivez votre projet..." rows="5" required name="description"></textarea>

            <button type="submit">Envoyer la demande</button>
            </form>
        </div>
        <?php require 'composants/footer.php'; ?>
</body>
</html>