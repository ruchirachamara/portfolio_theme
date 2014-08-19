var site_url = 'http://localhost/www.highres-media.com/';

if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
	
}
/* Targeting IE Lower versions */
if (navigator.appName.indexOf("Internet Explorer")!= -1){     

    var badBrowser = (
	
        navigator.appVersion.indexOf("MSIE 9") == -1 &&   //v9 is ok
		
        navigator.appVersion.indexOf("MSIE 1") == -1  //v10, 11, 12, etc. is fine too
		
    );
	
    if (badBrowser){
		
        alert('Please use modern browsers like firefox or google chrome to view this website ! <Internet explorer version is under construction>');
		
    }
}

$(window).load(function(){
	/* For the DOM ready event */
	$(document).ready(function(){
		//$.noConflict();	
		var current_url =  document.URL, host_url = "http://localhost/www.highres-media.com/";	
		
		if (current_url.indexOf('/?action=open_modal_box_') != -1){
			
			modal_box_id = current_url.replace(host_url + '?action=open_modal_box_', '');
			
			$('#portfolio_model_' + modal_box_id).modal('show');
			
		}
		$('.switching_panel_behind_scene').css('background-color', '#2e3444');
		/* For the scroller button */
		$('.back-to-top').hide();
		
		$('.thumb-detail').css('display', 'none');
		
		/* For rating plugg in */
		$('.basic').jRating({
			
	  		length       :5,
			
	  		decimalLength:1,
			
			showRateInfo :false,
			
	  		onSuccess    : function(){},
			
	  		onError      : function(){
				
				alert('Sorry It went wrong!');
				
	  		}
		});		
		
		$('.switching_button').toggle(function(){
			
			$(this).addClass('rotate_switching_button');	
			
			$('.switching_panel_behind_scene').animate({
				
				backgroundColor: '#2e3444',
				
				left: '31px'
				
			}, 'slow');
			
		}, function(){
			
			$(this).removeClass('rotate_switching_button');			
			
			$('.switching_panel_behind_scene').animate({
				
				backgroundColor: '#2e3444', 
				
				left: '-186px'
				
			}, 'slow');
			
		});	
		
		$('.switching_panel_wrapper').click(function(){
			
			$('.switching_button').trigger('click');
			
		});
		
		$('.thumb').click(function(){
			
			$(this).find('.thumb-detail').stop().animate({bottom: ($(this).height() * -1) }, 500, 'easeOutCubic');
			
		});	
		/* Modal box scrolling event */
		$('.modal').scroll(function(){
			
			if (($(this).scrollTop() == 3) || ($(this).scrollTop() == 0)){				

				$(this).find('.modal-dialog').css({'top' : '33px'});

				 $('.fixed_portfolio_section').css({
					 
					 'top': '0'				 
					 
				 });

			}else{			

				$(this).find('.modal-dialog').css({'top' : $(this).scrollTop()});

				 $('.fixed_portfolio_section').css({
					 
					 'top': $(this).scrollTop()					 
					 
				 });

			}
			
		});
		/* When modal box opening */
		$('.modal').on('show.bs.modal', function (e) {
			
			$('html, body').css('overflow' , 'hidden');			

			 $('.fixed_portfolio_section').css({
				 
				 'top': '0'
				 
			 });
			
			current_portfolio_id = $(this).attr('id').replace('portfolio_model_', ''); 			
			
			$('#portfolio_model_' + current_portfolio_id).find('.share-button-top').attr('data-url', '?action=open_modal_box_' + current_portfolio_id);				
			
			if ($('.switching_panel_behind_scene').css('left') == '31px'){
				
				$('.switching_panel_behind_scene').css('z-index', '1050');
				
			}else if ($('.switching_panel_behind_scene').css('left') == '-186px'){
				
				$('.switching_panel_behind_scene').css('z-index', 100);	
				
			}
			// Get the view count of each portfolio
			$.getJSON('./wp-content/plugins/highres-portfolios/ratings.php?action=get_view_count&portfolio_id=' + current_portfolio_id,function(data){
				
				$('#portfolio_model_' + current_portfolio_id + ' .view_count_wrapper').html(data.view_count);			
				
			});		

		})
		/* When modal box closing */
		$('.modal').on('hidden.bs.modal', function (e) {		

			$('.read-less').trigger('click');	

			$('html, body').removeAttr('style');					
			
		});
		
		$('.common_modalbox_close_btn').click(function(){			

			$('.read-less').trigger('click');

			$('html, body').removeAttr('style');			

		});

		$('.modal_box_close').click(function(){			

			$('.read-less').trigger('click');	

			$('html, body').removeAttr('style');					

		});		
		/* For each and every 5 seconds footer logo will be changed */
		setInterval(function() {
			
			if ($('#solution_provider_name_wrapper').css('background-position') == "200px 4px"){
				
				if ($.browser.mozilla) {      
				
					 $('#solution_provider_name_wrapper').css({
						 
						 'background-position': '200px -14px',
						 
						 '-moz-transition': 'all 500ms ease'
						 
					 });
					 
				} else {
					
					 $('#solution_provider_name_wrapper').animate({
						 
						 'background-position-x' : '200px',
						 
						 'background-position-y' : '-14px'
						 
					 }, 500);
					 
				}	
						
			}else{
				
				if ($.browser.mozilla) {      
				
					 $('#solution_provider_name_wrapper').css({
						 
						 'background-position': '200px 4px',
						 
						 '-moz-transition': 'all 500ms ease'
						 
					 });
					 
				} else {
					
					 $('#solution_provider_name_wrapper').animate({
						 
						 'background-position-x' : '200px',
						 
						 'background-position-y' : '4px'
						 
					 }, 500);
					 
				}	
						
			}
			
		}, 5000);
		/* For the portfolio types buttons */
		$('.portfolio_model_block .portfolio_types_btns').click(function(){			
		
			portfolio_type_name = $(this).attr('name').replace('.', '');
			
			parent_portfolio_model_id = $(this).parents('div.portfolio_model_block').attr('id');			
			
			$('#' + parent_portfolio_model_id).modal('hide');
			
			put_the_post_request_for_modalbox($(this).attr('name'), portfolio_type_name);			
			
		});
		
		function put_the_post_request_for_modalbox(curr_portfolio_type, portfolio_type_name) {
			
			$('#portfoio_waiting_modal_box').modal('show');			
			
			$.post("?portfolio_type=" + curr_portfolio_type, function(data) {			
			
				if (data){					
				
					$('#portfoio_waiting_modal_box').modal('hide');				
					
					$('.back-to-top').trigger('click');
					
					$('#portfolio_type_' + portfolio_type_name).trigger('click');
					
				}  	
						
			});
			
		}
		/* For the more read more button */	
		$('.each_portfolio_featured_wrapper ul').expander({
			
			slicePoint      : 60,
			
			expandText      : '&nbsp;&nbsp;Read More...',
			
			userCollapseText: 'Read less...',
			
			collapseSpeed   : 1000,
			
			userCollapse    : false,
			
			collapseTimer   : 4000
			
		});	
		
		$('article.expander').expander({
			
			slicePoint: 100,
			
			expandText      : '&nbsp;&nbsp;Read More...',
			
			userCollapseText: 'Read less...',
			
			collapseSpeed   : 1000,
			
			userCollapse    : false,
			
			collapseTimer   : 4000
			
		});	
		
		/* Select menu option value changes reaction */
		$('#header_select_menu').change(function(){
			
			location.href = $('#header_select_menu').val();
			
		});
		/* For the scroll event functions */
		$(window).scroll(function(){		
		
			if (($(window).scrollTop() == 1) || ($(window).scrollTop() == 0)){
				
				$('.switching_panel_wrapper_offset').show();								
				
				$('header').css('opacity', '1');			
				
				$('#portfolio_select_menu_header').css('opacity', '1');
				
				$('.back-to-top').fadeOut();
				
			}else{
				
				$('.switching_panel_wrapper_offset').hide();								
				
				$('header').css('opacity', '0.9');			
				
				$('#portfolio_select_menu_header').css('opacity', '0.9');
				
				$('.back-to-top').fadeIn();			
				
			}
			
		});
		/* For the back to top button click event */
		$('.back-to-top').click(function(){
			
			$('html,body').animate({ scrollTop: 0 }, 'slow');
			
			return false; 
			
		});
		/* Portfolio flipping */
		$(function () {
			
		  $('.thumb').hover(
		  
			  function () {
				  
				  $(this).find('.thumb-detail').css('display', 'block').stop().animate({bottom:0}, 1000, 'easeOutCubic');
				  
			  },
			  function () {
				  
				  $(this).find('.thumb-detail').stop().animate({bottom: ($(this).height() * -1) }, 500, 'easeOutCubic');			
				  
			  }
			  
		  );
		  
	  });
	  	
	  $('.luanching_arrow_link').click(function(){		  
	  
		 $(this).parent().parent().find('.portfolio_read_more_link').trigger('click');
		 
	  });
	  
	  $('.thumb_image_wrapper').toggle(function(){		  
	  
		 $(this).parent().find('.thumb-detail').css('display', 'block').stop().animate({bottom:0}, 1000, 'easeOutCubic');
		 
	  }, function(){
		  
		 $(this).parent().find('.thumb-detail').stop().animate({bottom: ($(this).height() * -1) }, 500, 'easeOutCubic');		
		 
	  });	  
	  /* Isotope 3D Moving tranformation effect for each portfolio listing */
	  $(function(){
		  
		var $container = $('#portfolio_wrapper_internal_content');
		// add randomish size classes
		$container.find('.element').each(function(){
			
		  var $this = $(this), number = parseInt( $this.find('.number').text(), 10 );
			  
		  if ( number % 7 % 2 === 1 ) {
			  
			$this.addClass('width2');
			
		  }
		  
		  if ( number % 3 === 0 ) {
			  
			$this.addClass('height2');
			
		  }
		  
		});
		
		$container.isotope({
			
		  itemSelector : '.element',
		  // disable resizing
		  resizable: false,
		  // set columnWidth to a percentage of container width
		  masonry: {
			  
			columnWidth: 10
			
		  },
		  
		  getSortData : {
			  
			symbol : function( $elem ) {
				
			  return $elem.attr('data-symbol');
			  
			},
			category : function( $elem ) {
				
			  return $elem.attr('data-category');
			  
			},
			number : function( $elem ) {
				
			  return parseInt( $elem.find('.number').text(), 10 );
			  
			},
			weight : function( $elem ) {
				
			  return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
			  
			},
			name : function ( $elem ) {
				
			  return $elem.find('.name').text();
			  
			}
			
		  }
		  
		});
		// update columnWidth on window resize
		$(window).smartresize(function(){
			
		  $container.isotope({
			// set columnWidth to a percentage of container width
			masonry: {
				
			  columnWidth: 25
			  
			}
			
		  });
		  
		});
		
		var $optionSets = $('#options .option-set'), $optionLinks = $optionSets.find('a');
	
		$optionLinks.click(function(){
			
		  var $this = $(this);
		  // don't proceed if already selected
		  if ( $this.hasClass('selected') ) {
			  
			return false;
			
		  }
		  
		  var $optionSet = $this.parents('.option-set');
		  
		  $optionSet.find('.selected').removeClass('selected').removeClass('active_portfolio_type');
		  
		  $this.addClass('selected').addClass('active_portfolio_type');
		  // make option object dynamically, i.e. { filter: '.my-filter-class' }
		  var options = {}, key = $optionSet.attr('data-option-key'), value = $this.attr('data-option-value');
		  // parse 'false' as false boolean
		  value = value === 'false' ? false : value;
		  
		  options[ key ] = value;
		  
		  if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
			// changes in layout modes need extra logic
			changeLayoutMode( $this, options );
			
		  } else {
			// otherwise, apply new options
			$container.isotope( options );
			
		  }
		  
		  return false;
		  
		});
		
	  });
	  
	});	
	/* This is for the blur effect in the portfolio page */
	$(function() {				
	
	  var $container = $('#portfolio_wrapper_internal_content'), $articles	= $container.children('div.portfolio_block'), timeout;	  
	  
	  $articles.on( 'mouseenter', function( event ) {			  
	  
	  	var $article	= $(this);
	  
	  	clearTimeout( timeout );
	  
	  	timeout = setTimeout( function() {
		  
		  if( $article.hasClass('active') ) return false;
		  
		  $articles.not( $article.removeClass('blur').addClass('active') ).removeClass('active').addClass('blur');
				   
	  	}, 65 );
	  
	});	  
	
	$container.on( 'mouseleave', function( event ) {
		
	  clearTimeout( timeout );
	  
	  $articles.removeClass('active blur');
	  
    });  
	
  });	
  /* This is for the share this button */
  var share = new Share(".share-button-top", {
		//url: $('.share-button-top').attr('data-url'), 	
		networks: {
			
		  	facebook: {
			  
				app_id: "676679132380203",
			
				before: function(element) {				
			
			  		this.url = 'http://localhost/www.highres-media.com/' + $('.share-button-top').attr('data-url');
			  
			  		return this;
			  
				},
				after: function() {
				
				  console.log("User shared:", 'http://localhost/www.highres-media.com/' + $('.share-button-top').attr('data-url'));
			  
				}
			
		  	},
		  	google_plus: {
				url: element.getAttribute("data-url")
		  	},
		  	twitter: {
				url: element.getAttribute("data-url")
		  	}					
	  	}
	  
  });
  	
});		

//JQuery Twitter Feed. Coded by Tom Elliott @ www.webdevdoor.com (2013) based on https://twitter.com/javascripts/blogger.js
//Requires JSON output from authenticating script: http://www.webdevdoor.com/php/authenticating-twitter-feed-timeline-oauth/
$(document).ready(function () {

    var displaylimit = 10, twitterprofile = "Highres2014", screenname = "Highresmedia Solutions", showdirecttweets = false, showretweets = true, showtweetlinks = true,
        
        showprofilepic = true, showtweetactions = false, showretweetindicator = false, headerHTML = '', loadingHTML = '';

  headerHTML += '<div id="twitter-header"><a href="https://twitter.com/" target="_blank"><img src="' + site_url + 'wp-content/themes/highres-media/images/twitter-bird-light.png" width="34" style="float:left;padding:3px 12px 0px 6px" alt="twitter bird" /></a>';

  headerHTML += '<h1>'+screenname+' <span style="font-size:13px"><a href="https://twitter.com/'+twitterprofile+'" target="_blank">@'+twitterprofile+'</a></span></h1></div>';

  loadingHTML += '<div id="loading-container"><img src="' + site_url + 'wp-content/themes/highres-media/images/ajax-preloader.gif" width="32" height="32" alt="tweet loader" /></div>';
  
  $('#twitter-feed').html(headerHTML + loadingHTML);
   
    $.getJSON( site_url + 'server.php', 

        function(feeds) {          

            var feedHTML = '', displayCounter = 1;         

            for (var i=0; i < feeds.length; i++) {

                var tweetscreenname = feeds[i].user.name, tweetusername = feeds[i].user.screen_name, profileimage = feeds[i].user.profile_image_url_https,

                    status = feeds[i].text, isaretweet = false, isdirect = false, tweetid = feeds[i].id_str;
        
        //If the tweet has been retweeted, get the profile pic of the tweeter
        if (typeof feeds[i].retweeted_status != 'undefined'){

            profileimage = feeds[i].retweeted_status.user.profile_image_url_https;

            tweetscreenname = feeds[i].retweeted_status.user.name;

            tweetusername = feeds[i].retweeted_status.user.screen_name;

            tweetid = feeds[i].retweeted_status.id_str;

            status = feeds[i].retweeted_status.text; 

            isaretweet = true;
         };        
         
         //Check to see if the tweet is a direct message
         if (feeds[i].text.substr(0,1) == "@") { isdirect = true; }
         
         //Generate twitter feed HTML based on selected options
         if (((showretweets == true) || ((isaretweet == false) && (showretweets == false))) && ((showdirecttweets == true) || ((showdirecttweets == false) && (isdirect == false)))) { 

          if ((feeds[i].text.length > 1) && (displayCounter <= displaylimit)) {             

            if (showtweetlinks == true) { status = addlinks(status); }
             
            if (displayCounter == 1) { feedHTML += headerHTML; }
                   
            feedHTML += '<div class="twitter-article" id="tw'+displayCounter+'">';                                     

            feedHTML += '<div class="twitter-pic"><a href="https://twitter.com/'+tweetusername+'" target="_blank"><img src="'+profileimage+'"images/twitter-feed-icon.png" width="42" height="42" alt="twitter icon" /></a></div>';

            feedHTML += '<div class="twitter-text"><p><span class="tweetprofilelink"><strong><a href="https://twitter.com/'+tweetusername+'" target="_blank">'+tweetscreenname+'</a></strong> <a href="https://twitter.com/'+tweetusername+'" target="_blank">@'+tweetusername+'</a></span><span class="tweet-time"><a href="https://twitter.com/'+tweetusername+'/status/'+tweetid+'" target="_blank">'+relative_time(feeds[i].created_at)+'</a></span><br/>'+status+'</p>';
            
            if ((isaretweet == true) && (showretweetindicator == true)) { feedHTML += '<div id="retweet-indicator"></div>'; }           

            if (showtweetactions == true) { feedHTML += '<div id="twitter-actions"><div class="intent" id="intent-reply"><a href="https://twitter.com/intent/tweet?in_reply_to='+tweetid+'" title="Reply"></a></div><div class="intent" id="intent-retweet"><a href="https://twitter.com/intent/retweet?tweet_id='+tweetid+'" title="Retweet"></a></div><div class="intent" id="intent-fave"><a href="https://twitter.com/intent/favorite?tweet_id='+tweetid+'" title="Favourite"></a></div></div>'; }
            
            feedHTML += '</div>';

            feedHTML += '</div>';

            displayCounter++;

          } 

        }
        
      }
             
      $('#twitter-feed').html(feedHTML);
      
      //Add twitter action animation and rollovers
      if (showtweetactions == true) {       

        $('.twitter-article').hover(function(){

          $(this).find('#twitter-actions').css({'display':'block', 'opacity':0, 'margin-top':-20});

          $(this).find('#twitter-actions').animate({'opacity':1, 'margin-top':0},200);

        }, function() {

          $(this).find('#twitter-actions').animate({'opacity':0, 'margin-top':-20},120, function(){

            $(this).css('display', 'none');

          });

        });     
      
        //Add new window for action clicks      
        $('#twitter-actions a').click(function(){

          var url = $(this).attr('href');

          window.open(url, 'tweet action window', 'width=580,height=500');

          return false;

        });

      }
      
      function animatetweets() {  

        var tweetdelaytime = 5000, tweetfadetime = 500, fadeoffsetin = 30, fadeoffsetout = -30, starttweet = 1, animatetweet = starttweet;        
        
        for (var i=starttweet; i<displayCounter; i++) {       

          $('#tw'+i).css({'display': 'none', 'opacity':0});

        } 

        fadetweet();

        function fadetweet(){
          
          $('#tw'+animatetweet).css({

          	'display'   : 'block',

          	'margin-top': -fadeoffsetin

          }).animate({'opacity': 1, 'margin-top':0},tweetfadetime, function(){           

            $('#tw'+animatetweet).delay(tweetdelaytime).animate({'opacity': 0, 'margin-top':fadeoffsetout},tweetfadetime, function(){

              $('#tw'+animatetweet).css({'display': 'none', 'margin-top':0});

              if (animatetweet < displayCounter-2+starttweet) {

                animatetweet++;

              } else {

                animatetweet = 0+starttweet;

              }

              setTimeout(fadetweet, 0);

            });

          });

        }

      }
      
      animatetweets();
      
    }).error(function(jqXHR, textStatus, errorThrown) {

    var error = "";

       if (jqXHR.status === 0) {

               error = 'Connection problem. Check file path and www vs non-www in getJSON request';

            } else if (jqXHR.status == 404) {

                error = 'Requested page not found. [404]';

            } else if (jqXHR.status == 500) {

                error = 'Internal Server Error [500].';

            } else if (exception === 'parsererror') {

                error = 'Requested JSON parse failed.';

            } else if (exception === 'timeout') {

                error = 'Time out error.';

            } else if (exception === 'abort') {

                error = 'Ajax request aborted.';

            } else {

                error = 'Uncaught Error.\n' + jqXHR.responseText;

            } 

          alert("error: " + error);
    });    

    //Function modified from Stack Overflow
    function addlinks(data) {

        //Add link to all http:// links within tweets
         data = data.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {

            return '<a href="'+url+'" >'+url+'</a>';

        });
             
        //Add link to @usernames used within tweets
        data = data.replace(/\B@([_a-z0-9]+)/ig, function(reply) {

            return '<a href="http://twitter.com/'+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';

        });
        //Add link to #hastags used within tweets
        data = data.replace(/\B#([_a-z0-9]+)/ig, function(reply) {

            return '<a href="https://twitter.com/search?q='+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';

        });

        return data;
    }     
     
    function relative_time(time_value) {

      var values = time_value.split(" ");

      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];

      var parsed_date = Date.parse(time_value),

          relative_to = (arguments.length > 1) ? arguments[1] : new Date(),

          delta = parseInt((relative_to.getTime() - parsed_date) / 1000),

          shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);

          delta = delta + (relative_to.getTimezoneOffset() * 60);
     
      if (delta < 60) {

        return '1m';

      } else if(delta < 120) {

        return '1m';

      } else if(delta < (60*60)) {

        return (parseInt(delta / 60)).toString() + 'm';

      } else if(delta < (120*60)) {

        return '1h';

      } else if(delta < (24*60*60)) {

        return (parseInt(delta / 3600)).toString() + 'h';

      } else if(delta < (48*60*60)) {

        //return '1 day';
        return shortdate;

      } else {

        return shortdate;
      }
    }     
});

/* This is for the contact us page jquery events */
$('.contact_text_boxes, .wpcf7-textarea').focus(function(){

  $(this).css({'background-color' : '#E6E6E6'});

}).blur(function(){

  $(this).css({'background-color' : '#F5F5F5'});

});