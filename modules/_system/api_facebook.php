<?php
/* _SYSTEM.API_FACEBOOK */
/*****************************************************************
https://www.youtube.com/watch?v=M7-U1c5HCq0
/

	function make_facebook_api_call_API_Facebook($endpoint, $params)
	{
		// open curl call, set endpoint and other curl params
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $endpoint . '?' . http_build_query( $params ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );

		// get curl response, json decode it, and close curl
		$fbResponse = curl_exec( $ch );
		$fbResponse = json_decode( $fbResponse, TRUE );
		curl_close( $ch );

		return array( // return response data
			'endpoint' => $endpoint,
			'params' => $params,
			'has_errors' => isset( $fbResponse['error'] ) ? TRUE : FALSE, // boolean for if an error occured
			'error_message' => isset( $fbResponse['error'] ) ? $fbResponse['error']['message'] : '', // error message
			'fb_response' => $fbResponse // actual response from the call
		);
	}

/*****************************************************************/	


	function get_login_url_API_Facebook()
	{
		// endpoint for facebook login dialog
		$endpoint = 'https://www.facebook.com/' . FB_GRAPH_VERSION . '/dialog/oauth';

		$params = array( // login url params required to direct user to facebook and promt them with a login dialog
			'client_id' => FB_APP_ID,
			'redirect_uri' => FB_REDIRECT_URI,
			'state' => FB_APP_STATE,
			'scope' => 'email',
			'auth_type' => 'rerequest'
		);

		// return login url
		return $endpoint . '?' . http_build_query( $params );
	}

/*****************************************************************/	

	function get_access_token_with_code_API_Facebook()
	{
		// endpoint for getting an access token with code
		$endpoint = FB_GRAPH_DOMAIN . FB_GRAPH_VERSION . '/oauth/access_token';

		$params = array( // params for the endpoint
			'client_id' => FB_APP_ID,
			'client_secret' => FB_APP_SECRET,
			'redirect_uri' => FB_REDIRECT_URI,
			'code' => $code
		);

		// make the api call
		return make_facebook_api_call_API_Facebook( $endpoint, $params );
	}

/*****************************************************************/	

	function get_user_info_API_Facebook( $accessToken ) {
		// endpoint for getting a users facebook info
		$endpoint = FB_GRAPH_DOMAIN . 'me';

		$params = array( // params for the endpoint
			'fields' => 'first_name,last_name,email,picture',
			'access_token' => $accessToken
		);

		// make the api call
		return make_facebook_api_call_API_Facebook( $endpoint, $params );
	}

/*****************************************************************/	

	function try_login_API_Facebook( $get ) {
		// assume fail
		$status = 'fail';
		$message = '';

		// reset session vars
		$_SESSION['fb_access_token'] = array();
		$_SESSION['fb_user_info'] = array();
		$_SESSION['eci_login_required_to_connect_facebook'] = false;

		if ( isset( $get['error'] ) ) { // error comming from facebook GET vars
			$message = $get['error_description'];
		} else { // no error in facebook GET vars
			// get an access token with the code facebook sent us
			$accessTokenInfo = get_access_token_with_code_API_Facebook( $get['code'] );

			if ( $accessTokenInfo['has_errors'] ) { // there was an error getting an access token with the code
				$message = $accessTokenInfo['error_message'];
			} else { // we have access token! :D
				// set access token in the session
				$_SESSION['fb_access_token'] = $accessTokenInfo['fb_response']['access_token'];

				// get facebook user info with the access token
				$fbUserInfo = get_user_info_API_Facebook( $_SESSION['fb_access_token'] );

				if ( !$fbUserInfo['has_errors'] && !empty( $fbUserInfo['fb_response']['id'] ) && !empty( $fbUserInfo['fb_response']['email'] ) ) { // facebook gave us the users id/email
					// 	all good!
					$status = 'ok';

					// save user info to session
					$_SESSION['fb_user_info'] = $fbUserInfo['fb_response'];

					// check for user with facebook id
					$userInfoWithId = getRowWithValue( 'users', 'fb_user_id', $fbUserInfo['fb_response']['id'] );

					// check for user with email
					$userInfoWithEmail = getRowWithValue( 'users', 'email', $fbUserInfo['fb_response']['email'] );

					if ( $userInfoWithId || ( $userInfoWithEmail && !$userInfoWithEmail['password'] ) ) { // user has logged in with facebook before so we found them
						// update user
						updateRow( 'users', 'fb_access_token', $_SESSION['fb_access_token'], $userInfoWithId['id'] );
						$userInfo = getRowWithValue( 'users', 'id', $userInfoWithId['id'] );

						// save info to php session so they are logged in
						$_SESSION['is_logged_in'] = true;
						$_SESSION['user_info'] = $userInfo;
					} elseif ( $userInfoWithEmail && !$userInfoWithEmail['fb_user_id'] ) { // existing account exists for the email and has not logged in with facebook before
						$_SESSION['eci_login_required_to_connect_facebook'] = true;
					} else { // user not found with id/email sign them up and log them in
						// sign user up
						$fbUserInfo['fb_response']['fb_access_token'] = $_SESSION['fb_access_token'];
						$userId = signUserUp( $fbUserInfo['fb_response'] );
						$userInfo = getRowWithValue( 'users', 'id', $userId );

						// save info to php session so they are logged in
						$_SESSION['is_logged_in'] = true;
						$_SESSION['user_info'] = $userInfo;
					}
				} else {
					$message = 'Invalid creds';
				}
			}
		}

		return array( // return status and message of login
			'status' => $status,
			'message' => $message,
		);
	}

/*****************************************************************/	

	function get_debug_token_info_API_Facebook( $accessToken ) {
		// endpoint for getting debug info
		$endpoint = FB_GRAPH_DOMAIN . 'debug_token';

		$params = array( // params for the endpoint
			'input_token' => $accessToken,
			'access_token' => $accessToken
		);

		// make the api call
		return make_facebook_api_call_API_Facebook( $endpoint, $params );
	}
?>