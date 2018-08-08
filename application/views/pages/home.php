
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">
          Bienvenue sur le nouveau site de la ville de Oignies !
        </div>
        <div class="intro-heading text-uppercase">
          Oignies : Dynamique avec vous
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
   
  
   <body onload="initialize()" ><div id="map" style="height:90%;top:30px"></div></body> 
 