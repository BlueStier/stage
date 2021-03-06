<script>
 //script concernant le drag'n'drop 
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
        window.location.reload();
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
        <li><i class="glyphicon glyphicon-th"></i> Apparence</li>
        <li class="active">Menus</li>
      </ol>      
    </section>

<section class="content-header">
      <h1>        
        Menu principal :

      </h1> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="<?php echo base_url()?>cms/createMenu/1"><i class="fa fa-plus"></i> Ajouter un menu</a></li>
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
            <div class="box-header with-border" style="background-color:<?php /* affiche la couleur du menu */ echo $header['couleur'] ?>">
            <div class="row justify-content-md-center">
            <?php //si l'ordre est different de 1 on affiche le bouton à gauche            
                if($key != 0) {
                  //récupération de l'id du menu et appel de la fonction qui modifie l'ordre en moins
                  echo validation_errors(); 
                  echo form_open('cms/ordre/1/1'); 
              ?>
              <div class='col-md-4'>
              <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Déplacer vers la gauche"><i class="fa  fa-arrow-circle-left"></i></button></form></div>           
            <?php
                }
              ?>
              <div class='col-md-4'>
                <?php //si le menu est visible sur le site on affiche l'oeil et récupère l'id à modif  
                if($header['visible']){
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/1');
                ?>
                <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre invisible"><i class="fa fa-eye"></i></button></form></div>
                <?php
                //sinon on affiche l'oeil barré et récupère l'id à modif
                }else{
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/1');
                ?>
                <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre visible"><i class="fa fa-eye-slash"></i></button></form></div>
                <?php
                }
                
                //si l'ordre est different de la taille du foreach-1 on affiche le bouton à droite
                if($key != $tailleMenu) {
                  echo validation_errors(); 
                  echo form_open('cms/ordre/0/1');?>
                  <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>  
            <div class='col-md-4'>
            <button type="submit" class="btn btn-primary" title="Déplacer vers la droite"><i class="fa  fa-arrow-circle-right"></i></button></form></div>           
            <?php
                }
              ?>
              </div>
              
              <h3 ><?php /* affiche le nom du menu */ echo $header['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">                  
            <?php  echo validation_errors(); 
                  echo form_open('cms/updateMenu/1');?>
              <input type="hidden" name = 'menuUpdate' value='<?php echo $header['nom'] ?>'>
              <button type="submit" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button> 
              <button type="button" class="marge btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $header['id_menu'] ?>"><i class="fa  fa-warning"></i> Supprimer</button></form>         
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
        <li><a type="button" class="btn btn-success" href="<?php echo base_url()?>cms/createMenu/2"><i class="fa fa-plus"></i> Ajouter un sous-menu</a></li>
    </ol>           
    </section>
    <br>
    <section class="content">     
      
<?php
foreach($header_item as $header):
  $tabRecup=[];
  $tabNoClass=[];?>
    <h4 id="<?php /* affiche le nom du menu */ echo $header['nom'] ?>" ondrop="drop(event)" ondragover="allowDrop(event)" class="box-title"><?php echo $header['nom'] ?></h4>
    <div class="row"><?php
//pour chaque sous menu de la bdd
    foreach($sub_item as $i =>$sub):
        $compare = strcmp($sub['menu'],$header['nom']);        
        if($compare == 0){
          //récupère les sousmenu classé par menu
          $tabRecup[] = $sub;
        }if(strcmp($sub['menu'],'sans') == 0){
          //si le sous menu n'est pas affilié dans un menu
          $tabNoClass[] = $sub;
        } 
      endforeach;
      //on récupère la taille du tabRecup et on affiche les sousmenus classé par menu d'affiliation      
      $tailleSmenu = sizeof($tabRecup)-1;
      foreach($tabRecup as $k=>$tab):?>
    <div class="col-md-4">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
            <div class="row justify-content-md-center">
            <?php //si l'ordre est different de 1 on affiche le bouton à gauche            
                if($k != 0) {
                  //récupération de l'id du sousmenu et appel de la fonction qui modifie l'ordre en moins
                  echo validation_errors(); 
                  echo form_open('cms/ordre/1/2'); 
              ?>
              <div class='col-md-4'>
              <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Monter dans le menu"><i class="fa  fa-arrow-circle-left"></i></button></form></div>           
            <?php
                }
              ?>
              <div class='col-md-4'>
                <?php //si le menu est visible sur le site on affiche l'oeil 
                if($tab['visible']){
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/2');
                ?>
                <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre invisible sur le site"><i class="fa fa-eye"></i></button></div>
                <?php
                //sinon on affiche l'oeil barré
                }else{
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/2');
                ?>
                <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre visible sur le site"><i class="fa fa-eye-slash"></i></button></form></div>
                <?php
                }
                
                //si l'ordre est different de la taille du tabRecup on affiche le bouton à droite
                if($k != $tailleSmenu) {
                  echo validation_errors(); 
                  echo form_open('cms/ordre/0/2');?>
                  <input type="hidden" name="idmenu" value='<?php echo $tab['id_sousmenu'] ?>'/>  
            <div class='col-md-4'>
            <button type="submit" class="btn btn-primary" title="Déscendre dans le menu"><i class="fa  fa-arrow-circle-right"></i></button></form></div>           
            <?php
                }
              ?>
              </div><br>
              <h3 id="<?php echo $tab['id_sousmenu'] //donne id du sous menu et concatene 'sousmenu' pour le drag'n'drop ?>sousmenu" draggable="true" ondragstart="drag(event)" class="box-title"><?php /* affiche le nom du menu */ echo $tab['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php  echo validation_errors(); 
                  echo form_open('cms/updateMenu/2');?>
                  <input type="hidde" name = 'menuUpdate' value='<?php echo $tab['nom'] ?>'>      
              <button type="submit" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button>              
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $tab['id_sousmenu']+50 ?>"><i class="fa  fa-warning"></i> Supprimer</button></form>            
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
    ?></div>        
    <?php   
endforeach;
//on affiche les sousmenus n'étant pas affilié à un menu
?>
<h4 id="sans" ondrop="drop(event)" ondragover="allowDrop(event)" class="box-title">Sans menu défini</h4>
<div class="row">
<?php 
foreach($tabNoClass as $c=>$tab):?>   
  <div class="col-md-4">
  <div class="box box-default collapsed-box">
    <div class="box-header with-border" >
    <div class="row justify-content-md-center">
    </div><br>
              <h3 id="<?php echo $tab['id_sousmenu'] //donne id du sous menu et concatene 'sousmenu' pour le drag'n'drop ?>sousmenu" draggable="true" ondragstart="drag(event)" class="box-title"><?php /* affiche le nom du menu */ echo $tab['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">      
            <?php  echo validation_errors(); 
                  echo form_open('cms/updateMenu/2');?>
                  <input type="hidden" name = 'menuUpdate' value='<?php echo $tab['nom'] ?>'>      
              <button type="submit" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button>              
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $tab['id_sousmenu']+50 ?>"><i class="fa  fa-warning"></i> Supprimer</button></form>            
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
?>
</section>
<section class="content-header">
      <h3>        
        Sous-menus de 3ème niveau :
      </h3> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="<?php echo base_url()?>cms/createMenu/3"><i class="fa fa-plus"></i> Ajouter un 3ème niveau</a></li>
    </ol>           
    </section>
    <br>
    <section class="content">      
      
<?php
$noClass=[];
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
            <div class="row justify-content-md-center">
            <?php //si l'ordre est different de 1 on affiche le bouton à gauche            
                if($k != 0) {
                  //récupération de l'id du 3eme niveau et appel de la fonction qui modifie l'ordre en moins
                  echo validation_errors(); 
                  echo form_open('cms/ordre/1/3'); 
              ?>
              <div class='col-md-4'>
              <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Monter dans le menu"><i class="fa  fa-arrow-circle-left"></i></button></form></div>           
            <?php
                }
              ?>
              <div class='col-md-4'>
                <?php //si le 3eme niveau est visible sur le site on affiche l'oeil 
                if($tab['visible']){
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/3');
                ?>
                <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>
            <button type="submit"  class="btn btn-primary" title="Rendre invisible sur le site"><i class="fa fa-eye"></i></button></form></div>
                <?php
                //sinon on affiche l'oeil barré
                }else{
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/3');
                ?>
                <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre visible sur le site"><i class="fa fa-eye-slash"></i></button></form></div>
                <?php
                }
                
                //si l'ordre est different de la taille du tabRecup on affiche le bouton à droite
                if($k != $tailleSmenu2) {
                  echo validation_errors(); 
                  echo form_open('cms/ordre/0/3');?>
                  <input type="hidden" name="idmenu" value='<?php echo $tab['id_third'] ?>'/>  
            <div class='col-md-4'>
            <button type="submit" class="btn btn-primary" title="Déscendre dans le menu"><i class="fa  fa-arrow-circle-right"></i></button></form></div>           
            <?php
                }
              ?>
              </div><br>
              <h3 id="<?php echo $tab['id_third'] //donne id du 3eme niveau pour le drag'n'drop ?>" draggable="true" ondragstart="drag(event)" class="box-title"><?php /* affiche le nom du menu */ echo $tab['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">         
              <?php  echo validation_errors(); 
                  echo form_open('cms/updateMenu/3');?>
                  <input type="hidden" name = 'menuUpdate' value='<?php echo $tab['nom'] ?>'>
              <button type="submit" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button>              
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $tab['id_third']+125 ?>"><i class="fa  fa-warning"></i> Supprimer</button></form>              
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
<h4 id="sans" ondrop="drop(event)" ondragover="allowDrop(event)" class="box-title">Sans sous-menu défini</h4>
<div class="row">
<?php 
foreach($third_item as $thi):
  //on vérifie si le 3eme niveau n'est pas affilié à un sous-menu
  $comp = strcmp($thi['sousmenu'],'sans');
  if($comp == 0){
  ?>

  <div class="col-md-4">
  <div class="box box-default collapsed-box">
    <div class="box-header with-border" >
    <div class="row justify-content-md-center">
    </div><br>
              <h3 id="<?php echo $thi['id_third'] //donne id du sous menu et concatene 'sousmenu' pour le drag'n'drop ?>" draggable="true" ondragstart="drag(event)" class="box-title"><?php /* affiche le nom du 3eme niveau */ echo $thi['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php  echo validation_errors(); 
                  echo form_open('cms/updateMenu/3');?>
                  <input type="hidden" name = 'menuUpdate' value='<?php echo $tab['nom'] ?>'>      
              <button type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button>              
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $thi['id_third']+125 ?>"><i class="fa  fa-warning"></i> Supprimer</button></form>            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- Modal pour la suppression d'un sousmenu -->
         <div class="modal modal-danger fade" id="modal-danger<?php echo $thi['id_third']+125 ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $thi['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/delete/3');?>
                      <input type="hidden" name="idmenu" value='<?php echo $thi['id_third'] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          </div>   
      
    <?php
  }
endforeach;
?>
</section>

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
