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
    <?php   
       //affiche tous les pays
foreach($type_contact as $t=>$page): 
  echo validation_errors(); 
  echo form_open('cms/excelCitoyen/'.$t);?>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Page du contact : <?php echo $page['type_contact']; ?></h3>              
            </div>
            </div>
    <div class="box-body table-responsive">    
              <table class=" display table table-bordered table-striped">
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
                  $nb_de_cit_dans_cette_table = 0;
    foreach($citoyen as $a=>$c):            
      if($c['type_contact']==$page['type_contact']){              
        
      ?><tr>
      <td><input type='checkbox' onClick='visible_les_boutons(<?php echo $t;?>);' id='<?php echo $t;?>citoyen<?php echo $nb_de_cit_dans_cette_table;?>' name="<?php echo $t;?>check[]" value="<?php echo $c['id_citoyen'];?>"/></td>
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
      $nb_de_cit_dans_cette_table++;}
    endforeach; ?>


</tbody>
<tfoot>
                <tr>
                <th><a id="tout_selectionner<?php echo $t; ?>" class='btn btn-primary' onClick='select(true,<?php echo $t; ?>,<?php echo $nb_de_cit_dans_cette_table; ?>);'>Tout selectionner</a>
                <a id="tout_deselectionner<?php echo $t; ?>" class='btn btn-primary' onClick='select(false,<?php echo $t; ?>,<?php echo $nb_de_cit_dans_cette_table; ?>);' style="display : none">Tout déselectionner</a></th>
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
<input type='hidden' id='nb_ligne<?php echo $t; ?>' value='<?php echo $nb_de_cit_dans_cette_table; ?>'/> 
</div>
<?php
$nb_de_cit_dans_cette_table = 0;
    foreach($citoyen as $cit):
      if($cit['type_contact']==$page['type_contact']){
      ?> <div id='<?php echo $cit['id_citoyen'];?>' style="display : none">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Message de <?php echo $cit['nom']." ".$cit['prenom']." du : ".$cit['envoi'];?> :</h3>              
            </div>
            </div>
      <?php if($cit['message']==''){
        echo '<strong>PAS DE MESSAGE</strong>';
        }else{
          echo $cit['message'];
          }?>
      </div>
      <?php } endforeach;
    ?>
    <div class="box-footer">
      <button id='supprimer<?php echo $t; ?>' class="btn btn-danger"
      data-toggle="modal" data-target="#modal-danger<?php echo $t; ?>" disabled = "true" onclick="recup_tab_a_sup(<?php echo $t; ?>);">Supprimer</button> 
      <button id='excel<?php echo $t; ?>' class="btn btn-info pull-right"
           type="submit" disabled = "disabled">Créer un fichier Excel</button>
           </form>
    </div>
    <!-- Modal pour la suppression d'un user -->
<div class="modal modal-danger fade" id="modal-danger<?php echo $t; ?>">
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
                      echo form_open('cms/deleteCitoyen/'.$t);?>
                      <div id='modal-footer<?php echo $t; ?>'>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onClick='vider_le_tab(<?php echo $t; ?>);'>Annuler</button>                
                <input type="hidde"  id="taille_liste<?php echo $t; ?>" name='taille_liste<?php echo $t; ?>' value='0'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->        
          </div>
    <?php endforeach; ?>    
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
  function voir_message(id){
    var id_a_modif =  (document.getElementById(id).style.display == "block") ? "none" : "block";  
    document.getElementById(id).style.display = id_a_modif;
  }
  
  function select(boolean,id,nb_de_cit){
      for(h = 0; h < nb_de_cit; h++ ){        
        (boolean) ? document.getElementById(id+"citoyen"+h).checked = true : document.getElementById(id+"citoyen"+h).checked = false;
      } 
      (boolean) ? document.getElementById('tout_selectionner'+id).style.display = 'none' : document.getElementById('tout_selectionner'+id).style.display = 'block';    
      (boolean) ? document.getElementById('tout_deselectionner'+id).style.display = 'block' : document.getElementById('tout_deselectionner'+id).style.display = 'none'; 
      visible_les_boutons(id);
  }
  function visible_les_boutons(id){
    nb_de_cit = parseInt(document.getElementById('nb_ligne'+id).value);
    var nb_de_cases_cochées = 0;       
    for(h = 0; h < nb_de_cit; h++ ){
      if(document.getElementById(id+"citoyen"+h).checked == true){
        ++nb_de_cases_cochées;        
      }        
    }
    if(nb_de_cases_cochées > 0){
      document.getElementById('supprimer'+id).disabled = false ;
      document.getElementById('excel'+id).disabled = false;      
    }else{
      document.getElementById('supprimer'+id).disabled = true ;
      document.getElementById('excel'+id).disabled = true;  
    }   
    
  }

  function recup_tab_a_sup(id_de_la_table){
    var nb_checkbox = parseInt(document.getElementById('nb_ligne'+id_de_la_table).value);
    var modal = document.getElementById("modal-footer"+id_de_la_table);
    var taille_liste = document.getElementById("taille_liste"+id_de_la_table).value;    
    for(s = 0; s < nb_checkbox; s++ ){
      if(document.getElementById(id_de_la_table+"citoyen"+s).checked == true){
        var input = document.createElement("input");
        input.setAttribute('type', 'hidde');
        input.setAttribute('id', taille_liste);
        input.setAttribute('name', id_de_la_table+'liste_a_supprimer_'+taille_liste);
        input.setAttribute('value', document.getElementById(id_de_la_table+"citoyen"+s).value);
        modal.appendChild(input);
        taille_liste++;
      }
    }
    document.getElementById("taille_liste"+id_de_la_table).value = taille_liste; 
  }

  function vider_le_tab(id_de_la_table){
    var taille_liste = document.getElementById("taille_liste").value;
    var modal = document.getElementById("modal-footer");
    for(r = 0; r < taille_liste; r++){      
      modal.removeChild(document.getElementById(r));
    }
    taille_liste = 0;
  }
  
</script>