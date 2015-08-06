jQuery(window).load(function(){

    jQuery('#menu > li').hover(
        function(){ jQuery(this).addClass('hover'); },
        function(){ jQuery(this).removeClass('hover'); }
    );

});