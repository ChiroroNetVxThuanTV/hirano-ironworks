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
});

	
//sp menu-------------------------------------------------
jQuery(document).ready(function() {
	//button
		$(".menubtn").click(function(){
			$(this).toggleClass("open");
			$(".top").toggleClass("menuclick1")
			$(".middle").toggleClass("menuclick2")
			$(".bottom").toggleClass("menuclick3")
			$('nav').fadeToggle();
		});
});


//#index mainImage slide-----------------------------------------
$(function() {
	$('.mainslide').slick({
		autoplay:true,
		autoplaySpeed:6000,
		speed:2000,
		pauseOnHover:false,
		pauseOnFocus:false,
		fade:true,
		arrows:false
	});
});


//#index work slide-----------------------------------------
$(function() {
	$('.workslide').slick({
		autoplay:true,
		autoplaySpeed:4000,
		pauseOnHover:false,
		dots:true
	});
});

	

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





