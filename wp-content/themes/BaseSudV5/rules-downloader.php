<?php
/*
* Template Name: rules-donwloader
*/
?>

<?php get_header('rules'); ?>

<!-- ///////////////////////// Hero /////////////////////////// -->
<section style="height: 100px;"></section>
<!-- ////////////// END HERO //////////////////////////////// -->



<!--/////////////////// Section le siège social ////////////// -->
<section style="max-width: 1024px;display: block;margin: auto;min-height: 600px;">
<?php

if ($handle = opendir('wp-content/uploads/rules-pdf/')) {
    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        $checkVars = array('.','..');
            if (!in_array($entry, $checkVars)) {
                                $liste[] = '<li class="jeu draggable" id="'.$entry.'">'.str_replace(".pdf", "", $entry).'</li>'; // Stockage en data-[...] du nom de fichier actuel, du nom de fichier original, et en affichage : le nom de fichier (sans l'extension)
        $initiale = strtolower(substr($entry,0,1)); // Quelle est l'initiale du jeu
        if (!in_array($initiale,$lettres)) { // Si on a pas encore l'initiale dans le tableau
            $lettres[] = $initiale; // On l'ajoute
        }
            }

    };

    closedir($handle);
}
?>

    <div class="conteneur">
        <div class="alphabetique">
            <ul>
                <?php

                    foreach($lettres as $lettre) {
                        echo '<li><a href="javascript:void(0);" class="choix-lettre" data-lettre="'.$lettre.'">'.$lettre.'</a></li>'; // Affichage de chaque lettre (ou chiffre)
                    }
                ?>
            </ul>
        </div>
        <div class="jeux">
            <div class="recherche">
                <label for="recherche"><i class="fas fa-search"></i></label><input type="text" id="recherche" name="recherche" placeholder="Rechercher un jeu" />
                <?php // Champ de recherche de jeu ?>
            </div>
            <ul><?php
                foreach($liste as $fichier) {
                    echo $fichier; // Affichage de la liste stockée précédemment
                }
            ?></ul>
        </div>
        <div class="sectionRightDragDrop">
            <h1><?php $titleDG = get_field('titre') ? get_field('titre') : 'Faites glisser les jeux dans ce cadre'; echo $titleDG; ?></h1>
            <p class="sub-titleDG"><?php $textDG = get_field('texte_') ? get_field('texte_') : ''; echo $textDG; ?></p>
            <div class="selectionnes"><?php // Cadre qui contiendra les jeux sélectionnés ?>
                <i class="fa-solid fa-download"></i>
                <h2>Faites Glisser votre sélection ici</h2>
                <ul id="jeux-selectionnes"><?php // Liste des jeux sélectionnés ?>
                </ul>
                <div id="valider">
                    <button id="bouton-valider" name="bouton-valider">
                        Téléchargez votre sélection >
                        <span id="nombre_fichiers" name="nombre_fichiers"></span><?php // Span qui contiendra la quantité de fichiers à télécharger (ou vide si aucun fichier dans la liste) ?>
                        <i class="fas fa-spinner fa-spin hide loading"></i> <?php // Icône de chargement, pour indiquer que le script est en cours, caché par défaut ?>
                    </button>
                </div>
                <div id="erreur" class="hide">
                    Une erreur s'est produite, merci de réessayer ultérieurement
                </div>
            </div>
        </div>
    </div>
</section>
<!--/////////////////// Section le siège social /////////////////// -->


<?php get_footer('rules'); ?>