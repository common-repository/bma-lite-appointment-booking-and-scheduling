(function( $ ) {
	'use strict';

	$(function() {
        $(document).ready(function()
        {
            $('.rtwbmal_step_by_step-nav').on('click', '.rtwbmal_step_by_step-item', function(){
               var thisDiv = $(this).attr('data-attr');
               var positionDiv = $(this).position();
               
                $('.rtwbmal_step_by_step_move').css("left", positionDiv.left);
                $(document).find('.rtwbmal_step_by_step-item').each(function(){
                    if($(this).hasClass('active')){
                        $(this).removeClass('active'); 
                    }
                })
                $(this).addClass('active');
                $('.rtwbmal_tab_content').each(function(){
                    if ($(this).attr('data-tab-content') == thisDiv) {
                        $(this).addClass('show');
                    }
                    else{
                        $(this).removeClass('show');
                    }
                });
            });

        });  
    })
})( jQuery );