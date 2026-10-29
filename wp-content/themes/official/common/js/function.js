jQuery(function() {

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
     jQuery('#header .inner nav').slideToggle();
    });
  
	//menu close
	  jQuery('#header .inner nav a').on('click', function(){
		  if (window.innerWidth <= 1179) {
			  jQuery('.menubt').click();
		  }
   });

});