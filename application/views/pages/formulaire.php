<div class="contact">
<div class="container">			
					
					<!-- Contact Form -->
					<div class="contact_form">
						<div class="contact_title"><?php echo $intro; ?></div>
						<?php if(isset($message)){echo $message;};?>
						<div class="contact_form_container">
							
							<?php  echo form_open_multipart('pages/form/'.$id);
							for($i = 1; $i <= $nb_champ; $i++){
								switch($form['type'.$i]){
									case"nom" :
									case"prenom" :
									case"adresse" :?>							
								<input name="<?php echo $form['type'.$i];?>" class="input_field " type="text" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> >
							<?php break;
									case"email" :?>							
								<input name="<?php echo $form['type'.$i];?>" class="input_field " type="email" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> >
							<?php break;
								case"area" :?>							
								<textarea name="<?php echo $form['type'.$i];?>" class="text_field" name="message" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?>></textarea>
							<?php break;
								case"liste" :?>
								<div class="row d-flex align-item">
								<input type="hidden" name='nb_champ' value="<?php echo $form['champ'.$i];?>"/>
								<span class="input_field col-sm-6" ><?php echo $liste['nom_champ']; ?></span>														
								<select name="<?php echo $form['type'.$i];?>" class='select_field col-sm-6' >
								<?php for( $a = 1; $a <= $nb_item; $a++){?>
								<option <?php if($a==1){echo "selected";} ?>><?php echo $liste['titreitem'.$a] ?></option>
								<?php } ?>
								</select>
								</div>
							<?php break;
								case"nb" :?>							
								<input name="<?php echo $form['type'.$i];?>" class="input_field " type="number" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> >
							<?php break;
								case"file" :?>
								<label id='label_file'  for='file' class='select_field' onBlur="confselectfile();" ><?php echo $form['champ'.$i]; ?></label>							
								<input id='file' name="<?php echo $form['type'.$i];?>" onChange="confselectfile(this.value);" style='display: none;' type="file">
							<?php break;
								case"date" :?>
								<div class="row d-flex align-item">
								<div class="input_field col-sm-6"><?php echo $form['champ'.$i]; ?></div>																																
								<input name="<?php echo $form['type'.$i];?>" class="input_field col-sm-6" type="date" <?php if($form['ob'.$i]){echo 'required';}?> >
								</div>	
							<?php break;															
								}
						 } ?>
								<input type ='hidden' name='page' value="<?php echo $page; ?>"/>
                                <button type="submit" class="contact_send_btn trans_200" value="Submit">Envoyer</button>
                                
                            </form>
						</div>
</div>
</div>
<br>
</div>
<script>
function confselectfile(val){	
	document.getElementById('label_file').innerHTML = "fichier sélectionné :" + val;	
}
</script>
				