<!-- #Footer -->
<footer id="Footer" class="clearfix">
<div class="widgets_wrapper">
    <div class="container">      
        <div class="column one-fourth ">
        <aside id="text-5" class="widget widget_text">
			<div class="textwidget"> 
			<img src="<?php echo base_url(); ?>assets\site\img\logos\logo2.png" alt="Oignies" class="textcenter" width="15px"/>                           
			<p>Place de la IVème République 62590 Oignies</p>                 
            <p><img src="<?php echo base_url(); ?>assets\site\images\icone_fax.png" alt="Oignies" class="textcenter" width="20px"/> 03 21 37 32 59</p>  
			<p><a href="tel:0321373250" ><img src="<?php echo base_url(); ?>assets\site\images\icone_tel.png" alt="Oignies" class="textcenter icone" width="30px"/>03 21 37 32 50</p></a>              
			</div>
			</aside>
</div>
			<div class="column one-fourth textcenter">
        <aside id="text-5" class="widget widget_text">
			<div class="textwidget">
				<a href="tel:0321373259" >				                          
			<img src="<?php echo base_url(); ?>assets\site\images\icone_tel.png" alt="Oignies" class="textcenter"/></a>
			<p>Appeler l'accueil<br>
			03 21 37 32 59</p>
			</div>
            </aside>
		</div>
		<div class="column one-fourth textcenter">
        <aside id="text-5" class="widget widget_text">
			<div class="textwidget">
				<a href="mailto:service.communication@oignies.fr" >				                          
			<img src="<?php echo base_url(); ?>assets\site\images\icone_email.png" alt="Oignies" class="textcenter"/></a>
			<p>Envoyer un email<br>			
			</div>
            </aside>
		</div>
		<div class="column one-fourth textcenter">
        <aside id="text-5" class="widget widget_text">
			<div class="textwidget" >
				<a href="<?php echo base_url(); ?>pages/Nous-contacter/" >				                          
			<img src="<?php echo base_url(); ?>assets\site\images\icone_signaler_un_probleme.png" alt="Oignies" class="textcenter"/></a>
			<p >Signaler un problème<br>			
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
                 &copy; 2019 BlueStier. All Rights Reserved.<br><a href="<?php echo base_url(); ?>pages/mentions-legales/">Mentions légales</a> 
            </div>
            <!-- Social -->
            <div class="social">
                <ul>
                    <li class="facebook"><a target="_blank" href="https://fr-fr.facebook.com/VilleDeOignies/" title="Facebook"><i class="icon-facebook"></i></a></li>
                    <li class="twitter"><a target="_blank" href="https://twitter.com/villedeoignies?lang=fr" title="Twitter"><i class="icon-twitter"></i></a></li>
    </ul>
            </div>
        </div>
    </div>
</div>
</footer>
</div>


<script type='text/javascript' src='<?php echo base_url();?>/assets/site/js/jquery/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/site/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/site/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/assets/site/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>

<script>
//<![CDATA[
jQuery(window).load(function(){
var retina = window.devicePixelRatio > 1 ? true : false;if(retina){var retinaEl = jQuery("#logo img");var retinaLogoW = retinaEl.width();var retinaLogoH = retinaEl.height();retinaEl.attr("src","<?php echo base_url();?>assets/site/img/logos/logo2.png").width(retinaLogoW).height(retinaLogoH)}});
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
			tpopt.fullScreen = "off";
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
			responsiveLevels: [1240, 1024, 778, 480],
 
 /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
 gridwidth:[1240, 1024, 778, 480],

 /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
 gridheight:[400, 768, 960, 720],

 /*[DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
    visibilityLevels:[1240, 1024, 778, 480],
			
			dottedOverlay:"none",
			delay:6000,
			startwidth:1200,
			startheight:720,
			hideThumbs:200,

			thumbWidth:100,
			thumbHeight:50,
			thumbAmount:3,
			
									
			simplifyAll:"off",

			navigationType:"bullet",
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
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery.form.min.js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/frontend/add-to-cart.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/select2/select2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery-blockui/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/frontend/woocommerce.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery-cookie/jquery.cookie.min.js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/frontend/cart-fragments.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery/ui/core.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery/ui/widget.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery/ui/mouse.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery/ui/sortable.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery/ui/tabs.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery/ui/accordion.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/owl-carousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery.jplayer.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/jquery.plugins.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/mfn.menu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/site/js/scripts.js'></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/site/js/cookiechoices/cookiechoices.js"></script>
<script>document.addEventListener
('DOMContentLoaded', function(event) { cookieChoices.showCookieConsentDialog 
('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l\’utilisation des cookies.',
'J\'accepte', 'Ensavoir plus', '<?php echo base_url(); ?>pages/mentions-legales/#coockie'); });
</script>
<script>
jQuery(document).ready(function(){
	$.ui.autocomplete.prototype._renderItem = function (ul, item) {
    item.label = item.label.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
    return $("<li></li>")
            .data("item.autocomplete", item)
            .append( "<a id='recherche_a_effectuer' onClick='get_focus()'>"+item.label+"</a>" )
            .appendTo(ul);
};	
  var autocomplete = <?php echo $autocomplete ?>;  
  $( "#search" ).autocomplete({
	minLength: 3,
    source: function(request, response ){
      var expression_reguliere;
      var liste_autocomplete_triee;
      var mots_recherches;
 
      liste_autocomplete_triee = autocomplete.slice();
      mots_recherches = request.term.split(" ");
      mots_recherches = mots_recherches.filter(function(n){ return n != "" });
 
      for (i = 0; i < mots_recherches.length; i++) {
        for(var j in autocomplete){
	  expression_reguliere = new RegExp(mots_recherches[i]);
	  if(!expression_reguliere.test(liste_autocomplete_triee[j])){
            delete liste_autocomplete_triee[j];
	  }
        }
      }      
	  
      liste_autocomplete_triee = liste_autocomplete_triee.filter(function(a){return typeof a !== 'undefined';})
      response(liste_autocomplete_triee);
   }
  }); 
});


function get_focus(){	
	var recherche = document.getElementById("recherche_a_effectuer").value;		
	document.getElementById("search").value = recherche;	
}

</script>
</body>
</html>