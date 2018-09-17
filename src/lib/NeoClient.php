<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:10
 */

namespace Neostrada\Client\lib;

use GuzzleHttp\Client;
use http\QueryString;
use Neostrada\Client\Config;

class NeoClient
{
    /**
     * @var string
     */
    protected $url = Config::URL;

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $token = Config::TOKEN;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var array
     */
    protected $query;

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute($route)
    {
        $this->route = '/api'.$route;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param array $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function call()
    {
        try {
            $param = [];
            $query = '';
            $client = new Client(['base_uri' => $this->url]);
            $headers = [
                'Authorization' => 'Bearer ' . $this->getToken(),
                'Accept' => 'application/json',
            ];

            if (!empty($this->getParameters()))
                $param = $this->getParameters();
            if(!empty($this->getQuery()))
                $query = '?'.http_build_query($this->getQuery());

            $response = $client->request($this->getMethod(), $this->getRoute().$query, [
                'headers' => $headers,
                'json' => $param,
            ]);

            return $response->getBody()->getContents();
        }catch (\Exception $exception)
        {
            echo $exception->getMessage();
        }
    }
}