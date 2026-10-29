//scroll-------------------------------------------------
jQuery('a[href*="#"]').click(function() {		
		var $target = jQuery(this.hash);
		$target = $target.length && $target || jQuery('[name=' + this.hash.slice(1) +']');
		if ($target.length) {
			var targetOffset = $target.offset().top;
			jQuery((navigator.userAgent.indexOf("Opera") != -1) ? document.compatMode == 'BackCompat' ? 'body' : 'html' :'html,body').animate({scrollTop: targetOffset}, 500);
		 return false;
		}

});

	
//:tel----------------------------------------------------------------------
$(function() {
	var ua = navigator.userAgent.toLowerCase();
	var isMobile = /iphone/.test(ua)||/android(.+)?mobile/.test(ua);
	
	if (!isMobile) {
		$('a[href^="tel:"]').on('click', function(e) {
				e.preventDefault();
		});
	}
});


//pagetop-----------------------------------------------
$(function() {
	var topBtn = $('.pagetop');
/*	topBtn.hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 1000) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});*/
	topBtn.click(function() {
		$('html,body').animate({
			scrollTop:0},500);
			return false;
	});
	$(topBtn).css('cursor','pointer');
});

	
//menu button-------------------------------------------------
jQuery(document).ready(function() {
	//button
		$(".menubtn").click(function(){
			$(".top").toggleClass("menuclick1")
			$(".middle").toggleClass("menuclick2")
			$(".bottom").toggleClass("menuclick3")
			$('header .menubtn').toggleClass('open');
			$('header nav').toggleClass('open');
		});
		$('header').next().click(function() {
			$(".top").removeClass("menuclick1")
			$(".middle").removeClass("menuclick2")
			$(".bottom").removeClass("menuclick3")
			$('header .menubtn').removeClass('open');
			$('header nav').removeClass('open');
		});
});


//#index voice slide-----------------------------------------
$(function() {
	$('#index .voice ul').slick({
		slidesToShow:5,
		autoplay:true,
		autoplaySpeed:3000,
		pauseOnHover:false,
		pauseOnFocus:false,
		arrows:false,
		responsive: [{
			breakpoint: 769,
			settings: {
				slidesToShow: 2
			}
		}]
	});
});

//----------------------------------------
/*$(function() {
    var $allMsg = $('.title h1');
    var $wordList = $('.title h1').html().split("");
    $('.title h1').html("");
    $.each($wordList, function(idx, elem) {
        var newEL = $("<span/>").text(elem).css({ opacity: 0 });
        newEL.appendTo($allMsg);
        newEL.delay(idx * 70);
        newEL.animate({ opacity: 1 }, 1000);
    });
});
	*/

//Load------------------------------------------------------------
/*$(function() {
	$(function() {
		var h = $(window).height();
	 
		$('#wrap').css('display','none');
		$('#loader-bg ,#loader').height(h).css('display','block');
	});
	 
	$(window).load(function () { //全ての読み込みが完了したら実行
		$('#loader-bg').delay(900).fadeOut(800);
		$('#loader').delay(600).fadeOut(300);
		$('#wrap').css('display', 'block');
	});
	 
	//10秒たったら強制的にロード画面を非表示
	$(function(){
		setTimeout('stopload()',10000);
	});
	 
	function stopload(){
		$('#wrap').css('display','block');
		$('#loader-bg').delay(900).fadeOut(800);
		$('#loader').delay(600).fadeOut(300);
	}
});*/





