<div class="contact">
<div class="container">			
					
					<!-- Contact Form -->
					<div class="contact_form">
						<div class="contact_title"><?php echo $intro; var_dump($form);?></div>

						<div class="contact_form_container">
							<form action="post">
								<input  class="input_field " type="text" placeholder="Name" required="required" data-error="Name is required.">
								<input  class="input_field" type="text" placeholder="E-mail" required="required" data-error="Valid email is required."/>
								<textarea  class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                                <select class='select_field'>
                                  <option>1</option>  
                                </select>
                                <button type="submit" class="contact_send_btn trans_200" value="Submit">Envoyer</button>
                                
                            </form>
						</div>
</div>
</div>
<br>
</div>				