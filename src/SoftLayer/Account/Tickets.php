<?php

namespace SoftLayer\Account;

use SoftLayer\AbstractSetup;
use SoftLayer\ResourceInterface;

class Tickets extends AbstractSetup implements ResourceInterface 
{
	const resource   = "SoftLayer_Account";
	private $reponse = "";

	public function getResource() {
		return self::resource;
	}

	public function getResponse () {
		return $this->response;
	}

	public function openAbuseTickets () {
		$this->response = $this->parseUrl( $this, 'getOpenAbuseTickets')->callApi();
	}	
}