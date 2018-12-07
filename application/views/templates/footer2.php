<!-- #Footer -->
<footer id="Footer" class="clearfix">

<div class="footer_action">
    <div class="container">
        <div class="column one column_column">
            <aside id="text-2" class="widget widget_text">
            <h2>Contact</h2>
 
            </aside>
        </div>
    </div>
</div>

<div class="widgets_wrapper">
    <div class="container">      
        <div class="column one">
        <aside id="text-5" class="widget widget_text">
            <h4>Adresse :</h4>
            <div class="textwidget">                
                <p>Mairie de Oignies<br>
                Place de la IVème République<br>
				62590 Oignies<br>
                Tel : 03 21 74 80 50<br>
                Fax : 03 21 37 32 59<br>  
                </p>                
            </div>
            </aside>
        </div>
 
  
    </div>
</div>

<div class="footer_copy">
    <div class="container">
        <div class="column one">
            <a id="back_to_top" href="#"><i class="icon-up-open-big"></i></a>
            <!-- Copyrights -->
            <div class="copyright">
                 &copy; 2018 BlueStier. All Rights Reserved. 
            </div>
            <!-- Social -->
            <div class="social">
                <ul>
                    <li class="facebook"><a target="_blank" href="#" title="Facebook"><i class="icon-facebook"></i></a></li>
                    <li class="twitter"><a target="_blank" href="#" title="Twitter"><i class="icon-twitter"></i></a></li>
    </ul>
            </div>
        </div>
    </div>
</div>
</footer>
</div>


<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>

<script>
//<![CDATA[
jQuery(window).load(function(){
var retina = window.devicePixelRatio > 1 ? true : false;if(retina){var retinaEl = jQuery("#logo img");var retinaLogoW = retinaEl.width();var retinaLogoH = retinaEl.height();retinaEl.attr("src","<?php echo base_url();?>/assets/site/course-master/images/logo2.jpg").width(retinaLogoW).height(retinaLogoH)}});
//]]>
</script>
	



<script type="text/javascript">

	/******************************************
		-	PREPARE PLACEHOLDER FOR SLIDER	-
	******************************************/
	

	var setREVStartSize = function() {
		var	tpopt = new Object();
			tpopt.startwidth = 1200;
			tpopt.startheight = 720;
			tpopt.container = jQuery('#rev_slider_4_1');
			tpopt.fullScreen = "on";
			tpopt.forceFullWidth="on";

		tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
	};

	/* CALL PLACEHOLDER */
	setREVStartSize();


	var tpj=jQuery;
	tpj.noConflict();
	var revapi1;

	tpj(document).ready(function() {

	if(tpj('#rev_slider_4_1').revolution == undefined){
		revslider_showDoubleJqueryError('#rev_slider_4_1');
	}else{
	   revapi1 = tpj('#rev_slider_4_1').show().revolution(
		{	
									dottedOverlay:"none",
			delay:6000,
			startwidth:1200,
			startheight:720,
			hideThumbs:200,

			thumbWidth:100,
			thumbHeight:50,
			thumbAmount:3,
			
									
			simplifyAll:"off",

			navigationType:"none",
			navigationArrows:"solo",
			navigationStyle:"round",

			touchenabled:"on",
			onHoverStop:"on",
			nextSlideOnWindowFocus:"off",

			swipe_threshold: 0.7,
			swipe_min_touches: 1,
			drag_block_vertical: false,
			
									
									
			keyboardNavigation:"off",

			navigationHAlign:"center",
			navigationVAlign:"bottom",
			navigationHOffset:0,
			navigationVOffset:20,

			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:40,
			soloArrowLeftVOffset:0,

			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:40,
			soloArrowRightVOffset:0,

			shadow:0,
			fullWidth:"on",
			fullScreen:"on",

									spinner:"spinner0",
									
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,

			shuffle:"off",

			autoHeight:"on",
			forceFullWidth:"off",
			
			
			hideTimerBar:"on",
			hideThumbsOnMobile:"off",
			hideNavDelayOnMobile:1500,
			hideBulletsOnMobile:"off",
			hideArrowsOnMobile:"on",
			hideThumbsUnderResolution:0,

									hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			startWithSlide:0					});



						}
	});	/*ready*/

</script>

<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery.form.min.js'></script>

<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/frontend/add-to-cart.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/select2/select2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery-blockui/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/frontend/woocommerce.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery-cookie/jquery.cookie.min.js'></script>

<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/frontend/cart-fragments.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/ui/core.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/ui/widget.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/ui/mouse.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/ui/sortable.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/ui/tabs.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery/ui/accordion.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/owl-carousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery.jplayer.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/jquery.plugins.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/mfn.menu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/cake/js/scripts.js'></script>



</body>
</html>