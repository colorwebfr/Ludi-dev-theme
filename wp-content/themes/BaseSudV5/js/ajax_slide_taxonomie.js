

$(document).ready(function () 
{

    // AJAX Listing Taxonomie

        $('.btn_standartSite').click(function(e) { 
            e.preventDefault();

            // if(!$(this).hasClass('disabled'))
            // {
                var data_post_type = $(this).attr('data_post_type');
                var data_term_tax = $(this).attr('data_term_tax');
                $.ajax({
                    url : ajaxvars.url,
                    method : 'post',
                    dataType: "json",
                    data : {
                        action : 'listing_tax_marque',
                        data_post_type : data_post_type,
                        data_term_tax : data_term_tax
                    },
                    success : function(response) {
                        var len = response.length;

                        $(".contListDynamiqye div.row").empty();
                       
                        for(var i=0; i<len; i++)
                        {
                            var title = response[i].title;
                            var lien = response[i].lien;
                            var visuel = response[i].visuel;
                            var content = response[i].content;
                        
                            var Post_Lists = '<article class="col-md-4 col-xs-6">' +
                                                '<a href="'+ lien +'" class="linkThumb">' +
                                                    '<h3>' + title +  '</h3>' +
                                                    '<div class="blockTop">' + visuel + '</div>' +
                                                    '<div class="blockBottom"><p>' + content + 
                                                    '</p><a href="'+ lien +'" class="post__link">Lire la suite</a>' +
                                                    '</div>' +
                                                '</a>' +
                                            '</article>';
                                            
                                            $(".contListDynamiqye div.row").append(Post_Lists);
                        }
                    },
                    error : function(xhr, error, exeption) {
                        console.log("message erreur : "  + error);
                        console.log("message exeption : "  + exeption);
                        console.log("message objet xhr : ");
                        console.log(xhr);
    
                        var messageError = "<h2>Désolés, nous n'avons pas encore de résultat pour cette recherche !</h2>";
    
                        $(".contListDynamiqye div.row").html(messageError);
                    }
                });       
            //}
        }); 

        //slideDown / slideUp
        $('.contListDynamiqye').slideUp();

        //titre post type
        $(".heroMarque a").click(function () 
        { 
            if($(this).attr('data_post_type') == 'machines')
            {
                $("h2.titleListTax").html("Toutes les machines");
                $('.contListDynamiqye').slideDown();
                $('.containTAX').slideUp();
            }
            else if($(this).attr('data_post_type') == 'jeux')
            {
                $("h2.titleListTax").html("Tous les jeux");
                $('.contListDynamiqye').slideDown();
                $('.containTAX').slideUp();
            }
        });


    });
