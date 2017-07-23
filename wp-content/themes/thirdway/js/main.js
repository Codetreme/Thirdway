(function ($) {
    "use strict";
	
	//Remove image from Twitter feed
	$('.twitter-wrap').on('DOMSubtreeModified propertychange',"#twitter-widget-0", function() {
        $(".twitter-timeline").contents().find(".timeline-Tweet-media").css("display", "none");
		$(".twitter-timeline").contents().find(".timeline-TweetList-tweet").css("border-bottom", "1px solid #ccc");
		$(".twitter-timeline").contents().find(".SandboxRoot.env-bp-min .timeline-Tweet-text").css("font-size", "13px");
		$(".twitter-timeline").contents().find(".SandboxRoot.env-bp-min .timeline-Tweet-text a").css("color", "#0d8aff");
		$(".twitter-timeline").contents().find(".timeline-Tweet-metadata").css("display", "none");
		$(".twitter-timeline").contents().find(".timeline-Tweet-actions").css("display", "none");
		$(".twitter-timeline").contents().find(".timeline-Tweet-text").css("margin-bottom", "0");
		$(".twitter-timeline").contents().find(".timeline-Tweet").css("padding-top", "20px");
		$(".twitter-timeline").contents().find(".timeline-Tweet").css("padding-bottom", "20px");
        $(".twitter-block").css("height", "100%");
    });
    
    //Nice Select
     $('select').niceSelect();

    //Slick Slider
    $(".Modern-Slider").slick({
        autoplay: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        dots: false,
        pauseOnDotsHover: false,
        cssEase: 'linear',
        fade: true,
        draggable: false,
        prevArrow: '<button class="PrevArrow"></button>',
        nextArrow: '<button class="NextArrow"></button>',
    });

    //Window Scroll Function
    $(window).on('scroll',function () {
        if ($(this).scrollTop() >= 100) {
            $("#top-nav, #menu").addClass("transition");
            $("#top-nav, #menu").addClass("shown");
        } else {
            $("#top-nav, #menu").removeClass("shown");
        }
    });
    
    //Menu
    jQuery("#menuzord").menuzord({
        indicatorFirstLevel:'<i class="fa fa-angle-down"></i>',
        indicatorSecondLevel:'<i class="fa fa-angle-right"></i>'
    });
    
    //Email Ajax
    $('#contactform').submit(function(e){
   e.preventDefault();
   var contact_name = $( "#name" ).val();
   var contact_email = $( "#email" ).val();
   var subject = $( "#subject" ).val();
   var your_phone = $( "#phone" ).val();
   var your_message = $( "#message" ).val();
   $.post("sendmail.php",
   {
       name: contact_name,
       email: contact_email,
       phone: your_phone,
       subject: subject,
       message: your_message,

   },
   function(data, status){
     document.getElementById('msgmail').innerHTML = data;
   });
});

})(jQuery);