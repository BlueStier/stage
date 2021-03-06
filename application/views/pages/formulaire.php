	<!-- #Content -->
	<div id="Content">
		<div class="content_wrapper clearfix" >
			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
							<div class="column one column_column">
								<h3><?php echo $title; ?></h3>
								<hr class="hr_left">
								<p>
                                <?php echo $intro; ?>
                                <?php if(isset($message)){echo $message;};?>
								</p>
								<div role="form" class="wpcf7" id="wpcf7-f9896-p165-o1" lang="fr" dir="ltr">
									<div class="screen-reader-response">
                                    </div>
                                    <?php  $attributes = array('class' => 'contact', 'id' => 'contact-form');
                                    if(! isset($sidebar)){
										echo form_open_multipart('pages/form/'.$id, $attributes);
									} else { 
										echo form_open_multipart('pages/form/'.$id.'/'.$pers_id, $attributes); }
                                    echo "<p>";
							for($i = 1; $i <= $nb_champ; $i++){
								switch($form['type'.$i]){
									case"nom" :
									case"prenom" :
									case"adresse" :?>						
											<span class="wpcf7-form-control-wrap name">
												<input type="text"  name="<?php echo $form['champ'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text " aria-invalid="false" placeholder="<?php echo str_replace('_',' ',$form['champ'.$i]); ?>" <?php if($form['ob'.$i]){echo 'required';}?>/>
											</span>
                                            <?php break;
                                                case"email" :?>
                                                	<span class="wpcf7-form-control-wrap email">
												 <input type="email" name="<?php echo $form['champ'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="<?php echo str_replace('_',' ',$form['champ'.$i]); ?>" <?php if($form['ob'.$i]){echo 'required';}?> />
                                            </span>	
											<?php break;
											 case"tel" :?>
											 <span class="wpcf7-form-control-wrap email">
										  <input type="tel" name="<?php echo $form['champ'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="<?php echo str_replace('_',' ',$form['champ'.$i]); ?>" pattern="[0-9]{10}" <?php if($form['ob'.$i]){echo 'required';}?> />
									 </span>	
									 <?php break;
                                                case"area" :?>
                                                <span class="wpcf7-form-control-wrap message">
												<textarea  name="<?php echo $form['champ'.$i];?>" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea"  aria-invalid="false" placeholder="<?php echo str_replace('_',' ',$form['champ'.$i]);?>" <?php if($form['ob'.$i]){echo 'required';}?>></textarea>
                                            </span>
                                            <?php break;
                                            case"liste" :?>
                                            <span class="wpcf7-form-control-wrap name">
                                            <input type="hidden" name='nb_champ' value="<?php echo $form['champ'.$i];?>"/>
                                            <legend ><?php echo str_replace('_',' ',$liste['nom_champ']); ?></legend>
                                            <select name="<?php echo $liste['nom_champ'];?>" class="wpcf7-form-control wpcf7-text">
								<?php for( $a = 1; $a <= $nb_item; $a++){?>
								<option <?php if($a==1){echo "selected";} ?>><?php echo $liste['titreitem'.$a] ?></option>
								<?php } ?>
                                </select>
                                </span>
                                             <?php break;
                                                 case"nb" :?>
                                  	<span class="wpcf7-form-control-wrap name">
												<input type="text"  name="<?php echo $form['champ'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text " aria-invalid="false" placeholder="<?php echo str_replace('_',' ',$form['champ'.$i]); ?>" <?php if($form['ob'.$i]){echo 'required';}?>/>
											</span>
                                            <?php break;
                                            case"file" :?>
                                            	<span class="wpcf7-form-control-wrap name">
                                            <label id='label_file' for='file'  size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" onBlur="confselectfile();" value=""><?php echo str_replace('_',' ',$form['champ'.$i]); ?></label>							
                                            <input id='file' name="<?php echo $form['champ'.$i];?>" onChange="confselectfile(this.value);" style='display: none;' type="file">
                                            </span>
											<?php break;											
                                            case"date" :?>
                                            <span class="wpcf7-form-control-wrap name">
                                                <label class="wpcf7-form-control wpcf7-text"> <?php echo $form['champ'.$i]; ?>                                             																																
                                            <input name="<?php echo $form['champ'.$i];?>" type="date" value="" size="40" class="wpcf7-form-control wpcf7-text " aria-invalid="false" placeholder="<?php echo str_replace('_',' ',$form['champ'.$i]); ?>" <?php if($form['ob'.$i]){echo 'required';}?> />
                                </label>
                                            </span>	
                                        <?php break;
                                            		}
                                                } ?>									
								<p>
								Les informations recueillies dans
								le présent formulaire ont pour objet le traitement et le suivi de votre demande.<br>
								<a href="<?php echo base_url() ?>/pages/donnees-personnelles-formulaire-contact/"> En savoir plus sur la gestion de vos données et vos
droits </a><br>
 <input type="checkbox" required/>J’ai pris connaissance des informations relatives à la
confidentialité de mes données personnelles.
								</p>				
                                            <input type ='hidden' name='page' value="<?php echo $page; ?>"/>
											<button type="submit" value='Envoyer' class="wpcf7-form-control wpcf7-submit">Envoyer</button>
                                            </form>
                                            <div id="msg" class="message"></div>
										<p></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			
            <div class="section the_content">
					<div class="section_wrapper">
						<div class="the_content_wrapper">
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($sidebar)){?>
			<!-- .four-columns - sidebar -->
			<div class="four columns">
				<div class="widget-area clearfix">
					<aside id="widget_mfn_menu-2" class="widget widget_mfn_menu">
					<h3>Vous pourriez être intéressé par : </h3>
					<ul class="menu">
					<?php foreach($page_lier as $pl): 
						if($pl['titre'] != $title){?>
						<li class="page_item page-item-771"><a href="<?php echo base_url().'pages/'.$pl['nom'].'/'.$pers_id; ?>"><?php echo $pl['titre'];?></a></li>
			<?php } endforeach; ?>						
					</ul>
					</aside>
				</div>
			<?php } ?>		
			<div class="column one column_divider">
								<hr />
							</div>
							<?php if($consult){ ?>
								<div class="column one column_column textcenter">
								<?php echo $consultvox['intro']; ?>
								<div class="column one column_divider">
								<hr />
							</div>
								<?php echo $consultvox['balise']; ?>
							</div>
							<?php } ?>		
		</div>
	</div>

    <script>
function confselectfile(val){	
	document.getElementById('label_file').innerHTML = "fichier sélectionné :" + val;	
}
</script>