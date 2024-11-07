<?php
/* ROOT.CONTROLLER */
/*****************************************************************/
$message = isset($_SESSION['message']) ? $_SESSION['message'] : false;
	
/************
*
*	VERIFY US BASED IP ADDRESS
*
*
************/
/*
$IPaddress = $_SERVER['REMOTE_ADDR'];
$two_letter_country_code = iptocountry($IPaddress);
include("assets/ip_files/countries.php");
$three_letter_country_code=$countries[ $two_letter_country_code][0];
$country_name=$countries[$two_letter_country_code][1];
if($two_letter_country_code != 'US'){
	include('templates/nonUS.php');
	exit;
	
}
*/
/************
*
*	LOAD ALL FUNCTIONS NEEDED FOR GLOBAL USAGE
*
*
************/


/************
*
*	GLOBAL NAVIGATION IN THE HEAD.PHP FILE
*
*
************/
$display_categories_nav = read_Categories($id=FALSE, $category=FALSE);
$display_tags_nav = read_Tags($id=FALSE, $tag=FALSE);


/************
*
*	ON BLOG.PHP FILE TO SHOW THE MOST RECENT POST
*
*
************/
$latest_blog = read_blog($id=FALSE, $alias=FALSE, $created_at=FALSE, $limit='0,1');


/************
*
*	ON BLOG.PHP FILE RIGHT COLUMN TO SHOW ALL CATEGORIES AND TAGS
*
*
************/
$display_tags_blog = read_Tags($id=FALSE, $tag=FALSE);
$display_categories_blog = read_Categories($id=FALSE, $category=FALSE);


/************
*
*	ON BLOG.PHP FILE BELOW POSTS
*
*
************/
$random_quote = read_Quotes();



/************
*
*	LOAD TEMPLATES BASED ON ALIAS
*
*
************/
if(!isset($_REQUEST['alias'])) { $_REQUEST['alias'] = NULL; } 

/* IF ALIAS IS A BLOG POST - DISPLAY BLOG DETAIL POST */

$is_blog = read_blog($id=FALSE, $alias=$_REQUEST['alias'], $created_at=FALSE, $limit='0,1');

/* IF ALIAS IS A CATEGORY - DISPLAY ALL BLOG POSTS IN CATEGORY */
$is_category = read_Categories($id=FALSE, $category=$_REQUEST['alias']);
/* IF ALIAS IS A TAG - DISPLAY ALL BLOG POSTS IN TAG */
$is_tag = read_Tags($id=FALSE, $tag=$_REQUEST['alias']);
/* ELSE SHOW ALL BLOG POSTS IN DESCENDING ORDER */

// DO NOT SHOW LATEST POST NOR TOP CATEGORIES BY DEFAULT
$show_latest_post = 'no';
$show_top_categories = 'no';
$seo_social_data = read_values_Blog(FALSE);

if(isset($_REQUEST['search_criteria']) and $_REQUEST['search_criteria'] != ""){
	
	$display_blog = read_blog($id=FALSE, $alias=FALSE, $created_at=FALSE, $limit=FALSE, $category=FALSE, $tag=FALSE,  $search_criteria=$_REQUEST['search_criteria']);
	include('templates/blog.php');

}elseif($_SESSION['NUM_ROWS']($is_blog) == 1){ // BLOG POST DETAILS

	$display_post = read_blog($id=FALSE, $alias=$_REQUEST['alias'], $created_at=FALSE, $limit=FALSE, $category=FALSE, $tag=FALSE,  $search_criteria=FALSE);
	$seo_social_data = read_values_Blog($_REQUEST['alias']);
	include('templates/post.php');
		
}elseif($_SESSION['NUM_ROWS']($is_category) == 1){

	$display_blog = read_blog($id=FALSE, $alias=FALSE, $created_at=FALSE, $limit=FALSE, $category=$_REQUEST['alias'], $tag=FALSE,  $search_criteria=FALSE);
	include('templates/blog.php');


}elseif($_SESSION['NUM_ROWS']($is_tag) == 1){
	
	//$display_blog = read_by_tag_Blog($tag=$_REQUEST['alias']);
	$get_id = read_Tags($id=FALSE, $alias=$_REQUEST['alias']);

		while($row = mysqli_fetch_array($get_id)) {
			$tagid = $row['id'];
		}
	$display_blog = read_blog($id=FALSE, $alias=FALSE, $created_at=FALSE, $limit=FALSE, $category=FALSE, $tag=$tagid,  $search_criteria=FALSE);
	include('templates/blog.php');

		
}else{ // SHOW ALL BLOG POSTS

	$show_latest_post = 'no';
	$show_top_categories = 'no';
	$display_blog = read_blog($id=FALSE, $alias=FALSE, $created_at=FALSE, $limit='0,20000'); // PARTS IN THE SERIES ARE "YES" AND THE OVERVIEW TO THOSE SERIES ARE NULL AS ARE ALL SINGLE BLOG POSTS

	include('templates/blog.php');
		
}

// THE ACTION SESSION SHOULD ONLY BE USED ONCE
unset($_SESSION['action']);

?>