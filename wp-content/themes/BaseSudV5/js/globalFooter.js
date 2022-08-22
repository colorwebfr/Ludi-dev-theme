  
  $(document).ready(function () 
  {
      //LightBox produits
      function lightbox_kevin(singleBodyTarget)
      {
        $('.blockGalerieProduit.notlightbox').click(function () 
        { 
            console.log('clickedLightbox');
            $(singleBodyTarget).addClass('LightBoxOpen');
            $('section.LightBox').attr('style', '');
            $('span.slick-next.slick-arrow').trigger('click');
        });

        $('.closeBtnLightBox').click(function () 
        { 
            $(singleBodyTarget).removeClass('LightBoxOpen');
            $('section.LightBox').attr('style', 'display: none !important;');
        });
      }

      lightbox_kevin('body.machines-template-default'); // For single machines
      lightbox_kevin('body.jeux-template-default'); // For Single Jeux
  });
  