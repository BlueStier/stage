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
                                    echo form_open_multipart('pages/form/'.$id, $attributes);
                                    echo "<p>";
							for($i = 1; $i <= $nb_champ; $i++){
								switch($form['type'.$i]){
									case"nom" :
									case"prenom" :
									case"adresse" :?>						
											<span class="wpcf7-form-control-wrap name">
												<input type="text"  name="<?php echo $form['type'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text " aria-invalid="false" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?>/>
											</span>
                                            <?php break;
                                                case"email" :?>
                                                	<span class="wpcf7-form-control-wrap email">
												 <input type="email" name="<?php echo $form['type'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> />
                                            </span>	
                                            <?php break;
                                                case"area" :?>
                                                <span class="wpcf7-form-control-wrap message">
												<textarea  name="<?php echo $form['type'.$i];?>" id="comment" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea"  aria-invalid="false" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?>></textarea>
                                            </span>
                                            <?php break;
                                            case"liste" :?>
                                            <span class="wpcf7-form-control-wrap name">
                                            <input type="hidden" name='nb_champ' value="<?php echo $form['champ'.$i];?>"/>
                                            <legend ><?php echo $liste['nom_champ']; ?></legend>
                                            <select name="<?php echo $form['type'.$i];?>" class="wpcf7-form-control wpcf7-text">
								<?php for( $a = 1; $a <= $nb_item; $a++){?>
								<option <?php if($a==1){echo "selected";} ?>><?php echo $liste['titreitem'.$a] ?></option>
								<?php } ?>
                                </select>
                                </span>
                                             <?php break;
                                                 case"nb" :?>
                                  	<span class="wpcf7-form-control-wrap name">
												<input type="text"  name="<?php echo $form['type'.$i];?>" value="" size="40" class="wpcf7-form-control wpcf7-text " aria-invalid="false" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?>/>
											</span>
                                            <?php break;
                                            case"file" :?>
                                            	<span class="wpcf7-form-control-wrap name">
                                            <label id='label_file' for='file'  size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" onBlur="confselectfile();" value=""><?php echo $form['champ'.$i]; ?></label>							
                                            <input id='file' name="<?php echo $form['type'.$i];?>" onChange="confselectfile(this.value);" style='display: none;' type="file">
                                            </span>
                                            <?php break;
                                            case"date" :?>
                                            <span class="wpcf7-form-control-wrap name">
                                                <label class="wpcf7-form-control wpcf7-text"> <?php echo $form['champ'.$i]; ?>                                             																																
                                            <input name="<?php echo $form['type'.$i];?>" type="date" value="" size="40" class="wpcf7-form-control wpcf7-text " aria-invalid="false" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> />
                                </label>
                                            </span>	
                                        <?php break;
                                            		}
                                                } ?>									
										
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
		</div>
    </div>
    <script>
function confselectfile(val){	
	document.getElementById('label_file').innerHTML = "fichier sélectionné :" + val;	
}
</script>