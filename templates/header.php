<header class="header">
  <nav class="navbar navbar-expand-lg navbar-light index-forward bg-white">
    <div class="container">
      <div class="row w-100 align-items-center">
        <!-- Column 1: Title and Text -->
        <div class="col-9 col-lg-auto">
          <h1 class="h1 mb-0">
            <a class="d-block reset-anchor" href="<?php echo APP_URL; ?>"><?php echo DEFAULT_TITLE; ?></a>
          </h1>
          <p><a href="learn-by-reading-master-by-doing">Learn by Reading - Master by Doing</a></p>
        </div>
        
        <!-- Column 2: Social Links aligned to the right -->
        <div class="col-3 col-lg-auto ms-lg-auto order-lg-last">
          <ul class="list-inline mb-0 text-end">
            <li class="list-inline-item">
              <a class="reset-anchor" target="_blank" href="https://github.com/travissutphin"><i class="fab fa-github"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="reset-anchor" target="_blank" href="https://www.linkedin.com/in/travis-sutphin-4472a1a/"><i class="fab fa-linkedin"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  
  <nav class="navbar navbar-expand-lg navbar-light border-top border-bottom border-light">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span></span><span></span><span></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL;?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="travis-sutphin-resume">Resume</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" id="listingVariants" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu mt-2" aria-labelledby="listingVariants">
              <?php while($row_categories = mysqli_fetch_array($display_categories_nav)) { ?>
                <a class="dropdown-item" href="<?php echo $row_categories['alias']; ?>"><?php echo $row_categories['category']; ?></a>
              <?php } ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" id="listingVariants" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</a>
            <div class="dropdown-menu mt-2" aria-labelledby="listingVariants">
              <?php while($row_tags = mysqli_fetch_array($display_tags_nav)) { ?>
                <a class="dropdown-item" href="<?php echo $row_tags['alias']; ?>"><?php echo $row_tags['tag']; ?></a>
              <?php } ?>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link active" href="roadmap">Roadmap</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>