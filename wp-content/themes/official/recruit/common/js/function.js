jQuery(function($) {

//scroll-------------------------------------------------
  jQuery('a[href*="#"]').click(function() {		
      var $target = jQuery(this.hash);
      $target = $target.length && $target || jQuery('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        jQuery((navigator.userAgent.indexOf("Opera") != -1) ? document.compatMode == 'BackCompat' ? 'body' : 'html' :'html,body').animate({scrollTop: targetOffset}, 1000);
       return false;
      }

  });

  $(".qaList2 .title").click(function(){
    $(this).toggleClass("bg02").next().slideToggle();
				$(this).toggleClass("nowqa");
				if($(this).hasClass('nowqa')){
					$(this).css('background-image', 'url(common/image/minus.png)');
				}else{
					$(this).css('background-image', 'url(common/image/plus.png)');
				}
  });

  //menu-------------------------------------------------
	  jQuery(".menubt").click(function(){
		  jQuery(".top").toggleClass("menuclick1");
	  });
    
	  jQuery(".menubt").click(function(){
		  jQuery(".middle").toggleClass("menuclick2");
	  });
    
	  jQuery(".menubt").click(function(){
		  jQuery(".bottom").toggleClass("menuclick3");
	  });
  
	//window
    jQuery('.menubt').on('click', function() {
     jQuery('#header .wrap nav').slideToggle();
    });
  
	//menu close
	  jQuery('#header .wrap nav a').on('click', function(){
		  if (window.innerWidth <= 1179) {
			  jQuery('.menubt').click();
		  }
   });

});