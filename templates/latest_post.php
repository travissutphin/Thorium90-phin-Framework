    <!-- Latest post-->
    <section class="bg-white pb-5">
      <div class="container-fluid px-0 pnb-4">
        <div class="row align-items-center">

		  <?php while($row_latest_blog = mysqli_fetch_array($latest_blog)) { ?>		  
		  <div class="col-lg-6 mx-auto text-center">
            <ul class="list-inline">
              <li class="list-inline-item mx-3"><a class="category-link fw-normal" href="<?php echo $row_latest_blog['bcalias']; ?>"><?php echo $row_latest_blog['category']; ?></a></li>
              <!---<li class="list-inline-item mx-3"><a class="meta-link fw-normal" href="#!">Cathy</a></li>
              <li class="list-inline-item mx-3"><a class="meta-link fw-normal" href="#!"><?php //echo format_Dates_Times($row_latest_blog['created_at'],$format='full'); ?></a></li>--->
            </ul>
            <h1 class="mb-4"> <a class="reset-anchor" href="<?php echo $row_latest_blog['alias']; ?>"><?php echo $row_latest_blog['title']; ?></a></h1>
            <p class="text-muted"><?php echo $row_latest_blog['content_intro']; ?></p><a class="btn btn-link p-0 read-more-btn" href="<?php echo $row_latest_blog['alias']; ?>"><span>Read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
          </div> 

        </div>


<div class="row align-items-center">		
				  <div class="col-lg-4">&nbsp;</div>
		  <div class="col-lg-4">
			<div class="post-thumbnail"><img class="img-fluid" src="assets/images_blog/<?php echo $row_latest_blog['image_primary']; ?>" alt="<?php echo $row_latest_blog['title']; ?>" title="<?php echo $row_latest_blog['title']; ?>"></div>
          </div>
          <div class="col-lg-4">&nbsp;</div>
		</div>
		
		  <?php } ?>
      </div>
    </section>