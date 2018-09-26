<style>
img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 1px;
    vertical-align: top; 
    
} 
.img-txt { 
   display:inline-block; clear:both;
   margin:1% auto; /* c'est ce AUTO qui va centrer le groupe image+texte */ 
   overflow:hidden; /* important ici */
}
.img-txt img.impression { float:left; width:200px; }
.img-txt div.titre { float:left; width:auto; }
.img-txt div.texte p { float:right; width:auto; }

</style>
  <div class="container">    
      <div class="text-center">      
        <?php    
                      echo $intro;
                      foreach($article_item as $article):                        
                      endforeach;
                      ?>
 </div>    
     
          <?php    
                        foreach($article_item as $article): 
                        if($article['visible']){?>                        
          <article>
          <div id="<?php echo $article['titre']?>">         
          <div class="img-txt">                     
              <img class="impression"alt="Paris"
                    src="<?php echo base_url().$article['photo']?>"/>                   
                   <div class='titre'>  
              <h4 class="center"><?php echo $article['titre']?></h4>
              <?php echo $article['jour']?></div>
              <br>
              <br>
              <br>
              <div class='texte'>
              <?php echo $article['text']?>           
              </div>
              </div> 
              </div>                        
          </article>
          <br>
          
                    <?php
                  } 
                  endforeach; ?>
          <br>
          </div>
        </div>
      </div>
    </div>
    </div> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="http://localhost/stage/assets/site/readmore.js/readmore.min.js"></script>
<script>
$('article').readmore({ speed : 1000, moreLink: '<a style="color : blue" href="#" >En savoir plus</a>',lessLink: '<a style="color : blue" href="#" onclick="expand(false)">Réduire</a>', collapsedHeight: 200});

</script>
