<?php
	include('html_start.php');
	include('header.php');
?>
	<style>
	#profile-grid { overflow: auto; white-space: normal; }
#profile-grid .profile { padding-bottom: 40px; }
#profile-grid .panel { padding: 0 }
#profile-grid .panel-body { padding: 15px }
#profile-grid .profile-name { font-weight: bold; }
#profile-grid .thumbnail {margin-bottom:6px;}
#profile-grid .panel-thumbnail { overflow: hidden; }
#profile-grid .img-rounded { border-radius: 4px 4px 0 0;}
	</style>
  <section class="py-1">
      <div class="container py-4">
        <div class="row text-center">
		  
		  <?php while($row = mysqli_fetch_array($display_post)) { ?>
		  <div class="col-lg-12 mx-auto"><a class="category-link mb-3 d-inline-block" href="<?php echo $row['bcalias']; ?>"><?php echo $row['category']; ?></a>
            <h1><?php echo $row['title'];?></h1>
            <ul class="list-inline mb-1">
              <li class="list-inline-item mx-2"><a class="text-uppercase text-muted reset-anchor" href="#!">Travis Sutphin</a></li>
              <li class="list-inline-item mx-2"><a class="text-uppercase text-muted reset-anchor" href="#!"> (<?php echo format_Dates_Times($row['created_at'],$format='full'); ?>)</a></li>
            </ul>
		  </div>
        </div>
		<?php if($row['video_primary'] != ''){ ?>
			<div class="ratio ratio-16x9 mb-5">
				<iframe src="<?php echo $row['video_primary']; ?>" allowfullscreen></iframe>
			</div>
		<?php }else{ ?>

		<?php } ?>
        <div class="row gy-5">
          <div class="col-lg-9">
				
	
<hr />		
		
		
		
<div class="d-block d-sm-none">
	<img class="w-100 mb-2 " src="assets/images_blog/<?php echo $row['image_primary']; ?>" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>">
					
	<div class="col-lg-12">
		
		<?php if($row['knowledge_by_percentage'] > 5){ ?>
		<div class="container">
			<!-- Row 1 -->
			<div class="container">
				<div class="row">
					<div class="col">
						<p>Read</p>
					</div>
					<div class="col text-center text-md-center">
						<p>Applied</p>
					</div>
					<div class="col text-end text-md-end">
						<p>Mastered</p>
					</div>
				</div>
			</div>
			<!-- Row 2 -->
			<div class="row">
				<div class="col-12">
					<div class="progress">
						<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $row['knowledge_by_percentage'];?>%" aria-valuenow="<?php echo $row['knowledge_by_percentage'];?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12 text-md-end">
					<a href="learn-by-reading-master-by-doing">What is Read,Applied,Mastered?</a>
				</div>
			</div>
			
		</div>
		<?php } ?>
	</div>
	<hr />
</div>


			<p class="lead drop-caps mb-2">
				<?php echo $row['content_full'];?></p>
			
			<p><?php echo $row['search_criteria'];?></p>
			<hr />
			<!--- BLOG IMAGES --->
			<?php $blog_images = read_images_blog($id=$row['id']); ?>	
			<?php if($_SESSION['NUM_ROWS']($is_tag) == 1) { ?>
			<section id="profiles" class="page">
				<div class="container">
							
					<div class="container-fluid">
						<div class="row" id="profile-grid">
							
							<?php while($row_images = mysqli_fetch_array($blog_images)) { ?>
							<div class="col-sm-4 col-xs-12 profile">
								<div class="panel panel-default">
								  <div class="panel-thumbnail">
									<a href="#" title="<?php echo $row_images['alt'] ?>" class="thumb">
										<img src="/assets/images_blog/<?php echo $row_images['image'] ?>" alt="<?php echo $row_images['alt'] ?>" class="img-responsive img-rounded" data-toggle="modal" data-target=".modal-profile-lg">
									</a>
								  </div>
								  <div class="panel-body">
									<h3><?php echo $row_images['alt'] ?></h3>
									<p></p>
								  </div>
								</div>
							</div>
							<?php } ?>
							
						 </div>
					</div>
				</div>
			</section>
			<?php } ?>
		
			<!-- Post tags-->
            <div class="d-flex align-items-center flex-column flex-sm-row mb-4 p-4 bg-light">
              <h3 class="h4 mb-3 mb-sm-0">Tags</h3>
              <ul class="list-inline mb-0 ms-0 ms-sm-3">
				<?php $tags = read_Blog_Tags($id=$row['id']); ?>
				<?php while($display_tags = mysqli_fetch_array($tags)) { ?>
				<li class="list-inline-item my-1 me-2"><a class="sidebar-tag-link" href="<?php echo $display_tags['alias']; ?>"><?php echo $display_tags['tag']; ?></a></li>
				<?php } ?>
			  </ul>
            </div>
            <!-- Post share-->
            <div class="d-flex align-items-center flex-column flex-sm-row mb-5 p-4 bg-light">
              <h3 class="h4 mb-3 mb-sm-0">Share this post</h3>
              <ul class="list-inline mb-0 ms-0 ms-sm-3">
                <li class="list-inline-item me-1 my-1"><a class="social-link-share facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://travissutphin.com/<?php echo $_REQUEST['alias']; ?>"><i class="fab me-2 fa-facebook-f"></i>Share</a></li>
                <!--- <li class="list-inline-item me-1 my-1"><a class="social-link-share instagram" href="#!"><i class="fab me-2 fa-instagram"></i>Share</a></li> --->
              </ul>
            </div>
          </div>
          <!-- Blog sidebar-->
          <div class="col-lg-3">
            <?php include('templates/side_bar.php'); ?>			
          </div>
        </div>
		<?php } ?>
      </div>
    </section>
<?php
	include('footer.php');
	include('html_end.php');
?>