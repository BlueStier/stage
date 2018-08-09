<style type="text/css">

#div_carte{
  margin:auto;
  margin-top:2.0em;
  width:757px;
  height:757px;
  border:1px solid #808080;
}
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi_lJupA7cM3dEQkfT3KF588oEFjviJ34"></script>
<script type="text/javascript">
 var geocoder = new google.maps.Geocoder(); 
 var addr, latitude, longitude;
 var data= [];
 var tab = [];
 var contentString;
 /*Récupération des données via la bdd*/
 <?php
 foreach ($travaux as $travaux_item):
    $i=$travaux_item['id_travaux']-1;    
    echo "data[".$i."]=[".$travaux_item['latitude'].",".$travaux_item['longitude'].",".$travaux_item['adresse'].",".$travaux_item['commentaires'].","
    .$travaux_item['date_debut'].",".$travaux_item['date_fin'].",".$travaux_item['commenditaires'].",".$travaux_item['société'].",".$travaux_item['contact']."];";

 endforeach;?> 

 
function initCarte() {
  var i, nb = data.length;  
  
  //creation de la carte
  var oMap = new google.maps.Map(document.getElementById('div_carte'),{
      'center': new google.maps.LatLng( 50.46, 2.99),
      'zoom': 14,
      'backgroundColor': '#fff',
      'mapTypeId': google.maps.MapTypeId.ROADMAP
    });
 
 //creation des marqueurs 
  for( i=0; i < nb; i++){
      
      //creation du contenu de la fenetre d'info      
      contentString = '<h6 id="firstHeading" class="firstHeading">'+data[i][2]+'</h6>'+ 
      '<div id="bodyContent">'+data[i][3]+'</div><div>Du : '+data[i][4]+' au : '+data[i][5]+'</div><div>Travaux réalisés par : '+data[i][7]+'</div><div>Demandés par :' 
      +data[i][6]+'</div><div>Pour plus de renseignements : '+data[i][8]+'</div>';

        var oMarker = new google.maps.Marker({
        'map' : oMap,
        'position': new google.maps.LatLng( data[i][0], data[i][1]),
        /*'icon' : "<?php  //echo base_url()."assets/site/img/logos/Bulle.png"?>",*/
        'title':data[i][2],
        'html':contentString
           
      });     
      

        var infowindow = new google.maps.InfoWindow();
         
        google.maps.event.addListener(oMarker,'click', function() {
          infowindow.setContent(this.html);
          infowindow.open(oMap, this);
        });        
  }
 
}
// init lorsque la page est chargée
google.maps.event.addDomListener(window, 'load', initCarte);
</script>
</head>
<header class="masthead">
    <div class="accueil">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">
            Travaux en cours
          </div>
        </div>
      </div>
    </div>
    <form action="Search.php" method="post">
        <div class="row justify-content-md-center">        
          <div class="input-group col-lg-4">         
            <input class="form-control py-2"
                 id="example-search-input"
                 type="search"
                 placeholder="Rechercher">
                 <span class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>                 
          </div>          
        </div>
        </form> 
        <br>
        <br>
        <div class="row justify-content-md-center">
          <a class="btn btn-secondary btn-lg col-md-3" href="">Parents</a><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg col-md-3">Professionnels</button><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg col-md-3">Jeunes</button><div class="col-md-1"></div>
        </div>
        <br>
        <br>
        <div class="row justify-content-md-center">
        <a class="btn btn-secondary btn-lg col-md-3" href="<?php echo base_url();?>index.php/seniors/">Senior</a><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg col-md-3">test2</button><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg col-md-3">test3</button><div class="col-md-1"></div>
        </div>
      </div>
    </div>
  </header>

  <div id="div_carte"></div>