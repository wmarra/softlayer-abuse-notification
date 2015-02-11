<?php

namespace Slack\Chat;

use Slack\SlackSetup;
use Slack\SlackInterface;

class Messages extends SlackSetup implements SlackInterface 
{
	const resource   = "chat.postMessage";
	private $reponse = "";
	private $message = "";

	public function getResource() {
		return self::resource;
	}

	public function getMessage () {
		return $this->message;
	}

	public function _setMessage ( $message ) {
		$this->message = $message;
		return $this;
	}

	public function postMessage () {
		foreach ($this->getChannels() as $channel) {
			$this->_setCurrentChannel($channel);
			$this->response = $this->parseUrl( $this )->callApi( $this );
		}
		
	}
}