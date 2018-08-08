<header class="masthead">
    <div class="accueil">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">
            Seniors ????
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
  <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url()?>ressources/photo/CCAS.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>CCAS</h4>
              <p class="text-muted">Centre Communal d'Action Sociales</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url()?>ressources/photo/CCAS.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>CCAS</h4>
              <p class="text-muted">Association</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url()?>ressources/photo/Roseraie.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>La Roseraie</h4>
              <p class="text-muted">Foyer de personnes âgées non-médicalisé</p>
            </div>
          </div>
       <div class="col-md-6 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url()?>ressources/photo/Beguinage.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Le béguinage </h4>
              <p class="text-muted">Camille Delabre</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url()?>ressources/photo/ehpad.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>EHPAD</h4>
              <p class="text-muted">Stephane Kubiak</p>
            </div>
          </div>
        </div>
      </div>
    </section>