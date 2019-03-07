<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:10
 */

namespace Neostrada\Client;

use GuzzleHttp\Client;

class NeoClient
{
    /**
     * @var string
     */
    protected $url = 'https://api.neostrada.com/api';

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $token;

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

    public function getCountries()
    {
        $this->setRoute('/countries');
        $this->setMethod('GET');

        $response = $this->call();
        return $response;

    }

    public function getDns($id)
    {
        $this->setRoute('/dns/'.$id);
        $this->setQuery($this->getQuery());
        $this->setMethod('GET');

        $response = $this->call();
        return $response;
    }

    public function addDns($id)
    {
        $this->setRoute('/dns/add/'.$id);
        $this->setParameters($this->getParameters());
        $this->setMethod('POST');

        $response = $this->call();
        return $response;
    }

    public function editDns($id)
    {
        $this->setRoute('/dns/edit/'.$id);
        $this->setParameters($this->getParameters());
        $this->setMethod('PATCH');

        $response = $this->call();
        return $response;
    }

    public function deleteDns($id)
    {
        $this->setRoute('/dns/delete/'.$id);
        $this->setParameters($this->getParameters());
        $this->setMethod('DELETE');

        $response = $this->call();
        return $response;
    }

    public function getDomains()
    {
        $this->setRoute('/domains');
        $this->setMethod('GET');

        $response = $this->call();
        return $response;

    }

    public function getSingleDomain($id)
    {
        $this->setRoute('/domain/'.$id);
        $this->setMethod('GET');

        $response = $this->call();
        return $response;
    }

    public function deleteDomain($id)
    {
        $this->setRoute('/domain/delete/'.$id);
        $this->setMethod('DELETE');

        $response = $this->call();
        return $response;
    }

    public function getExtensions()
    {
        $this->setRoute('/extensions');
        $this->setMethod('GET');

        $response = $this->call();
        return $response;

    }

    public function getHolders()
    {
        $this->setRoute('/holders');
        $this->setMethod('GET');

        $response = $this->call();
        return $response;

    }

    public function addHolders()
    {
        $this->setRoute('/holders/add');
        $this->setParameters($this->getParameters());
        $this->setMethod('POST');

        $response = $this->call();
        return $response;
    }

    public function editHolders($holderId)
    {
        $this->setRoute('/holders/edit/'.$holderId);
        $this->setParameters($this->getParameters());
        $this->setMethod('PATCH');

        $response = $this->call();
        return $response;
    }

    public function deleteHolders()
    {
        $this->setRoute('/holders/delete');
        $this->setParameters($this->getParameters());
        $this->setMethod('DELETE');

        $response = $this->call();
        return $response;
    }

    public function getNameservers($id)
    {
        $this->setRoute('/nameservers/'.$id);
        $this->setQuery($this->getQuery());
        $this->setMethod('GET');

        $response = $this->call();
        return $response;
    }

    public function addNameservers($id)
    {
        $this->setRoute('/nameservers/add/'.$id);
        $this->setParameters($this->getParameters());
        $this->setMethod('POST');

        $response = $this->call();
        return $response;
    }

    public function editNameservers($id)
    {
        $this->setRoute('/nameservers/edit/'.$id);
        $this->setParameters($this->getParameters());
        $this->setMethod('PATCH');

        $response = $this->call();
        return $response;
    }

    public function deleteNameservers($id)
    {
        $this->setRoute('/nameservers/delete/'.$id);
        $this->setParameters($this->getParameters());
        $this->setMethod('DELETE');

        $response = $this->call();
        return $response;
    }

    public function getPlannedOrders()
    {
        $this->setRoute('/orders/planned');
        $this->setMethod('GET');

        $response = $this->call();
        return $response;

    }

    public function placeOrder()
    {
        $this->setRoute('/orders/add');
        $this->setParameters($this->getParameters());
        $this->setMethod('POST');

        $response = $this->call();
        return $response;
    }

    public function whois()
    {
        $this->setRoute('/whois');
        $this->setParameters($this->getParameters());
        $this->setMethod('POST');

        $response = $this->call();
        return $response;

    }

    public function bulkWhois()
    {
        $this->setRoute('/bulkwhois');
        $this->setParameters($this->getParameters());
        $this->setMethod('POST');

        $response = $this->call();
        return $response;

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
