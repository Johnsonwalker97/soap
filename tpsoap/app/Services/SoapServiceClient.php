<?php

// app/Services/SoapServiceClient.php

namespace App\Services;

class SoapServiceClient
{
    protected $client;

    public function __construct()
    {
        $wsdl = 'http://localhost:8000/fake-soap-service.php?wsdl';
        $options = [
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];

        $this->client = new \SoapClient($wsdl, $options);
    }

    public function fetchData($param)
    {
        return $this->client->getData(['param' => $param]);
    }
}
