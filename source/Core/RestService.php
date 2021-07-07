<?php

namespace Source\Core;

/**
 * Class RestService
 * @package Source\Core
 */
class RestService
{
    /**
     * @var string
     */
    private $apiUrl;
    /**
     * @var string
     */
    private $endpoint;
    /**
     * @var bool
     */
    private $error = false;
    /**
     * @var
     */
    private $callback;

    /**
     * RestService constructor.
     * @param string $endpoint
     * @param array $params
     */
    public function __construct(string $endpoint, array $params = [])
    {
        $this->endpoint = $endpoint;
        $this->params = implode("/", $params);
        $this->apiUrl = URL_API;
    }

    /**
     * @return $this
     */
    public function get(): RestService
    {
        $url = $this->apiUrl . $this->endpoint . DS . $this->params;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        if (curl_errno($ch)) {
            $this->error = true;
            return $this;
        }

        $result = json_decode(curl_exec($ch));

        $this->callback = (array) $result;

        curl_close($ch);

        return $this;
    }

    /**
     * @return mixed
     */
    public function callback()
    {
        return $this->callback;
    }
}
