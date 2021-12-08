(function ($) {
	"use strict";

    jQuery(document).ready(function($){

		         //===== Sticky Menu-Bar Start
		        $(window).on('scroll',function(event) {    
		            var scroll = $(window).scrollTop();
		             if (scroll < 10) {
		                 $(".header-area").removeClass("sticky");
		             }else{
		                 $(".header-area").addClass("sticky");
		             }
		         });
		        //===== Sticky Menu-Bar End


		        //===== Scroll To Top Start
		        $(window).on('scroll', function (event) {
		            if ($(this).scrollTop() > 600) {
		                $('.down-button').fadeIn(200)
		            } else {
		                $('.down-button').fadeOut(200)
		            }
		        });
		            //Animate the scroll to yop
		        $('.down-button').on('click', function (event) {
		            event.preventDefault();

		            $('html, body').animate({
		                scrollTop: 0,
		            }, 1500);
		        });

		         //===== Scroll To Top End



				// Nice_select Plugin Active Start
					$(document).ready(function() {
					$('select').niceSelect();
					});
				// Nice_select Plugin Active End
					

				$(window).on('load', function(){
					//===== Prealoder
					$("#preloader").fadeOut("slow");
				});


				$(document).ready(function() {
					$('.image-link').magnificPopup({
						type:'image',
						gallery: {
							// options for gallery
							enabled: true
						  },
					});
				});

				$('.video-play-btn').magnificPopup({type:'video'});
			
							
				$(".menu_trigger").click(function(){
					$(".header-right").addClass("active");
				});
				$(".menu_x").click(function(){
					$(".header-right").removeClass("active");
				});
				
				$(".mainmenu li a, .book_One").click(function(){
					$(".header-right").removeClass("active");
				});
				

			// jQuery for page scrolling feature - requires jQuery Easing plugin ---- Need to include Plugings.js
			
			$(function() {
				$('.mainmenu li a, .bookBtn').on('click', function(event) {
					var $anchor = $(this);
					var headerH = '80';
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
					}, 600, 'easeInSine');

					event.preventDefault();
				});
			});



	});
    jQuery(window).load(function(){
    });
}(jQuery));	


