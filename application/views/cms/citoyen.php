<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
      Base de données de citoyens       
      </h2>
      <ol class="breadcrumb">
        <li><i class="fa fa-table "></i> BDD citoyenne</li>
    </ol>      
    </section>
    <div class="box-body">    
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Selectionner</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Date de naissance</th>
                  <th>Adresse</th>
                  <th>Téléphone</th>
                  <th>Mail</th>                  
                  <th>Date d'envoi</th>                  
                  <th>Service</th>
                  <th>Fichier joint</th>
                  <th>Voir le message</th>
                </tr>
                </thead>
                <tbody>
                  
                  <?php
    foreach($citoyen as $a=>$c):
      ?><tr>
      <td><input type='checkbox' onClick='visible_les_boutons();' id='citoyen<?php echo $a;?>' name="check[]" value="<?php echo $c['id_citoyen'];?>"/></td>
      <td><?php echo $c['nom']; ?></td>
      <td><?php echo $c['prenom']; ?></td>
      <td><?php echo $c['date']; ?></td>
      <td><?php echo $c['adresse']; ?></td>
      <td><?php echo $c['tel']; ?></td>
      <td><?php echo $c['email']; ?></td>
      <td><?php echo $c['envoi']; ?></td>
      <td><?php echo $c['service']; ?></td>
      <td><?php echo $c['file']; ?></td>
      <td><input type='button' onClick='voir_message("<?php echo $c['id_citoyen']; ?>");' value='Voir' class='btn btn-default'/></td>
      </tr>
      <?php
    endforeach; ?>


</tbody>
<tfoot>
                <tr>
                <th><button id="tout_selectionner" class='btn btn-primary' onClick='select(true);'>Tout selectionner</button>
                <button id="tout_deselectionner" class='btn btn-primary' onClick='select(false);' style="display : none">Tout déselectionner</button></th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Date de naissance</th>
                  <th>Adresse</th>
                  <th>Téléphone</th>
                  <th>Mail</th>                  
                  <th>Date d'envoi</th>
                  <th>Service</th>
                  <th>Fichier joint</th>
                  <th>Voir le message</th>
                </tr>
                </tfoot> 
</table> 
</div>
<?php
    foreach($citoyen as $cit):
      ?> <div id='<?php echo $cit['id_citoyen'];?>' style="display : none">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Message de <?php echo $cit['nom']." ".$cit['prenom']." du : ".$cit['envoi'];?> :</h3>              
            </div>
            </div>
      <?php echo $cit['message'];?>
      </div>
      <?php endforeach;
    ?>
    <div class="box-footer">
      <button id='supprimer' class="btn btn-danger"
      data-toggle="modal" data-target="#modal-danger" disabled = "true" onclick="recup_tab_a_sup();">Supprimer</button> <button id='excel' class="btn btn-info pull-right"
           type="submit" disabled = "disabled">Créer un fichier Excel</button>
    </div>    
</div>
<!-- Modal pour la suppression d'un user -->
<div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression sera définitive </p>
                <p>Confirmez-vous la suppression ? </p>
              </div>
              <div class="modal-footer" >
              <?php echo validation_errors(); 
                      echo form_open('cms/deleteCitoyen/');?>
                      <div id='modal-footer'>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onClick='vider_le_tab();'>Annuler</button>                
                <input type="hidden"  id="taille_liste" name='taille_liste' value='0'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->        
          </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>

  
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
  <script>
  var nb_checkbox = <?php echo sizeof($citoyen); ?>;
  function voir_message(id){
    var id_a_modif =  (document.getElementById(id).style.display == "block") ? "none" : "block";  
    document.getElementById(id).style.display = id_a_modif;
  }
  
  function select(boolean){ 
      for(h = 0; h < nb_checkbox; h++ ){        
        (boolean) ? document.getElementById("citoyen"+h).checked = true : document.getElementById("citoyen"+h).checked = false;
      } 
      (boolean) ? document.getElementById('tout_selectionner').style.display = 'none' : document.getElementById('tout_selectionner').style.display = 'block';    
      (boolean) ? document.getElementById('tout_deselectionner').style.display = 'block' : document.getElementById('tout_deselectionner').style.display = 'none'; 
      visible_les_boutons();
  }
  function visible_les_boutons(){    
    var supprimer_ou_pas = (document.getElementById('supprimer').disabled == true) ? false : true;
    document.getElementById('supprimer').disabled = supprimer_ou_pas;
    var excel_ou_pas = (document.getElementById('excel').disabled == true) ? false : true;
    document.getElementById('excel').disabled = excel_ou_pas;
  }

  function recup_tab_a_sup(){
    var modal = document.getElementById("modal-footer");
    var taille_liste = document.getElementById("taille_liste").value;    
    for(s = 0; s < nb_checkbox; s++ ){
      if(document.getElementById("citoyen"+s).checked == true){
        var input = document.createElement("input");
        input.setAttribute('type', 'hidden');
        input.setAttribute('id', taille_liste);
        input.setAttribute('name', 'liste_a_supprimer_'+taille_liste);
        input.setAttribute('value', document.getElementById("citoyen"+s).value);
        modal.appendChild(input);
        taille_liste++;
      }
    }
    document.getElementById("taille_liste").value = taille_liste; 
  }

  function vider_le_tab(){
    var taille_liste = document.getElementById("taille_liste").value;
    var modal = document.getElementById("modal-footer");
    for(r = 0; r < taille_liste; r++){      
      modal.removeChild(document.getElementById(r));
    }
    taille_liste = 0;
  }
  
</script>