(function( $ ) {
	'use strict';

	$(function() {
	 	$(document).on('click','.rtwbmal-faq-heading' ,function(){
            if ($(this).next('.rtwbmal-faq-desc1').is(':hidden')){
                $('.rtwbmal-faq-heading').removeClass('active');
                $('.rtwbmal-faq-desc1').slideUp("3000");
                $(this).addClass('active');
                $(this).next('.rtwbmal-faq-desc1').slideToggle("3000");
            }
            else{
                $('.rtwbmal-faq-heading').removeClass('active');
                $('.rtwbmal-faq-desc1').slideUp("3000");
            }
            
        }); 
        $(".rtw_close_popup").on("click",function(){
            $(".rtw_popup").hide();
        });
    
    })
})( jQuery );