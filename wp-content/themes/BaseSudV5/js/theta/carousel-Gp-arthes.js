function carouselCreated(e, data) {
    var z = {
        z: -5500
    };
    $(z).animate({
        z: -1450
    }, {
        easing: 'easeOutQuad',
        duration: 1000,
        step: function(val) {
            if (isNaN(val))
                return; //for some easings we can get NaNs
            $('.theta-carousel').theta_carousel({
                'path.settings.shiftZ': val
            });
        }
    });
}

$(document).ready(function() {

    var container = $('#container');

    // fade in effect
    container.css({
        opacity: 0
    });
    container.delay(500).animate({
        opacity: 1
    }, 500);

    container.theta_carousel({
        "filter": ".ex-item",
        "selectedIndex": 0,
        "distance": 64,
        "designedForWidth":null,
        "designedForHeight": 1099,
        "distanceInFallbackMode": 300,
        "path": {
            "settings": {
                "shiftY": 349,
                "shiftZ": -5500,
                "rotationAngleZY": 19,
                "a": 770,
                "b": 1000,
                "endless": true
            },
            "type": "ellipse"
        },
        "perspective": 929,
        "sensitivity": 0.2,
        "fadeAway": true,
        "fadeAwayBezierPoints": {
            "p1": {
                "x": 0,
                "y": 100
            },
            "p2": {
                "x": 41,
                "y": 67
            },
            "p3": {
                "x": 45,
                "y": 67
            },
            "p4": {
                "x": 100,
                "y": 33
            }
        },
        "sizeAdjustment": true,
        "sizeAdjustmentNumberOfConfigurableElements": 40,
        "sizeAdjustmentBezierPoints": {
            "p1": {
                "x": 0,
                "y": 100
            },
            "p2": {
                "x": 1,
                "y": 61
            },
            "p3": {
                "x": 5,
                "y": 72
            },
            "p4": {
                "x": 100,
                "y": 72
            }
        },
        "reflection": false,
        "reflectionBelow": 29
    });
$('#container').addClass('conrev');
    carouselCreated.call(container, null, {
        index: container.theta_carousel("option", "selectedIndex")
    });
/*/////////////////////////////////////////////////////////////*/
    $('#carrouLeft').on('click', function()
        {
            $('#container').theta_carousel('moveForward');
        });
/*///////////////////////////////////////////////////////////////////*/
 $('#carrouRight').on('click', function()
        {
            $('#container').theta_carousel('moveBack');
        });
/*///////////////////////////////////////////////////////////////////*/
    $('.chno').css('display','none');
    $('#container').on('change', function(){

       var arg = container.theta_carousel("option", "selectedIndex");
  for (cnt=0 ; cnt < 5; cnt++) 
  {
    if (cnt==arg)
    {
      $("#cnt0"+cnt).fadeIn(500);
    }
    else 
    {
      $("#cnt0"+cnt).fadeOut(50);
    }
  }
  return false; 

    });
});
/*<script type="text/javascript">
$(document).ready(function() {
$("#cnt01").fadeIn(1500);});

$(".pastil").on('click', function()
  {
  var arg = $(this).attr('href');
  for (cnt=1 ; cnt < 9; cnt++) 
  {
    if (cnt==arg)
    {
      $("#cnt0"+cnt).fadeIn(1000);
    }
    else 
    {
      $("#cnt0"+cnt).fadeOut(1000);
    }
  }
  return false;
});
</script>*/