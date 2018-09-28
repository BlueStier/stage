<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1><?php echo $title ?></h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">

			  <?php
    $a = 1;     
      foreach ($bulle_item as $bulle):
        //récupère le nombre de bulle à mettre sur la page
        $nbOfTx = 0;
        for($i = 1; $i <= 10; $i++){
            if(! empty($bulle['tx'.$i])){
                $nbOfTx ++;
            }
        }  ?>	
				<!-- Popular Course Item -->
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/course_1.jpg" alt="https://unsplash.com/@kellybrito">
						<div class="card-body text-center">
							<div class="card-title"><a href="courses.html">A complete guide to design</a></div>
							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
							</div>
							<div class="course_author_name">Michael Smith, <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
						</div>
					</div>
				</div>

			 <?php       
      endforeach; ?>
			</div>
		</div>		
	</div>