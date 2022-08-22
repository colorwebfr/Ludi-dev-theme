$(document).ready(function() {

    function refreshNombreFichiers() { // Fonction servant à rafraichir le nombre de fichiers sélectionnés dans le bouton de téléchargement
        var nombre_fichiers = $('.a-selectionner').length; // On compte combien d'éléments dans le ul
        if (nombre_fichiers == 0) { // S'il n'y en a aucun
            $('#nombre_fichiers').html(''); // On vide le span
        } else { // Sinon
            $('#nombre_fichiers').html(' ('+nombre_fichiers+' fichiers sélectionnés)'); // On formate le nombre et on le met dans le span
        }
    }

    $('.draggable').draggable({ // Définit les éléments qui pourront être glissés / déposés
        revert: "invalid",
        helper: "clone", // Indique que l'on clone l'élément pendant le glissage
        cursor: "move" // Curseur utilisé pendant le déplacement
    });

    $('.selectionnes').droppable({ // Définit la zone dans laquelle on drop les fichiers
        classes: {
            "ui-droppable-active": "selectionnes-hover" // Ce sont les classes qui sont affectées à l'objet quand on survole la zone de drop
        },
        drop: function(event,ui) { // Fonction qui s'exécute au moment de dropper un objet, event : ce qu'il se passe, ui : l'élément concerné (stocké dans la clé "draggable")
            var id_fichier = ui.draggable[0].id;
            //alert(id_fichier); // On récupère l'ID (nom actuel du fichier)
            var nom_fichier = ui.draggable[0].id; // On récupère le bon nom du fichier (pour renommer correctement au sein du zip)
            var nom_fichier_sans_extension = ui.draggable[0].innerHTML; // On récupère le nom du fichier sans extension, pour potentielle utilisation ultérieure
            $(ui.draggable[0]).addClass('jeu-selectionne'); // On rajoute la classe jeu-selectionné à l'original, pour le cacher de la liste de gauche
            $(ui.draggable[0]).clone() // On clone l'élément pour en récupérer toutes les informations
                .removeClass('jeu-selectionne') // On lui enlève la classe qui le cache
                .addClass('a-selectionner') // On lui rajoute une classe qui servira à les compter
                .attr('id','select-'+id_fichier) // On change l'ID pour qu'il n'y ait pas de conflit d'ID
                .attr('data-id',id_fichier) // On stocke dans les data l'ID (nom actuel du fichier)
                .append('<i class="annuler fas fa-times-circle"></i>') // On rajoute le bouton qui servira à le retirer de la liste
                .appendTo($('#jeux-selectionnes')); // Et enfin on ajoute cet élément au ul qui servira à tout compter et envoyer au script PHP
            refreshNombreFichiers(); // On actualise le nombre de fichiers sélectionnés
        }
    });

    $(document).on('click','#bouton-valider',function() { // Fonction qui exécute le traitement et appel ajax
        $('#erreur').hide(); // On pars du principe qu'il n'y a pas encore d'erreur, si la div est affichée on la cache
        $('.loading').show(); // On affiche l'animation de chargement dans le bouton
        if ($('.a-selectionner').length == 0) { // Si aucun fichier n'est sélectionné
            alert('Veuillez sélectionner des fichiers'); // On alerte l'utilisateur
        } else { // Sinon 
            var json = []; // On utilise une variable qui servira à serialiser les paramètres à envoyer en ajax
            
            $.each($('.a-selectionner'),function() { // Pour chaque fichier dans la liste des sélectionnés
                var id_fichier = $(this).data('id'); // On récupère l'ID (nom actuel du fichier)
                var nom_fichier = $(this).text(); // On récupère le nom du fichier (après renommage)
                json.push({id: id_fichier, nom: nom_fichier}); // On ajoute tout ça à la variable json
            });

    jQuery.ajax({
        url : ajaxvars.url,
        method : 'post',
        data : {
            action : 'downloadzip_ajax',
            data1 : json
        },
        success : function(response) {
            $('.loading').hide(); // Plus besoin de l'animation de chargement dans le bouton, on la cache
            if (response == "ko") { // Si ça renvoie "ko", une erreur s'est produite, on met un message d'erreur
                $('#erreur').show(); // On affiche le message d'erreur
            } else { // Sinon on reçoit le nom du fichier
                $('#jeux-selectionnes').empty(); // On vide la liste des sélectionnés
                $('.jeu-selectionne').removeClass('jeu-selectionne'); // On retire la classe de jeu sélectionné à tous ceux qui l'ont
                refreshNombreFichiers(); // On actualise le nombre de fichiers sélectionnés
                //alert(response);
                window.location.href = response; // On renvoie l'internaute vers le zip
            }
        },
        error : function(xhr, error, exeption) {
            $('.loading').hide(); // Plus besoin de l'animation de chargement dans le bouton, on la cache
            $('#erreur').show(); // On affiche le message d'erreur
        }
    });
        }
    });

    $(document).on('click','.choix-lettre',function() { // Filtrage des jeux selon l'initiale, classe active = bouton activé, affiché en couleur, inactive = bouton grisé
        var lettre = $(this).data('lettre'); // Lettre sur laquelle on a cliqué

        if ($(this).hasClass('lettre-active')) { // Si celle-ci est déjà active, on désactive le filtre par initiale
            $('.choix-lettre').removeClass('lettre-active'); // On lui retire la classe active
            $('.choix-lettre').removeClass('lettre-inactive'); // On retire à tout le monde la classe inactive
            $('.jeu').removeClass('hide'); // On réaffiche tout
        } else {
            // D'abord on s'occupe du passage active / inactive
            if ($(this).hasClass('lettre-inactive')) { // Sinon si c'était une inactive auparavant
                $('.lettre-active').removeClass('lettre-active').addClass('lettre-inactive'); // On passe l'active courante à inactive
                $(this).removeClass('lettre-inactive').addClass('lettre-active'); // On passe celle sur laquelle on vient de cliquer d'inactive à active
            } else {
                $('.choix-lettre').not($(this)).addClass('lettre-inactive'); // Sinon par défaut on met inactive à tout le monde sauf elle même
                $(this).addClass('lettre-active'); // et on lui assigne la classe active
            }

            // Ensuite on s'occupe de cacher les jeux ayant la mauvaise initiale
            $.each($('.jeu'),function() {
                var initiale_jeu = $(this).html().charAt(0).toLowerCase(); // On récupère le premier caractère du jeu, on le met en minuscule
                if (initiale_jeu == lettre) { // Et on le compare à la lettre choisie
                    $(this).removeClass('hide'); // Si c'est la même, on s'assure qu'il soit affiché
                } else {
                    $(this).addClass('hide'); // Sinon on le cache
                }
            });
        }
    });

    $(document).on('click','.annuler',function() { // Ce qu'il se passe quand on clique sur le bouton pour retirer un élément
        var element = $(this).parent(); // L'élément est le li contenant le bouton sur lequel on a cliqué, on le sélectionne avec la fonction parent()
        var id_fichier = element.data('id'); // On récupère l'ID de fichier (pour pouvoir sélectionner l'élément caché dans la liste disponible)
        $('#'+id_fichier).removeClass('jeu-selectionne'); // On lui retire la classe qui le cache
        element.remove(); // Et on retire l'élément courant de la liste des sélectionnés
        refreshNombreFichiers(); // Du coup, on actualise le nombre de fichiers dans le bouton
    });

    $(document).on('keyup','#recherche',function() { // Fonction de recherche de jeu par le champ texte dédié
        // Si on recherche par nom, la recherche par lettre n'est plus pertinente
        $('.choix-lettre').removeClass('lettre-active'); // On retire à tout le monde la classe active
        $('.choix-lettre').removeClass('lettre-inactive'); // On retire à tout le monde la classe inactive
        $('.jeu').removeClass('hide'); // On réaffiche tout
        var jeu_recherche = $(this).val().toLowerCase(); // On récupère le je recherché (en minuscules pour la comparaison)
        $.each($('.jeu'),function() { // Pour chaque jeu de la liste
            var nom_jeu = $(this).html().toLowerCase(); // On récupère le nom du jeu et on le met en minuscule
            if (nom_jeu.indexOf(jeu_recherche) !== -1) { // Si le nom du jeu contient la chaine recherchée
                $(this).removeClass('hide'); // On le réaffiche
            } else { // Sinon on le cache
                $(this).addClass('hide');
            }
        });
    });
});