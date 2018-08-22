<script>
var recep;
function allowDrop(ev) {  
    ev.preventDefault();
}

function drag(ev) {
  //récupération de l'id que l'on déplace    
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    //récupération de la cible
    sousmenu = ev.currentTarget.innerHTML;
    recep = ev.currentTarget.id;
    var id = ev.dataTransfer.getData("text");
    //récupération du csrf codeigniter pour la sécurité
    var csrf = "<?php echo $this->security->get_csrf_hash(); ?>";    
    //Méthode post via ajax et envoie des données au controlleur
    $.ajax({
       url : '<?php echo base_url();?>index.php/cms/dragNdrop', // La ressource ciblée
       type :'POST',
       dataType: "json",     
       data : {'id': id,
              'menu': recep,
              'sousmenu':sousmenu,
        '<?php echo $this->security->get_csrf_token_name(); ?>': csrf
      },
       
       success: function(){
         //recharge la page quand le changement est fait         
        //window.location.reload();
        }, 
      error: function(){
        //changement hs
        alert('modification impossible');
               }
    });
    
}
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Menus
        <small>Gestion des menus et sous menus</small>
      </h2>
      <ol class="breadcrumb">
        <li><a  href="#"><i class="fa fa-dashboard"></i> Apparence</a></li>
        <li class="active">Menus</li>
      </ol>      
    </section>

<section class="content-header">
      <h1>        
        Menu principal :
      </h1> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="#"><i class="fa fa-plus"></i> Ajouter un menu</a></li>
    </ol>           
    </section>
    <br>    
    <section class="content">      
      <div class="row">
<?php
$tailleMenu = sizeof($header_item)-1;
//pour chaque menu de la bdd
foreach($header_item as $key=>$header):
      
?>
      <div class="col-md-4">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
              <h3 ><?php /* affiche le nom du menu */ echo $header['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
              <div class="row">
              <?php //si l'ordre est different de 1 on affiche le bouton à gauche
                if($key != 0) {?>
              <div class="col-md-1">
              <?php //récupération de l'id du menu et appel de la fonction qui modifie l'ordre en moins 
              echo validation_errors(); 
                      echo form_open('cms/ordre/1/1');?>
                      <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
              <button type="submit" class="btn btn-primary" href="#"><i class="fa fa-caret-square-o-left"></i></button>
              </form>
              </div><?php
                }
              ?>
              <div class="col-md-4">
              <button type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button>
              </div>
              <div class="col-md-4">              
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $header['id_menu'] ?>"><i class="fa  fa-warning"></i> Supprimer</button>
              </div>
              <?php //si l'ordre est different de la taille du foreach-1 on affiche le bouton à droite
                if($key != $tailleMenu) {?>
              <div class="col-md-1">
              <?php //récupération de l'id du menu et appel de la fonction qui modifie l'ordre en plus 
              echo validation_errors(); 
                      echo form_open('cms/ordre/0/1');?>
                      <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
              <button type="submit" class="btn btn-primary" href="#"><i class="fa fa-caret-square-o-right"></i></button>
              </form>
              </div>
              <?php
                }
              ?>              
              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Modal pour la suppression d'un menu -->
        <div class="modal modal-danger fade" id="modal-danger<?php echo $header['id_menu'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $header['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/delete/1');?>
                      <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        
    </div><?php 
   
endforeach;
?>
</div>
</section>
<section class="content-header">
      <h3>        
        Sous-menus :
      </h3> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="#"><i class="fa fa-plus"></i> Ajouter un sous-menu</a></li>
    </ol>           
    </section>
    <br>
    <section class="content">     
      
<?php
foreach($header_item as $header):
  $tabRecup=[];?>
    <h4 id="<?php /* affiche le nom du menu */ echo $header['nom'] ?>" ondrop="drop(event)" ondragover="allowDrop(event)" class="box-title"><?php echo $header['nom'] ?></h4>
    <div class="row"><?php
//pour chaque sous menu de la bdd
    foreach($sub_item as $i =>$sub):
        $compare = strcmp($sub['menu'],$header['nom']);        
        if($compare == 0){
          $tabRecup[]=$sub;
        } 
      endforeach;
      $tailleSmenu = sizeof($tabRecup)-1;
      foreach($tabRecup as $k=>$tab): ?>
    <div class="col-md-4">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
              <h3 id="<?php echo $tab['id_sousmenu'] //donne id du sous menu et concatene 'sousmenu' pour le drag'n'drop ?>sousmenu" draggable="true" ondragstart="drag(event)" class="box-title"><?php /* affiche le nom du menu */ echo $tab['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
              <div class="row">
              <?php //si l'ordre est different de 1 on affiche le bouton à gauche
                if($k != 0) {?>
              <div class="col-md-1">
              <?php //récupération de l'id du sousmenu et appel de la fonction qui modifie l'ordre en moins 
              echo validation_errors(); 
                      echo form_open('cms/ordre/1/2');?>
                      <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>
              <button type="submit" class="btn btn-primary" href="#"><i class="fa fa-caret-square-o-left"></i></button>
              </form>
              </div><?php
                }
              ?>
              <div class="col-md-4">
              <a type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</a>
              </div>
              <div class="col-md-4">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $tab['id_sousmenu']+50 ?>"><i class="fa  fa-warning"></i> Supprimer</button>
              </div>
              <?php //si l'ordre est different de la taille du tabRecup on affiche le bouton à droite
              if($k != $tailleSmenu) {
                ?>
              <div class="col-md-1">
              <?php //récupération de l'id du sousmenu et appel de la fonction qui modifie l'ordre en plus 
              echo validation_errors(); 
                      echo form_open('cms/ordre/0/2');?>
                      <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>
              <button type="submit" class="btn btn-primary" href="#"><i class="fa fa-caret-square-o-right"></i></button>
              </form>
              </div>
              <?php
                }
              ?>
              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- Modal pour la suppression d'un sousmenu -->
         <div class="modal modal-danger fade" id="modal-danger<?php echo $tab['id_sousmenu']+50 ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $tab['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/delete/2');?>
                      <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          </div>   
    
        <?php          
        endforeach;
    ?></div><?php   
endforeach;
?>

</section>
<section class="content-header">
      <h3>        
        Sous-menus de 3ème niveau :
      </h3> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="#"><i class="fa fa-plus"></i> Ajouter un 3ème niveau</a></li>
    </ol>           
    </section>
    <br>
    <section class="content">      
      
<?php
foreach($header_item as $header):
  //on affiche le menu
    ?>
    <h4>Menu :&nbsp <?php echo $header['nom'] ?></h4>
    <?php 
     foreach($sub_item as $sub):
      //si le sous menu fait parti du menu on l'affiche
      $compare = strcmp($sub['menu'],$header['nom']);
      if($compare==0){
      ?>
      <h5 id="<?php /* affiche le nom du sousmenu */ echo $sub['nom'] ?>" ondrop="drop(event)" ondragover="allowDrop(event)" class="box-title"><small>>> <?php echo $header['nom'] ?> :&nbsp <?php echo $sub['nom'] ?></small></h5>
    <div class="row"><?php
    $tabRecup2=[]; 
    //si le 3eme niveau est bien dans le sous menu qui est dans le menu on affiche
        foreach($third_item as $thi):            
            $compare2 = strcmp($thi['menu'],$header['nom']);
            $compare3 = strcmp($thi['sousmenu'],$sub['nom']);            
            if($compare2 == 0 && $compare3 == 0){
              $tabRecup2[]=$thi;
            }          
          endforeach;
          $tailleSmenu2 = sizeof($tabRecup2)-1;
          foreach($tabRecup2 as $k=>$tab):            
              ?>
<div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
              <h3 id="<?php echo $tab['id_third'] //donne id du 3eme niveau pour le drag'n'drop ?>" draggable="true" ondragstart="drag(event)" class="box-title"><?php /* affiche le nom du menu */ echo $tab['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
              <div class="row">
              <?php //si l'ordre est different de 1 on affiche le bouton à gauche
                if($k != 0) {?>
              <div class="col-md-1">
              <?php //récupération de l'id du 3eme niveau et appel de la fonction qui modifie l'ordre en moins 
              echo validation_errors(); 
                      echo form_open('cms/ordre/1/3');?>
                      <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>
              <button type="submit" class="btn btn-primary" href="#"><i class="fa fa-caret-square-o-left"></i></button>
              </form>
              </div><?php
                }
                ?>
              <div class="col-md-4">
              <a type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</a>
              </div>
              <div class="col-md-4">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $tab['id_third']+125 ?>"><i class="fa  fa-warning"></i> Supprimer</button>
              </div>
              <?php //si l'ordre est different de la taille du tabRecup2 on affiche le bouton à droite
              if($k != $tailleSmenu2) {
                ?>
              <div class="col-md-1">
              <?php //récupération de l'id du 3eme niveau et appel de la fonction qui modifie l'ordre en plus 
              echo validation_errors(); 
                      echo form_open('cms/ordre/0/3');?>
                      <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>
              <button type="submit" class="btn btn-primary" href="#"><i class="fa fa-caret-square-o-right"></i></button>
              </form>
              </div>
              <?php
                }
              ?>
              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
              <!-- Modal pour la suppression d'un 3eme niveau -->
              <div class="modal modal-danger fade" id="modal-danger<?php echo $tab['id_third']+125 ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $tab['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/delete/3');?>
                      <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          </div> 
           
            <?php 
 endforeach;
?></div><?php
      } endforeach;
endforeach;
?>
</section>
<div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de <?php echo $_SESSION['sup'] ?> sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-outline">Confirmer la suppression</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
<!-- ./wrapper -->
