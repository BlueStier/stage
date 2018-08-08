<footer class="navbar-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; BlueStier 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://twitter.com/villedeoignies?lang=fr">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://fr-fr.facebook.com/VilleDeOignies/">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-envelope"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 js-scroll-trigger">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item ">
                <a href="#">Mentions Légales</a>
              </li>
              </ul>
          </div>
        </div>
      </div>
    </footer>
 <!-- Bootstrap core JavaScript -->
 <?php
   $array=[];
   $ville = "oignies";
   $cp=62590;
   $adresse = "avenue john kennedy";
   $ville_url = str_replace(' ', '+', $ville); // remplace espace par +
   $adresse_url = str_replace(' ', '+', $adresse); // remplace espace par +
   $MapCoordsUrl = urlencode($cp.'+'.$ville_url.'+'.$adresse_url); //url_encode : encodage pour URL

   $ville2 = "oignies";
   $cp2=62590;
   $adresse2 = "Place de la IVème République";
   $ville_url2 = str_replace(' ', '+', $ville2); // remplace espace par +
   $adresse_url2 = str_replace(' ', '+', $adresse2); // remplace espace par +
   $MapCoordsUrl2 = urlencode($cp2.'+'.$ville_url2.'+'.$adresse_url2); //url_encode : encodage pour URL

   $array[0]=$MapCoordsUrl;
   $array[1]=$MapCoordsUrl2;
   ?>
   
 <script src="<?php echo base_url();?>/assets/site/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/site/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>/assets/site/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url();?>/assets/site/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>/assets/site/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url();?>/assets/site/js/agency.min.js"></script>
        </body>
</html>