(function($){
  "use strict";
	
	// on ready function
	jQuery(document).ready(function($) {
   		var $this = $(window);
		
		// on load function
		$this.on("load",function(){
			
		});
		
		// on scroll function
		$this.on("scroll",function(){
			
		});
		
		// on resize function
		$this.on("resize",function() {
			
		});	
		
		//on bind scroll 
		$this.bind("scroll", function() {
			
		});
		// for revel slider
		
		var revapi4;
			if($("#rev_slider_4_1").revolution == undefined){
				revslider_showDoubleJqueryError("#rev_slider_4_1");
			}else{
				revapi4 = $("#rev_slider_4_1").show().revolution({
							sliderType:"standard",
							jsFileLocation:"../../revolution/js/",
							sliderLayout:"fullwidth",
							dottedOverlay:"none",
							delay:9000,
							navigation: {
									keyboardNavigation:"off",
									keyboard_direction: "horizontal",
									mouseScrollNavigation:"off",
									onHoverStop:"off",
									touch:{
										touchenabled:"on",
										swipe_threshold: 75,
										swipe_min_touches: 1,
										swipe_direction: "horizontal",
										drag_block_vertical: false
									}
							,
							arrows: {
										style:"zeus",
										enable:true,
										hide_onmobile:true,
										hide_under:600,
										hide_onleave:true,
										hide_delay:200,
										hide_delay_mobile:1200,
										tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
										left: {
											h_align:"left",
											v_align:"center",
											h_offset:30,
											v_offset:0
										},
										right: {
											h_align:"right",
											v_align:"center",
											h_offset:30,
											v_offset:0
										}
									}
							,
							bullets: {
										enable:true,
										hide_onmobile:true,
										hide_under:600,
										style:"metis",
										hide_onleave:true,
										hide_delay:200,
										hide_delay_mobile:1200,
										direction:"horizontal",
										h_align:"center",
										v_align:"bottom",
										h_offset:0,
										v_offset:30,
										space:5,
										tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
							}
						},
						viewPort: {
									enable:true,
									outof:"pause",
									visible_area:"80%"
								},
								responsiveLevels:[1240,1024,778,480],
								gridwidth:[1240,1024,778,480],
								gridheight:[600,600,500,400],
								lazyType:"none",
								parallax: {
									type:"mouse",
									origo:"slidercenter",
									speed:2000,
									levels:[2,3,4,5,6,7,12,16,10,50]
								},
								shadow:0,
								spinner:"off",
								stopLoop:"off",
								stopAfterLoops:-1,
								stopAtSlide:-1,
								shuffle:"off",
								autoHeight:"off",
								hideThumbsOnMobile:"off",
								hideSliderAtLimit:0,
								hideCaptionAtLimit:0,
								hideAllCaptionAtLilmit:0,
								debugMode:false,
								fallbacks: {
									simplifyAll:"off",
									nextSlideOnWindowFocus:"off",
									disableFocusListener:false
								}
							});
						}
		// for counter 
		
		$('.timer').each(count);
		function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }	
	
	//preloader js
			$(".mj_preloader").delay(1000).fadeOut();
			$(".mj_preloaded").delay(1000).fadeOut("slow");
		
		
		// recent article slider
		
		var owl = $(".mj_articleslider .owl-carousel");
		owl.owlCarousel({
			items:3,
			autoplay:false,
			loop:false,
			dots:true,
			nav: false,
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 2
				},
				992: {
					items: 3
				},
				1200:{
					items: 3
				}
			}
		});
		// for video overlay
		
		jQuery(function($){
		$('.mj_video .mj_videooverlay_inner a i').on("click", function(e) {
			e.preventDefault();
			$('.mj_video .mj_videodiv').hide();	
			$('#video').css("display", "block");
			$('#video').attr('src',$('#video').attr('src')+'?rel=0&autoplay=1');
			});
		});
                //Goto Top
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
            $(".totop").fadeIn();
			} else {
            $(".totop").fadeOut();
			}
		});
		$(".totop").on("click", function() {
			$("html, body").animate({
            scrollTop: 0
			}, 600);
			return false;
		});
	// Experience Slider js
		$('#ex1').slider({
			formatter: function(value) {
				return 'Current value: ' + value;
			}
		});
		
	// Salary Slider js
		$("#ex2").slider({});
		
	// Client Say Slider
		
		var owl1 =  $(".mj_testimonial_slider_content .owl-carousel");
		owl1.owlCarousel({
			loop:true,
			items:1,
			dots: true,
			nav: false,
			//animateIn: 'fadeIn',
			//animateOut: 'fadeOut',
			autoHeight: false,
			touchDrag: false,
			mouseDrag: false,
			margin:0,
			autoplay:false
		});
		// blog page Slider
		
		var owl2 = $(".mj_blog_slider_content .owl-carousel");
		owl2.owlCarousel({
			items:1,
			autoplay:false,
			loop:false,
			dots:true,
			nav: false
		});
		
			// On focus Placeholder css
			var place = '';
			$('input,textarea').focus(function(){
				place = $(this).attr('placeholder');
			$(this).attr('placeholder','');
			}).blur(function(){
			$(this).attr('placeholder',place);
			});
		
		// mixitup js
		$(".mj_filter_menu a, .mj_team_filter_menu a").on("click", function(e) {
			e.preventDefault();
		});
			$('#mj_grid').mixItUp();

		
		// fancybox js
		$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
		});
		
		// profile toggle 
		$('#my_profile_div').hide();
		$('.mj_profileimg').on("click", function(e) {
			if($('.mj_likedetails').css('display') == 'block')
			{ $('.mj_likedetails').slideUp(); }
			
			if($('.mj_notification_detail').css('display') == 'block')
			{ $('.mj_notification_detail').slideUp(); }
		
			$('#my_profile_div').slideToggle("slow");
			e.stopPropagation();
		});
		
		// login toggle 
		$('#my_profile_div_login').hide();
		$('.mj_logintoggle').on("click", function(e) {
			$('#my_profile_div_login').slideToggle("slow");
			e.stopPropagation();
		}); 
		
		
		$(document).on("click",function(e){
			if (!$(e.target).is('#my_profile_div_login *')) {
				$("#my_profile_div_login").slideUp();
			}
			
			if (!$(e.target).is('#my_profile_div *')) {
				$("#my_profile_div").slideUp();
			}
			
			if (!$(e.target).is('.mj_likedetails *')) {
				$(".mj_likedetails").slideUp();
			}
			
			if (!$(e.target).is('.mj_notification_detail *')) {
				$(".mj_notification_detail").slideUp();
			}
		});
		
		// load more toggle
		$('.widget_posts .mj_showmore a').on("click",function(e){
			e.preventDefault();
			$('.widget_posts ul').css("height", "auto");
			
		});
		// custom select box 
		
		$(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
		
	//datepicker
	
	$( "#datepicker" ).datepicker();
	
	// custom add and remove field
	
		$(".mj_addurldiv").hide();
		$(".mj_addurl").on("click",function(e){
			var id=$(this).attr('id');
			$(".mj_addurl").each(function() {
				$('.mj_addurldiv').hide();
				});
		$('#div'+id).show(400);
		});
	
	    $(".mj_add").on("click", function(e) {
        var intId = $(".mj_addurldiv").length + 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<input type=\"text\" class=\"form-control mj_small_input\" />");
        var removeButton = $("<input type=\"button\" class=\"mj_remove\" value=\"x\" />");
        removeButton.on("click", function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(removeButton);
        $(".mj_addurldiv").append(fieldWrapper);
    });
	
	// grid -mesonary 
	  $('.grid').isotope({
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer'
    }
  });
  
  // menu search option
  $(".mj_search_option").hide();
  $(".mj_searchbtn").mouseover(function(){
		$(".mj_search_option").show();
  });
  $(".mj_searchbtn").mouseout(function(){
		$(".mj_search_option").hide();
		
  });
	// menu like option 
		$('.mj_likedetails').hide();
		$('.mj_likes').on("click", function(e) {
			
			if($('#my_profile_div').css('display') == 'block')
			{ $('#my_profile_div').slideUp(); }
			
			if($('.mj_notification_detail').css('display') == 'block')
			{ $('.mj_notification_detail').slideUp(); }
			
			$('.mj_likedetails').slideToggle("slow");
			e.stopPropagation();
		});
	// menu notification option 
		$('.mj_notification_detail').hide();
		$('.mj_notification').on("click", function(e) {
			
			if($('#my_profile_div').css('display') == 'block')
			{ $('#my_profile_div').slideUp(); }
			
			if($('.mj_likedetails').css('display') == 'block')
			{ $('.mj_likedetails').slideUp(); }
			
			$('.mj_notification_detail').slideToggle("slow");
			e.stopPropagation();
		});
	// woocommerce checkout process
		$("input[name$='checkout']").on("click",function () {
		
        var test = $(this).val();
        $(".payment_box").hide('slow');
        $(".payment_box[data-period='" + test + "']").show('slow');
		});
		var width= $(window).width();
		if(width <= 767){
			$(".mj_responsivetable").addClass("table-responsive");
		}
		//ck editor
		$( 'textarea#editor1' ).ckeditor();
		$( 'textarea#editor2' ).ckeditor();
		
	// only for safari browser
		var isSafari = (/Safari/.test(navigator.userAgent)) && (/Apple Computer/.test(navigator.vendor));
			if (isSafari) {
				$(".mj_mainheading .mj_mainbtn, .mj_postdiv .mj_mainbtn, .mj_blog_btn .mj_mainbtn, .mj_team_btn .mj_mainbtn, .mj_addsection .mj_mainbtn").addClass("mj_btnforsafari");
				$(".mj_newsletter .form-group").css("margin-top", "10px");
				$(".mj_newsletter .form-control").css("margin-top", "-24px");
				$(".mj_updatecart .mj_mainbtn").css("padding", "11px 30px");
			}
	});
})(); 
	
		