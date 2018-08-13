
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
        
        <button aria-controls="navbarResponsive"
           aria-expanded="false"
           aria-label="navbarSupportedContent" 
           class="btn btn-secondary btn-lg "
           data-target="#menu_rapide"
           data-toggle="collapse"
           type="button">Menu rapide</button>
           <div class="collapse navbar-collapse"
           id="menu_rapide"><br><br>
      <ul class="navbar-nav mr-auto">
        <div class="row justify-content-md-center">
        <li class="nav-item">
          <a class="btn btn-secondary btn-lg " href="">Parents</a>
</li>  
        <div class="col-md-1"></div>
        <li class="nav-item">
          <button class="btn btn-secondary btn-lg ">Professionnels</button></li><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg ">Jeunes</button><div class="col-md-1"></div>
        </div>
        <br>
        <br>
        <div class="row justify-content-md-center">
        <a class="btn btn-secondary btn-lg col-md-3" href="<?php echo base_url();?>index.php/seniors/">Senior</a><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg col-md-3">test2</button><div class="col-md-1"></div>
          <button class="btn btn-secondary btn-lg col-md-3">test3</button><div class="col-md-1"></div>
        </div>
</ul>
      </div>
    </div>
</div>
   </header>
   
  
    
 