<?php

namespace Softlayer;

use Slice\Http\Client as Slice;

class AbstractSetup
{
    const baseUrl       = "@api.softlayer.com/rest";
    
    private $apiuser    = "";
    private $apikey     = "";
    private $apiversion = "v3";
    private $requestUrl = "";

	protected function parseUrl (ResourceInterface $class, $method) {
		$this->requestUrl = 'https://' .$this->getApiuser(). ':' .$this->getApikey() . AbstractSetup::baseUrl. '/' .$this->getApiversion(). '/' .$class->getResource(). '/' .$method. '.json';
		return $this;
	}

	protected function callApi () {
		$slice = new Slice();
		$slice->setUri($this->requestUrl);
		return $slice->request();
	}
    /**
     * Gets the value of apiuser.
     *
     * @return mixed
     */
    public function getApiuser() {
        return $this->apiuser;
    }

    /**
     * Sets the value of apiuser.
     *
     * @param mixed $apiuser the apiuser
     *
     * @return self
     */
    public function _setApiuser($apiuser) {
        $this->apiuser = $apiuser;

        return $this;
    }

    /**
     * Gets the value of apikey.
     *
     * @return mixed
     */
    public function getApikey() {
        return $this->apikey;
    }

    /**
     * Sets the value of apikey.
     *
     * @param mixed $apikey the apikey
     *
     * @return self
     */
    public function _setApikey($apikey) {
        $this->apikey = $apikey;
        return $this;
    }

    /**
     * Gets the value of apiversion.
     *
     * @return mixed
     */
    public function getApiversion() {
        return $this->apiversion;
    }

    /**
     * Sets the value of apiversion.
     *
     * @param mixed $apiversion the apiversion
     *
     * @return self
     */
    public function _setApiversion($apiversion) {
        $this->apiversion = $apiversion;
        return $this;
    }
}
	