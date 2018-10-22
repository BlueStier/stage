<div class="contact">
<div class="container">			
					
					<!-- Contact Form -->
					<div class="contact_form">
						<div class="contact_title"><?php echo $intro; var_dump($liste);?></div>

						<div class="contact_form_container">
							<form action="post">
							<?php for($i = 1; $i <= $nb_champ; $i++){
								switch($form['type'.$i]){
									case"nom" :
									case"prenom" :
									case"adresse" :?>							
								<input  class="input_field " type="text" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> >
							<?php break;
									case"email" :?>							
								<input  class="input_field " type="email" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> >
							<?php break;
								case"area" :?>							
								<textarea  class="text_field" name="message" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?>></textarea>
							<?php break;
								case"liste" :
								echo $liste['nom_champ']."<br><br>";?>							
								<select class='select_field'>
								<?php for( $a = 1; $a <= $nb_item; $a++){?>
								<option><?php echo $liste['titreitem'.$a] ?></option>
								<?php } ?>
								</select>
							<?php break;
								case"nb" :?>							
								<input  class="input_field " type="number" placeholder="<?php echo $form['champ'.$i]; ?>" <?php if($form['ob'.$i]){echo 'required';}?> >
							<?php break;
								case"file" :?>
								<label id='label_file' onclick="confselectfile();" for='file' class='select_field' ><?php echo $form['champ'.$i]; ?></label>							
								<input id='file' style='' type="file">
							<?php break;															
								}
						 } ?>
								
                                <button type="submit"  class="contact_send_btn trans_200" value="Submit">Envoyer</button>
                                
                            </form>
						</div>
</div>
</div>
<br>
</div>
<script>
function confselectfile(){
	document.getElementById('label_file').innerHTML = "fichier sélectionné :" + document.getElementById('file').value;
}
</script>				