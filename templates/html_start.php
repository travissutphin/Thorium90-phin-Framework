<!DOCTYPE html>
<html>
  <head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5R6Q847C');</script>
	<!-- End Google Tag Manager -->
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-46PTMWC8QF"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-46PTMWC8QF');
	</script>
    <!-- End Google tag (gtag.js) -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $seo_social_data['title']; ?><?php if($seo_social_data['title'] !=""){echo ' | ';}?><?php echo DEFAULT_TITLE; ?></title>
    <meta name="description" content="<?php echo substr($seo_social_data['content_intro'],0,160); ?>">
	<?php if($seo_social_data['created_at'] != ''){ ?><meta property="article:published_time" content="<?php echo $seo_social_data['created_at']; ?>" />
	<meta property="article:modified_time" content="<?php echo $seo_social_data['created_at']; ?>" /><?php } ?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
	<?php if(isset($seo_social_data['title'])){ ?>
	<!-- Facebook Share --->
	<meta property="og:locale" content="en_US" />
	<meta property="og:url" content="<?php echo app_Url(); ?><?php echo $_REQUEST['alias']; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $seo_social_data['title']; ?>" />
	<meta property="og:description" content="<?php echo $seo_social_data['content_intro']; ?>" />
	<meta property="og:site_name" content="<?php echo DEFAULT_AUTHOR; ?>" />
	<meta property="og:image" content="<?php echo app_URL(); ?>assets/images_blog/<?php echo $seo_social_data['image_primary']; ?>" />
	<?php } ?>
	<!-- Google fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- gLightbox CSS-->
    <link rel="stylesheet" href="assets/vendor/glightbox/css/glightbox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.violet.css" id="theme-stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
	<!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
	
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/images/">
<style>
h2::before, h4::before {
  content: '';
  display: inline-block;
  width: 15px; /* Adjust the width as needed */
  height: 2em; /* Makes the rectangle the same height as the text */
  background-color: #7b6fe3; /* Change this to your desired color */
  margin-right: 10px; /* Space between the rectangle and text */
  vertical-align: middle; /* Aligns the rectangle vertically with the text */
}
</style>

 </head>
 <body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5R6Q847C"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->