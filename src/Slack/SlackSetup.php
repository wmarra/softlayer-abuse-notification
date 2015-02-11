<?php

namespace Slack;

use Slice\Http\Client as Slice;

abstract class SlackSetup
{
    const baseUrl           = "slack.com/api";
    private $tocken         = "";
    private $channels       = "";
    private $currentChannel = "";
    private $userName       = "";
    private $iconURL        = "";
    private $pretty         = 1;

	protected function parseUrl (SlackInterface $class) {
        $this->requestUrl = 'https://' . SlackSetup::baseUrl. '/' .$class->getResource();
		return $this;
	}

	protected function callApi (SlackInterface $class) {
        $slice = new Slice();
        $slice->setUri($this->requestUrl)
            ->setParameterGet('token',    $class->getToken())
            ->setParameterGet('channel',  $this->getCurrentChannel())
            ->setParameterGet('text',     $class->getMessage())
            ->setParameterGet('icon_url', $this->getIconURL())
            ->setParameterGet('username', $this->getUserName())
            ->setParameterGet('pretty',   $this->getPretty());
        
		return $slice->request();
	}
    /**
     * Gets the value of token.
     *
     * @return mixed
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * Sets the value of token.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function _setToken($token) {
        $this->token = $token;
        return $this;
    }
    /**
     * Gets the value of token.
     *
     * @return mixed
     */
    public function getUserName() {
        return $this->userName;
    }
    /**
     * Sets the value of userName.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function _setUserName($userName) {
        $this->userName = $userName;
        return $this;
    }
    /**
     * Gets the value of token.
     *
     * @return mixed
     */
    public function getIconUrl() {
        return $this->iconURL;
    }
    /**
     * Sets the value of iconURL.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function _setIconUrl($iconURL) {
        $this->iconURL = $iconURL;
        return $this;
    }
    /**
     * Gets the value of channels.
     *
     * @return mixed
     */
    public function getChannels() {
        return $this->channels;
    }
    /**
     * Sets the array to set channels.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function _setChannels($channels) {
        $this->channels = $channels;
        return $this;
    }
    /**
     * Gets the value of pretty.
     *
     * @return mixed
     */
    public function getPretty() {
        return $this->channels;
    }
    /**
     * Sets the array to set channels.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function _setPretty($pretty) {
        $this->pretty = $pretty;
        return $this;
    }
    /**
     * Gets the value of currentChannel.
     *
     * @return mixed
     */
    public function getCurrentChannel() {
        return $this->currentChannel;
    }
    /**
     * Sets the array to set channels.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    public function _setCurrentChannel($channel) {
        $this->currentChannel = $channel;
        return $this;
    }
}
	