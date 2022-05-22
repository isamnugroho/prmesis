<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Cloud\Storage\StorageClient;

class Google_storage extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {
		/* Please supply your own consumer key and consumer secret */
		$consumerKey = 'ie28mxre2f68a0s';
		$consumerSecret = 'rhs1ruwlzcg0ryd';

		// include 'Dropbox/autoload.php';

		// session_start();
		$oauth = new Dropbox_OAuth_PHP($consumerKey, $consumerSecret);

		// If the PHP OAuth extension is not available, you can try
		// PEAR's HTTP_OAUTH instead.
		// $oauth = new Dropbox_OAuth_PEAR($consumerKey,$consumerSecret);

		$dropbox = new Dropbox_API($oauth);
	}
}