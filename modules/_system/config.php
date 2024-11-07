<?php
/* _SYSTEM.CONFIG */
/*****************************************************************/
	
/**
  * @desc	
  * @param	
  * @return 
*/
	if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
/*****************************************************************/	
	
/**
  * @desc	
  * @param	
  * @return 
*/
	date_default_timezone_set("US/Eastern");
	setlocale(LC_MONETARY,"en_US");
	define("DB_TYPE","MYSQL");// MYSQL or MSSQL
	define("DB_SERVER","localhost"); //162.199.82.151
	define("DB_DATABASE","rensgdxpye");
	define("DB_USER","rensgdxpye");
	define("DB_PASSWORD", "JmmeMt3kUX");
	define("APP_DIRECTORY", "/"); // should be "/" if app is on the root
	define("APP_URL", "/"); // should be "/" if app is on the root
	define("DEFAULT_TITLE","Travis Sutphin");
	define("DEFAULT_AUTHOR","Travis Sutphin");
	define("DEFAULT_REPLYTO","");
	define('SESSION_LIFETIME', 3600); // 1 hour (3600 seconds) - User logged out after 1 hour - no reset
	define('INACTIVITY_TIMEOUT', 900); // 15 minutes (900 seconds)
	//FACEBOOK HBB LOGIN//
	define("APP_ID","");
	define("APP_SECRET","");
	define("API_VERSION","");
	define("FB_BASE_url","");	
/*****************************************************************/	
	
/**
  * @desc	ran first to ensure site_Url and root_Url are defined
  * @param	
  * @return 
*/
	include_once('url.php');
	
/*****************************************************************/
 
 
 

function blockCountries($blockedCountries, $apiToken) {
    $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "http://ipinfo.io/{$userIP}/json?token={$apiToken}";
    $userInfo = json_decode(file_get_contents($url));
    
    if (isset($userInfo->country) && in_array($userInfo->country, $blockedCountries)) {
        die("Access denied from your country.");
    }
}

// Usage example with correct country codes and API token:
$blockedCountries = ['RU', 'CN', 'KP'];
$apiToken = 'eaccd228b3739e';
blockCountries($blockedCountries, $apiToken);
 
 
 
/**
  * @desc	system modules
  * @param	
  * @return 
*/
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/security.php");
	//is_logged_in_Security();  // verify we are logged in before loading any thing else
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/database.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/dates_times.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/email.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/message_center.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/helpers.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_system/error_handler.php");	
/*****************************************************************/

/**
  * @desc	core modules required for app to function
  * @param	
  * @return 
*/
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/_ip_log/functions.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/login/functions.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/blog/functions.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/categories/functions.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/tags/functions.php");
	include_once($_SERVER['DOCUMENT_ROOT']."".APP_DIRECTORY."modules/quotes/functions.php");

/*****************************************************************/


/**
  * @desc	set db specific function names based on database type
  * @param	DB_TYPE
  * @return $session vars
*/
	connection_Database(DB_TYPE);
	
	if(!isset($_SESSION['QUERY']))
	{
		if(DB_TYPE == "MYSQL")
		{	
			$_SESSION['QUERY'] = "mysqli_query";
			$_SESSION['NUM_ROWS'] = "mysqli_num_rows";
			$_SESSION['FETCH_ARRAY'] = "mysqli_fetch_array";
			$_SESSION['QUERY_ERROR'] = "mysqli_error";
		}
		elseif(DB_TYPE == "MSSQL")
		{
			$_SESSION['QUERY'] = "sqlsrv_query";
			$_SESSION['NUM_ROWS'] = "sqlsrv_num_rows";
			$_SESSION['FETCH_ARRAY'] = "sqlsrv_fetch_array";
			$_SESSION['QUERY_ERROR'] = "sqlsrv_error";		
		}
	}
/*****************************************************************/


/**
  * @desc	array of form vars not to include in posted loop when 
  *			creating or updating records etc.	
  * @param	
  * @return 
*/
	
	if(!isset($_SESSION['ignore']))
	{
		$_SESSION['ignore'] = array("create","update","delete","multiselect","CONTENT_ID","CONTENT_LAYOUT_ID",
									"CONTENT_TEMPLATE_ID","CONTENT_TYPE_ID","GEOLOCATOR_ID","IP_LOG_ID","USER_ID",
									"VIDEO_ID","VIDEO_SERIES_ID","VIDEO_CATEGORY_ID");
	}
/*****************************************************************/ 


/**
  * @desc	creates defined() lists for each of the tables with corresponding alias
  *			define() name will be "COLUMN_" followed by the table name
  * @param	
  * @return 
  * @ex.use	"SELECT COLUMNS_tbl_users FROM tbl_users" (this will include all fields
  *			within the tbl_users table
  * @creats	define("COLUMNS_SYSTEM_TBL_ROLES" ,"roles.ID, roles.NAME, roles.CREATED_AT, roles.UPDATED_AT, roles.DELETED_AT") 
*/ 
	//$table_x_alias = array("hbd_business"=>"bus");	
	//foreach($table_x_alias as $table => $alias)
	//{	
	//	table_fields_Database($table,$alias);
	//}
/*****************************************************************/ 

 
/**
  * @desc	this should only be changed following installation.
  * 		modifying this in ayway once data has been added will 
  *			render all encrypted values unreadable
  * @param	
  * @return 
*/

	define("ENCRYPTION_KEY", "otdKU2Aa!zIn");

/*****************************************************************/


?>