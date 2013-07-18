<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | https://github.com/hybridauth/hybridauth
*  (c) 2009-2011 HybridAuth authors | hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		// IMPORTANT: If the "index.php" is removed from the URL (http://codeigniter.com/user_guide/general/urls.html) the
		// "/index.php/" part __MUST__ be prepended to the base_url.
		'base_url' => '/hauth/endpoint',

		'providers' => array (
			// openid providers
			'OpenID' => array (
				'enabled' => TRUE
			),

			'Yahoo' => array (
				'enabled' => TRUE
			),

			'AOL'  => array (
				'enabled' => TRUE
			),

			'Google' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'id' => '1081029321601.apps.googleusercontent.com', 'secret' => 'lZVbAAoxdykfuOCxsmGOBfcJ' ),
				'scope'   => 'https://www.googleapis.com/auth/plus.me'
			),

			'Facebook' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'id' => '', 'secret' => '' ),

				// A comma-separated list of permissions you want to request from the user. See the Facebook docs for a full list of available permissions: http://developers.facebook.com/docs/reference/api/permissions.
				'scope'   => '',

				// The display context to show the authentication page. Options are: page, popup, iframe, touch and wap. Read the Facebook docs for more details: http://developers.facebook.com/docs/reference/dialogs#display. Default: page
				'display' => ''
			),

			'Twitter' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'key' => 'UN6JZpbgprFFEOP7bP4D8Q', 'secret' => 'Ryt5biD6hpy5YGZY6Ws4WYMrAtTi1ZfOcMgpVUo2U' )
			),

			// windows live
			'Live' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'id' => '', 'secret' => '' )
			),

			'MySpace' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'key' => '', 'secret' => '' )
			),

			'LinkedIn' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'key' => '', 'secret' => '' )
			),

			'Foursquare' => array (
				'enabled' => TRUE,
				'keys'    => array ( 'id' => '', 'secret' => '' )
			),
		),

		// if you want to enable logging, set 'debug_mode' to TRUE then provide a writable file by the web server on "debug_file"
//		'debug_mode' => (ENVIRONMENT == 'development'),
		'debug_mode' => TRUE,

//		'debug_file' => APPPATH.'/logs/hybridauth.log',
		'debug_file' => '/tmp/hybridauth.log'
	);
