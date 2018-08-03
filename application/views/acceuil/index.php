<header class="masthead">
    <div class="accueil">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">
            L'Accueil
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      <?php
      foreach ($acceuil as $acceuil_item):
      if($acceuil_item['visible']){
        //affiche les données transmises par le controlleur
        ?>      
      <h2 class="section-heading text-uppercase"><?php echo $acceuil_item['titre']; ?></h2>
        <h3 class="section-subheading text-muted"><?php echo $acceuil_item['soustitre']; ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">
          <li>
            <div class="timeline-image"><img alt=""
                 class="rounded-circle img-fluid"
                 src="<?php echo base_url() . $acceuil_item['path_photo']; ?>"></div>
            <div class="timeline-panel">
              <div class="timeline-body">
                <p class="text-muted"><?php echo $acceuil_item['commentaires']; ?></p><br>
                <div class="timeline-heading">
                  <h4 class="subheading">Adresse :</h4>
                  <p class="text-muted"><?php echo $acceuil_item['adresse']; ?>
                  <strong class="fa fa-phone">&nbsp&nbsp<?php echo $acceuil_item['tel']; ?></strong><br>
                  <strong class="fa fa-fax">&nbsp&nbsp <?php echo $acceuil_item['fax']; ?></strong><br></p>
                  <h4 class="subheading">Horaires d’ouverture des services administratifs :</h4>
                  <p class="text-muted"><?php echo $acceuil_item['horaires']; ?></p>
                </div>
              </div>
            </div>
          </li>
        </ul>

      <?php }
     endforeach;?> 
      </div>
      </div>
      </div>