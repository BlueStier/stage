<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Google MAP</title>
<style type="text/css">
html, body{
  margin:0;
  padding:0;
  min-height:100%;
}
#div_carte{
  margin:auto;
  margin-top:2.0em;
  width:757px;
  height:757px;
  border:1px solid #808080;
}
</style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDi_lJupA7cM3dEQkfT3KF588oEFjviJ34"></script>
<script type="text/javascript">
 var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude,date_debut,date_fin,societe,commenditaire,contact;
 var data1= [];
  /* Fonction chargée de géolocaliser l'adresse */ 
 function geolocalise(){
  
   
  /* Récupération du champ "adresse" */ 
  addr = document.getElementById('adresse').value;
  /*concatenation pour passer en paramètre le cp et le nom de la ville*/
  var addr1 = addr.concat('62590 Oignies');
  /* Tentative de géocodage */ 
  geocoder.geocode( { 'address': addr1}, function(results, status) {    
   /* Si géolocalisation réussie */ 
   if (status == google.maps.GeocoderStatus.OK) {
    /* Récupération des coordonnées */ 
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();    
    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
    date_debut = document.getElementById('date_debut').value;
    date_fin = document.getElementById('date_fin').value;
    societe = document.getElementById('societe').value;
    commenditaire = document.getElementById('commenditaire').value;
    contact = document.getElementById('contact').value;
     }  
  });
  
 }
 
function initCarte(data) {
  var i, nb = data.length;
  var oMarker;
  var oMap = new google.maps.Map(document.getElementById('div_carte'),{
      'center': new google.maps.LatLng( 50.46, 2.99),
      'zoom': 14,
      'backgroundColor': '#fff',
      'mapTypeId': google.maps.MapTypeId.ROADMAP
    });
 
  for( i=0; i < nb; i++){    
    oMarker = new google.maps.Marker({
        'map' : oMap,
        'position': new google.maps.LatLng( data[i][0], data[i][1])
      });  
  }  
}

// init lorsque la page est chargée
google.maps.event.addDomListener(window, 'load', initCarte);
</script>
</head>
<body>
<?php echo validation_errors();
echo form_open('test/create'); 
?>
<h5>Adresse</h5>
<input type="text" id="adresse" name='adresse' onkeyup="geolocalise()" placeholder="saisissez votre adresse " /><br>
<input type="text" id="latitude" name="latitude" placeholder="latitude "/><br>
<input type="text" id="longitude" name="longitude" placeholder="longitude "/><br>
<input type="text" name="date_debut" placeholder="date de début des travaux "/><br>
<input type="text" name="date_fin" placeholder="date de fin des travaux estimée"/><br>
<input type="text"  name="societe" placeholder="travaux réalisés par : "/><br>
<input type="text"  name="commenditaire" placeholder="Travaux commandés par : "/><br>
<input type="text"  name="contact" placeholder="tel "/><br>
<input type="textarea"  name="commentaires" placeholder="commentaires "/><br>
<input type="submit"  value="Enregistrer en bdd" />
 </form>
 <?php echo $nom; ?> 
</body>
</html>