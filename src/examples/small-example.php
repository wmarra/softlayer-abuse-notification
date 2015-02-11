<?php

require '../../vendor/autoload.php';

use SoftLayer\Account\Tickets;
use Slack\Chat\Messages;

$tickets = new Tickets();
$tickets->_setApiuser('YOUR_USER')
	->_setApikey('YOUR_KEY')
	->openAbuseTickets();

$data = json_decode($tickets->getResponse()->getBody());
$msg  = new Messages();

foreach($data as $obj) {

	$createDate = date_parse($obj->createDate);
	$updateDate = date_parse($obj->modifyDate);

	$postMessage = $msg->_setToken('YOUR_SLACK_TOKEN')
		->_setUserName('USER_NAME_THAT_WILL_POST_MESSAGE')
		->_setIconUrl('USER_ICON')
		->_setChannels( array('YOUR_CHANNEL', 'OTHER_CHANNEL', 'OTHER_CHANNEL') )
		->_setMessage('YOUR_MESSAGE')
		->postMessage();
}