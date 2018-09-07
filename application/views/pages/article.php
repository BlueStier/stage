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
.img-txt img.impression { float:right; width:200px; }
.img-txt div.texte { float:right; width:400px; }}

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
                        foreach($article_item as $article): ?>                        
          <article>         
          <div class="img-txt">                     
              <img alt="Paris"
                   id="text"
                   src="<?php echo base_url().$article['photo']?>"/>
                   <div class='texte'>  
              <h4><?php echo $article['titre']?></h4>
              <?php echo $article['text']?>
              </div>
              </div>                         
          </article>
          <br>
                    <?php endforeach; ?>
          <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="http://localhost/stage/assets/site/readmore.js/readmore.min.js"></script>
<script>
document.getElementById("text").style.width ='100px';
$('article').readmore({ speed : 1000, moreLink: '<a style="color : blue" href="#" onclick="expand(true)">En savoir plus</a>',lessLink: '<a style="color : blue" href="#" onclick="expand(false)">Réduire</a>', collapsedHeight: 100});

function expand(sens){
    (sens ? document.getElementById("text").style.width ='360px': document.getElementById("text").style.width ='100px');    
}
</script>
